<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Openrequest extends Model
{
    protected $fillable = [
        'to',
        'from',           
        'titel',
        'status'
    ];
    protected $table = 'openrequests';
    use HasFactory;
}
