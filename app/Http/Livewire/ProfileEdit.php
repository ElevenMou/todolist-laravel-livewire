<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ProfileEdit extends Component
{


    public $user;
    public $first_name;
    public $last_name;
    public $session = false;

    protected $listeners = ['avatarUpdated'];

    protected $rules = [
        'first_name' => 'required|string|max:30|min:3',
        'last_name' => 'required|string|max:30|min:3',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function avatarUpdated()
    {
        $this->session = true;

        session()->flash('success', 'Your avatar updated successfuly');
    }

    public function closeSession()
    {
        $this->session = false;
    }


    public function updateName()
    {
        $this->validate();

        $this->user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name
        ]);

        $this->session = true;

        $this->emit('nameUpdated');

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
