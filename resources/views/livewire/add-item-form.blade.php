<div class="add-item">

    <div class="add-item-form">
        <input wire:model="title" type="text">
        <button wire:click="addItem">
            <i class="icon far fa-plus-square"></i>
        </button>
    </div>

    @error('title')
        <div class="item-err">
            <p> {{ $message }}</p>
        </div>
    @enderror
</div>
