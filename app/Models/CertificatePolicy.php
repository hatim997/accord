<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatePolicy extends Model
{
    use HasFactory;

    protected $table = 'certificate_policies';

    protected $fillable = [
        'certificate_id', 'policy_type_id','policy_amount', 'policy_id', 'policy_deductible',
        'policy_retention', 'is_policy_checked', 'is_risk_retention_insured',
        'is_actual_cash_value', 'insurance_provider_id', 'insurance_provider_code',
        'policy_number', 'issue_date', 'start_date', 'expiry_date',
    ];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function policyType()
    {
        return $this->belongsTo(PolicyType::class);
    }

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function insuranceProvider()
    {
        return $this->belongsTo(InsuranceProvider::class);
    }
}
