<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
  protected $fillable = [
    'user_id',
    'subscription_id',
    'status',
    'note',
];
    use HasFactory;

}
