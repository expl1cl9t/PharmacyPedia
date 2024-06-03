<?php

namespace App\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class AddToCartButton extends Component
{

    public $medicneId;
    public $isInCart;

    public $cartImage;

    public function mount(){
        $this->isInCart = is_null(auth()->user()->medicineInBucet()->find($this->medicneId));
        $this->cartImage = asset('storage/other/cart.png');
    }

    public function addToCart(){
        try {
            $medicine = Medicine::find($this->medicneId);
            auth()->user()->medicineInBucet()->attach($medicine);
            $this->cartImage = asset('storage/other/alreadyIncath.png');
            $this->dispatch('addedInCart');
        }
        catch (\Exception $exception){
            $this->dispatch('errorInCart', error: $exception->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
