<?php

namespace App\Http\Livewire;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class App extends Component
{

    protected $listeners = ['itemAded', 'itemDeleted'];

    public function itemAded(){
        session()->flash('success', 'Task created successfuly');
    }

    public function itemDeleted(){
        session()->flash('deleted', 'Task deleted successfuly');
    }

    public function mount(){
        $this->title = 'Test';
    }
    public function render()
    {
        return view('livewire.app');
    }
}
