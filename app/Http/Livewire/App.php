<?php

namespace App\Http\Livewire;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class App extends Component
{

    protected $listeners = ['itemAded', 'itemDeleted'];
    public $session = false;

    public function itemAded(){
        $this->session = true;
        session()->flash('success', 'Task created successfuly');
    }

    public function itemDeleted(){
        $this->session = true;
        session()->flash('deleted', 'Task deleted successfuly');
    }

    public function closeSession()
    {
        $this->session = false;
    }

    public function mount(){
        $this->title = 'Test';
    }
    public function render()
    {
        return view('livewire.app');
    }
}
