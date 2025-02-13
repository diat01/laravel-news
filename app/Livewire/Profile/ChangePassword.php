<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;

class ChangePassword extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public string $message = '';  // Success message
    public string $errorMessage = '';  // Error message

    // Validation rules
    protected function rules(): array
    {
        return [
            'current_password'          => 'required|string',
            'new_password'              => 'required|string|min:8|different:current_password',
            // Ensure new password is not the same as the old one
            'new_password_confirmation' => 'required|same:new_password',  // Ensure confirmation matches new password
        ];
    }

    // Handle password change
    #[On('changePassword')]
    public function changePassword()
    {
        $this->validate();

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($this->current_password, $user->password)) {
            $this->errorMessage = 'The current password is incorrect!';
            $this->message = '';  // Clear success message when error occurs
            return;
        }

        // Update the password if current one is correct
        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->message = 'Your password has been successfully changed!';
        $this->errorMessage = '';  // Clear error message on success
        $this->resetForm();
    }

    // Reset form fields after successful password change
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
