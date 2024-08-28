<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatePolicyLimit extends Model
{
  use HasFactory;

  protected $table = 'certificate_policy_limits';

  protected $fillable = ['certificate_id', 'policy_type_id', 'policy_limit_id', 'amount', 'is_checkbox', 'is_checked'];

  public function certificate()
  {
    return $this->belongsTo(Certificate::class);
  }

  public function policyType()
  {
    return $this->belongsTo(PolicyType::class);
  }

  public function policyLimit()
  {
    return $this->belongsTo(PolicyLimit::class);
  }
}
