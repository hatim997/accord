<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadShipper extends Model
{
    use HasFactory;

    protected $table = 'upload_shipper';
    protected $fillable = ['user_id', 'path'];

    public function user_shipper()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
