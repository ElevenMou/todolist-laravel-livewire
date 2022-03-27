<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class ProfileEdit extends Component
{
    use WithFileUploads;

    public $user;
    public $avatar;
    public $first_name;
    public $last_name;

    protected $rules = [
        'avatar' => 'image',
        'first_name' => 'required|string|max:30|min:3',
        'last_name' => 'required|string|max:30|min:3',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateAvatar()
    {
        $this->validate();

        $path = $this->avatar->store('images/avatars');

        $this->user->update(['avatar' => $path,]);

        session()->flash('success', 'Your avatar updated successfuly');
    }

    public function updateName()
    {
        $this->validate();

        $path = $this->avatar->store('images/avatars');

        $this->user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name
        ]);

        session()->flash('success', 'Your name updated successfuly');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
    }

    public function render()
    {
        return view('livewire.profile-edit');
    }
}
