<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipperDriver extends Model
{
    use HasFactory;

    protected $table = 'shipper_driver';

    protected $fillable = [
      'shipper_id',
      'driver_id',
      'relation_status'
    ];

    public function ship()
    {
      return $this->belongsTo(User::class, 'shipper_id');
    }
    
    public function driver()
    {
      return $this->belongsTo(User::class, 'driver_id');
    }
}
