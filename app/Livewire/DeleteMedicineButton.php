<?php

namespace App\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class DeleteMedicineButton extends Component
{
    public $Medicine;
    public $medid;

    public function mount(){
        $this->Medicine = Medicine::find($this->medid);
    }

    public function deleteMedicine(){
        try {
            $this->Medicine->delete();
            $this->dispatch('successDeleted');
        }
        catch (\Exception $exception){
            $this->dispatch('errorDeleted');
        }
    }

    public function render()
    {
        return view('livewire.delete-medicine-button');
    }
}
