<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateUmbrella extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_id', 'policy_type_id', 'umbrella_subtype_id', 'created_at', 'updated_at',
    ];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function policyType()
    {
        return $this->belongsTo(PolicyType::class);
    }

    public function umbrellaSubtype()
    {
        // Assuming 'umbrella_subtype_id' is a foreign key in the 'policies' table
        return $this->belongsTo(Policy::class, 'umbrella_subtype_id');
    }
}
