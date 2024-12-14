<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipperInfos extends Model
{
  use HasFactory;

  protected $table = 'shipper_infos';

  protected $fillable = [
    'user_id',
    'name',
    'address',
    'address2',
    'country',
    'city',
    'state',
    'zip',
    'cellphone',
    'extra_email',
    'status',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
