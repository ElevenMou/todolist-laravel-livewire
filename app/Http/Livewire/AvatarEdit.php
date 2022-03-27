<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AvatarEdit extends Component
{
    use WithFileUploads;

    public $avatar;
    public $user;

    protected $rules = [
        'avatar' => 'image'
    ];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateAvatar()
    {
        $this->validate();
        $path = $this->avatar->store('images/avatars');

        $this->user->update(['avatar' => $path,]);

        $this->emit('avatarUpdated');
    }

    public function render()
    {
        return view('livewire.avatar-edit');
    }
}
