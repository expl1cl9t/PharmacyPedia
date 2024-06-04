<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\Medicine;
use Livewire\Component;

class MakeOrder extends Component
{

    public $selectedMedicines = [];
    public $counts;
    public $delType;


    public function createOrders(){
        try {
            foreach ($this->selectedMedicines as $medicine) {
                for ($i = 0; $i<=$this->counts;$i++){
                    $newBill = Bill::create([
                        'Cost' => Medicine::find($medicine)->Cost,
                        'DateOfBuy' => \Date::now(),
                        'DeliveryType' => $this->delType,
                        'medicine_id' => $medicine,
                        'user_id' => auth()->user()->id,
                    ]);
                }
                Medicine::find($medicine)->decrement('countOnStorage', $this->counts);
            }
            $this->dispatch('orderCreated');
        }
        catch (\Exception $e) {
            $this->dispatch('orderNotCreated', error: $e->getMessage());
        }
    }

    public function render()
    {
        $totalSum = Medicine::whereIn('id',$this->selectedMedicines)->sum('Cost');
        return view('livewire.make-order', ['totalSum' => $totalSum]);
    }

}
