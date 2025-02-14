<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $news = News::select(["id", "name", "image", "created_at"])->latest()->paginate(4);
        return view('livewire.news.index', [
            'news' => $news,
        ]);
    }
}
