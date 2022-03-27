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
