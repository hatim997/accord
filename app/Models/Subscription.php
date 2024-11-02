<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'plan_id',
        'status',
        'start_date',
        'end_date',
      ];
    use HasFactory;

    public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
