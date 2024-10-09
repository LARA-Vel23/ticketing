<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public string $currentPassword="";
    public string $password="";
    public string $password_confirmation="";
    public function render()
    {
        return view('livewire.change-password');
    }
    public function updatePassword()
    {
        $user = User::find(auth()->id());
        $this->validate([
            'currentPassword' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail(__('The password is incorrect.'));
                    }
                }
            ],
            'password' => ['required','confirmed','min:6'],
            'password_confirmation' => ['required']
        ]);
        $user->password = bcrypt($this->password);
        $user->save();
        $this->reset();
        session()->flash('success', 'Password Changed Successfully');
    }
}
