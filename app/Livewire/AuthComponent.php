<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AuthComponent extends Component
{

    #[Validate('required', message: 'Введите логин')]
    public $login;
    #[Validate('required', message: 'Введите пароль')]
    public $password;

    public function auth(){
        try {
            $this->validate();
            if (auth()->attempt(['email' => $this->login, 'password' => $this->password], $remember = true)){
                $this->dispatch('successAuth');
            }
            else{
                $this->dispatch('errorAuth', error: 'Пользователь с введенными данными не найден!');
            }
        }
        catch (\Exception $exception){
            $this->dispatch('errorAuth', error: $exception->getMessage());
        }
    }
    #[Title('Авторизация в приложении')]
    public function render()
    {
        return view('livewire.auth-component');
    }
}
