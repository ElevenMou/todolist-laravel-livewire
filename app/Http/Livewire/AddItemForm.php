<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddItemForm extends Component
{
    public $title = '';

    public function addItem(){
        $id = Auth::id();

        Item::create([
            'title' => $this->title,
            'user_id' => $id
        ]);

        $this->reset();


        $this->emit('itemAded');
    }

    public function render()
    {
        return view('livewire.add-item-form');
    }
}
