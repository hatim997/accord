<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $fillable = [
        'policy_type_id', 'policy_title', 'created_at', 'updated_at',
    ];

    public function policyType()
    {
        return $this->belongsTo(PolicyType::class);
    }

    public function insuranceProvider()
    {
        return $this->belongsTo(InsuranceProvider::class);
    }

    public function certificateUmbrellas()
    {
        return $this->hasMany(CertificateUmbrella::class, 'umbrella_subtype_id');
    }
}
