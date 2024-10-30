<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'contact_info', 'naic_number', 'best_rating_number',
    ];

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    public function certificatePolicies()
    {
        return $this->hasMany(CertificatePolicy::class);
    }
}
