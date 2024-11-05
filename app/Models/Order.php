<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural of the model name
    protected $table = 'orders';

    // Define which attributes can be mass assigned
    protected $fillable = [
      'subscription_id', // Add this line
      'invoice',
      'issue_date',
      'price',
  ];

  
}
