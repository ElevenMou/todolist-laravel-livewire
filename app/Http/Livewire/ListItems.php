<?php

namespace App\Http\Livewire;


use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListItems extends Component
{
    public $items = [];

    protected $listeners = ['itemAded'];

    public function itemAded(){

        $id = Auth::id();
        $this->items = Item::latest()->where('user_id',$id)->get();
    }

    public function completed($id){
        $item = Item::find($id);
        $user_id = Auth::id();
        $item->update([
            'completed'=> 1,
            'completed_at' => Carbon::now()
        ]);
        $this->items = Item::latest()->where('user_id',$user_id)->get();
    }

    public function incompleted($id){
        $item = Item::find($id);
        $user_id = Auth::id();
        $item->update([
            'completed'=> 0,
            'completed_at' => null
        ]);
        $this->items = Item::latest()->where('user_id',$user_id)->get();

    }

    public function delete($id){
        $item = Item::find($id);
        $user_id = Auth::id();
        $item->delete();
        $this->items = Item::latest()->where('user_id',$user_id)->get();
        $this->emit('itemDeleted');
    }


    public function mount(){
        $id = Auth::id();
        $this->items = Item::latest()->where('user_id',$id)->get();
    }

    public function render()
    {
        return view('livewire.list-items');
    }
}
