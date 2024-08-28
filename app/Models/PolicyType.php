<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name', 'description', 'created_at', 'updated_at',
    ];

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    public function certificatePolicies()
    {
        return $this->hasMany(CertificatePolicy::class);
    }

    public function policyLimits()
    {
        return $this->hasMany(PolicyLimit::class);
    }

    public function certificateUmbrellas()
    {
        return $this->hasMany(CertificateUmbrella::class);
    }

    public function certificatePolicyLimits()
    {
        return $this->hasMany(CertificatePolicyLimit::class);
    }

}
