<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{


    public $first_name ='';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public $session = false;

    protected $rules = [
        'first_name' => 'required|string|max:30|min:3',
        'last_name' => 'required|string|max:30|min:3',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function closeSession()
    {
        $this->session = false;
    }

    public function registerUser()
    {
        $this->validate();

        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();
        $this->session = true;

        session()->flash('success', 'Your account created successfuly');
    }
    public function render()
    {
        return view('livewire.register');
    }
}
