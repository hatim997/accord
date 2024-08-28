<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipperLimit extends Model
{
    use HasFactory;

    protected $fillable = ['shipper_id', 'policy_id', 'policy_limit_id', 'policy_amount'];

 public function shipper()
  {
    return $this->belongsTo(User::class, 'shipper_id');
  }
}
