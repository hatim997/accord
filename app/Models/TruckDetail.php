<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckDetail extends Model
{
    use HasFactory;

    protected $table = 'truck_details';

    protected $fillable = [
      'user_id',
      'vehicle_registration_number',
      'vehicle_make',
      'vehicle_model',
      'vehicle_year',
      'vehicle_capacity',
      'vehicle_status',
      'mc_number',
      'license_number', 
      'license_type',
      'license_expiry_date',
      'years_of_experience',

    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
