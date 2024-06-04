<?php

namespace App\Livewire;

use App\Models\Medicine;
use App\Models\TypeOfMedicine;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admin extends Component
{

    use WithFileUploads;

    public $TypeName;

    public $MedicineName;
    public $MedicineCost;
    public $TypeOfMedicine;
    public $medicineIsOnlyPerception;
    public $medicineImage;

    public function saveType(){
        try {
            DB::table('type_of_medicines')->insert([
               'TypeName' => $this->TypeName,
            ]);
            $this->dispatch('TypeCreated');
        }
        catch (\Exception $exception){
            $this->dispatch('TypeNotCreated', error: $exception->getMessage());
        }
    }

    public function saveMedicine(){
        try {

            $name = $this->medicineImage->store('medicines', 'public');

            Medicine::create([
                'Name' => $this->MedicineName,
                'Cost' => $this->MedicineCost,
                'Type' => $this->TypeOfMedicine,
                'ImageLink' => $name,
                'isOnlyPrescription' => $this->medicineIsOnlyPerception ? 1 : 0,
            ]);
            $this->dispatch('medicineAdded');
        }
        catch (\Exception $exception){
            $this->dispatch('medicineNotAdded', error: $exception->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin');
    }
}
