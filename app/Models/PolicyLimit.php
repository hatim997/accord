<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyLimit extends Model
{
  use HasFactory;

  protected $fillable = ['policy_type_id', 'coverage_item', 'nature_of_input'];

  public function policyType()
  {
    return $this->belongsTo(PolicyType::class);
  }

  public function certificatePolicyLimit()
  {
    return $this->hasMany(CertificatePolicyLimit::class, 'policy_limit_id');
  }
}
