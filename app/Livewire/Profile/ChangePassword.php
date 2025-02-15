<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;

class ChangePassword extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public string $message = '';
    public string $errorMessage = '';

    protected function rules(): array
    {
        return [
            'current_password'          => 'required|string',
            'new_password'              => 'required|string|min:8|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ];
    }

    #[On('changePassword')]
    public function changePassword()
    {
        $this->validate();

        $user = auth()->user();

        if (!Hash::check($this->current_password, $user->password)) {
            $this->errorMessage = 'The current password is incorrect!';
            $this->message = '';
            return;
        }

        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->message = 'Your password has been successfully changed!';
        $this->errorMessage = '';
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->current_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.profile.change-password');
    }
}
