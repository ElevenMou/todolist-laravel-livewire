<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddItemForm extends Component
{
    public $title = '';

    protected $rules = [
        'title' => 'required|min:5|max:200'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addItem(){
        $id = Auth::id();

        $this->validate();

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
