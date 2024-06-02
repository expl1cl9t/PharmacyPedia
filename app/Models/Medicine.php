<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
      'Name',
      'Cost',
        'Type',
        'isOnlyPrescription',
        'ImageLink',
    ];

    public function type()
    {
        return $this->belongsTo(TypeOfMedicine::class, 'Type');
    }
}
