<?php

namespace App\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class BlockUnblockMedicine extends Component
{
    public $medid;
    public $Medicine;

    public function changeStatus(){
        try {
            $this->Medicine->avaliableToBuy = $this->Medicine->avaliableToBuy == 1 ? 0 : 1;
            $this->Medicine->save();
            $this->dispatch('statusChangedSuccess');
        }
        catch (\Exception $exception){
            $this->dispatch('statusChangedError', error: $exception->getMessage());
        }
    }

    public function mount(){
        $this->Medicine = Medicine::find($this->medid);
    }

    public function render()
    {
        return view('livewire.block-unblock-medicine');
    }
}
