<?php

namespace App\Livewire;

use Livewire\Component;

class ChangeProfileInfo extends Component
{
    public $newName;
    public $newSurname;
    public $newFname;
    public $newAge;

    public function mount(){
        $this->newAge = auth()->user()->age;
        $this->newName = auth()->user()->name;
        $this->newSurname = auth()->user()->surname;
        $this->newFname = auth()->user()->fname;
    }

    public function changeInfo(){
        $user = auth()->user();
        $user->name = $this->newName;
        $user->surname = $this->newSurname;
        $user->fname = $this->newFname;
        $user->age = $this->newAge;
        $user->save();
        $this->dispatch('dataChanged');
    }

    public function render()
    {
        return view('livewire.change-profile-info');
    }
}
