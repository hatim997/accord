<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription_plan extends Model
{
    protected $fillable = [
        'role',
        'name',
        'description',
        'price',
        'duration',
        'exdetail',
      ];


    use HasFactory;
}
