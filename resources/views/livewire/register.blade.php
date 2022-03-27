<div>
    <div class="form">
        <form wire:submit.prevent="registerUser">

            <h1 class="form-title"> Register </h1>

            <div class="form-group">
                <label for="first" class="form-item">First name </label>
                <input id="first" type="text" class="form-item" wire:model.lazy="first_name" />

                @error('first_name')
                    <div class="form-err">
                        <p> {{ $message }}</p>
                    </div>
                @enderror

            </div>

            <div class="form-group">
                <label for="last" class="form-item">Last name </label>
                <input id="last" type="text" class="form-item" wire:model.laz="last_name" />

                @error('last_name')
                    <div class="form-err">
                        <p> {{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-item">Email </label>
                <input id="email" type="text" class="form-item" wire:model.lazy="email" />

                @error('email')
                    <div class="form-err">
                        <p> {{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-item">Password </label>
                <input id="password" type="password" class="form-item" wire:model.lazy="password" />

                @error('password')
                    <div class="form-err">
                        <p> {{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="form-item">Confirm password </label>
                <input id="password-confirm" type="password" class="form-item"
                    wire:model.debounce.500ms="password_confirmation" />

                @error('password-confirm')
                    <div class="form-err">
                        <p> {{ $message }}</p>
                    </div>
                @enderror
            </div>

            <button type="submit" class="main-btn">Register</button>
        </form>
    </div>
    @if (session()->has('success'))
        <p class="alert success">{{ session()->get('success') }}</p>
    @endif
</div>
