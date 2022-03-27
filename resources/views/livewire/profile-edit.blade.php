<div class="section">
    <div class="form-group">
        <label for="first">First name </label>
        <input id="first" type="text" wire:model.debounce.500ms="first_name">
        @error('first_name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="last">Last name </label>
        <input id="last" type="text" wire:model.debounce.500ms="last_name">
        @error('last_name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <button wire:click="updateName" class="btn update">Update name</button>
    </div>
    @if ($session)
        @if (session()->has('success'))
            <div class="alert success">
                <button wire:click="closeSession">X</button>
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif
    @endif
</div>
