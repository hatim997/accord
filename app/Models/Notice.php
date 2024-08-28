<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'to',
        'from',
        'upload_id',
        'shipper_upload_id',
        'name',
        'status'
    ];
    protected $table = 'notices';
    use HasFactory;
}
