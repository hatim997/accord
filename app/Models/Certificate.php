<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_user_id', 'producer_user_id', 'created_at', 'date' ,'ars','ch','status','descrp','updated_at',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'producer_user_id');
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'client_user_id');
    }

    public function policies()
    {
        return $this->hasMany(CertificatePolicy::class);
    }

    public function policyLimits()
    {
        return $this->hasMany(CertificatePolicyLimit::class);
    }

    public function certificateUmbrellas()
    {
        return $this->hasMany(CertificateUmbrella::class);
    }
}
