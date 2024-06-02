<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterComponent extends Component
{
    #[Validate('required', message: 'Поле имя обязательно для ввода')]
    public $Name;
    #[Validate('required|email', message: 'Поле ввода электронной почты обязательно и доложно быть в формате почты.')]
    public $Email;
    #[Validate('required', message: 'Поле пароль обязательно для ввода, а также должно иметь не менее 6 символов')]
    public $Password;
    #[Validate('required', message: 'Фамилия обязательная для ввода')]
    public $Surname;
    #[Validate('required', message: 'Отчество обязательно для ввода')]
    public $Fname;
    #[Validate('required', message: 'Выберите ваш пол!')]
    public $Gender;
    #[Validate('required', message: 'Выберите ваш возраст')]
    public $Age;
    #[Validate('required', message: 'Номер телефона обязателен для ввода')]
    public $PhoneNumber;
    #[Validate('required', message: 'Введите логин')]
    public $Login;

    public function register(){
        try {
            $this->validate();
            User::create([
                'name' => $this->Name,
                'email' => $this->Email,
                'password' => $this->Password,
                'surname' => $this->Surname,
                'fname' => $this->Fname,
                'gender' => $this->Gender,
                'age' => $this->Age,
                'PhoneNumber' => $this->PhoneNumber,
                'login' => $this->Login,
                'role_id' => 1
            ]);
            $this->dispatch('registrationSuccess');
        }
        catch (\Exception $exception){
            $this->dispatch('errorWhereCreation', error: $exception->getMessage());
        }
    }


    #[Title('Регистрация')]
    public function render()
    {
        return view('livewire.register-component');
    }
}
