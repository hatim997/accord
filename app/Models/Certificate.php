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
        return $this->belongsTo(AgencyInfos::class, 'producer_user_id','user_id');
    }

    public function certificatePolicies()
    {
        return $this->hasMany(CertificatePolicy::class, 'certificate_id');
    }
    public function driverDetails()
{
    return $this->belongsTo(DriverDetail::class, 'client_user_id'); // Adjust the foreign key if needed
}

    public function driver()
    {
        return $this->belongsTo(DriverDetail::class, 'client_user_id','user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'client_user_id'); // Adjust if foreign key differs
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
