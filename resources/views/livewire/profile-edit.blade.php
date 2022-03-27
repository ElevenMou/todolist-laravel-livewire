<div class="profile-edit">

    <div class="section">
        <div class="form-group">
            <label for="avatar">Avatar </label>
            <input id="avatar" type="file" wire:model="avatar">

            Avatar Preview:
            @if ($avatar)
                <img class="avatar-preview" src="{{ $avatar->temporaryUrl() }}">
            @else
                <img class="avatar-preview" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="avatar">
            @endif
            @error('photo')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button wire:click="updateAvatar" class="btn update">Update avatar</button>
        </div>
    </div>

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
        @if (session()->has('success'))
            <p class="alert success">{{ session()->get('success') }}</p>
        @endif
    </div>
