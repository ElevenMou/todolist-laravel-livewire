@extends('layouts.app')

@section('content')
    <div class="form">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1 class="form-title"> Login </h1>

            <div class="form-group">
                <label for="email" class="form-item">Email </label>
                <input id="email" type="email" class="form-item" name="email" value="{{ old('email') }}" />

                @error('email')
                    <div class="form-err">
                        <p> {{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-item">Password </label>
                <input id="password" type="password" class="form-item" name="password" value="{{ old('password') }}" />
                @error('password')
                    <div class="form-err">
                        <p> {{ $message }}</p>
                    </div>
                @enderror
            </div>

            <button type="submit" class="main-btn">Login</button>
        </form>
    </div>
@endsection
