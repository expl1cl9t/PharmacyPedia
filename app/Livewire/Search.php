<?php

namespace App\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class Search extends Component
{

    public $medicines;

    public $search;

    public function doSearch()
    {
        $this->medicines = Medicine::where('name', 'like', '%' . $this->search . '%')->get();
    }

    public function mount(){
        $this->medicines = Medicine::all();
    }
    public function render()
    {
        return view('livewire.search');
    }
}
