<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipperEndorsement extends Model
{
    use HasFactory;

    protected $fillable = ['shipper_id','endors_id'];
    protected $casts = [
        'endo_name' => 'array',
    ];
}
