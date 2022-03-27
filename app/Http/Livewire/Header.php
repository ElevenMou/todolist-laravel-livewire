<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $user;

    protected $listeners = ['nameUpdated','avatarUpdated'];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function avatarUpdated()
    {
        $this->user = Auth::user();
    }

    public function nameUpdated()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.header');
    }
}
