<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;
use Livewire\WithFileUploads;

class MyNews extends Component
{
    use WithPagination, WithFileUploads;

    public $name, $description, $id, $image;

    protected $rules = [
        'name'        => 'required|string|max:255',
        'description' => 'required|string',
        'image'       => 'nullable|image|max:2048',
    ];

    public function create()
    {
        $this->validate();

        $imagePath = $this->image->store('news', 'public');

        News::create([
            'author_id'   => auth()->id(),
            'name'        => $this->name,
            'description' => $this->description,
            'image'       => $imagePath,
        ]);

        session()->flash('message', 'News created successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);

        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();
        session()->flash('message', 'News deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->image = null;
        $this->id = null;
    }

    public function render()
    {
        $news = News::where('author_id', auth()->id())->latest()->paginate(10);

        return view('livewire.profile.my-news', compact('news'));
    }
}
