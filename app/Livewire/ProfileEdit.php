<?php

namespace App\Livewire;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $name ="";
    public $email ="";

    public function mount()
    {
        $user = User::find(auth()->id());
        $this->name = !$this->name ? $user->name : $this->name;
        $this->email = !$this->email ? $user->email : $this->email;
    }

    public function render()
    {
        return view('livewire.profile-edit');
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => ['required', 'min:4', 'max:191'],
            'email' => ['required', 'min:4', 'max:191']
        ]);
        $user = User::find(auth()->id());
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        session()->flash('success', 'Profile Changed Successfully');
    }
}
