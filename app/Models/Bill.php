<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicine_id',
        'DateOfBuy',
        'user_id',
        'Cost',
        'DeliveryType',
    ];

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
