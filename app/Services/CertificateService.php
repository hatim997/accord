<?php

namespace App\Services;

use Auth;
use Carbon\Carbon;
use App\Models\Certificate;
use App\Models\CertificatePolicy;
use App\Models\CertificatePolicyLimit;
use App\Models\CertificateUmbrella;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CertificateService
{
  protected $current_date_time;

  public function __construct()
  {
    $this->current_date_time = Carbon::now()->toDateTimeString();
  }

  public function store(array $certificateData)
  {
    $new_cert = new Certificate();
    $new_cert->client_user_id = Session::get('driver_id');
    $new_cert->producer_user_id = Auth::user()->id;
    $new_cert->ars =  $certificateData['ars'];
    $new_cert->descrp =  $certificateData['descrp'];
    $new_cert->ch =  $certificateData['ch'];
    $new_cert->created_at = $this->current_date_time;

    $new_cert->save();

    $cid = $new_cert->id;

    foreach ($certificateData['main_policy_sub'] as $k => $v) {
      foreach ($v as $val) {
        $certificatePolicy = new CertificatePolicy();
        $certificatePolicy->certificate_id = $cid;
        $certificatePolicy->policy_type_id = $k;
        $certificatePolicy->policy_id = $val;
        $certificatePolicy->policy_deductible = 0;
        $certificatePolicy->policy_retention = 0;
        $certificatePolicy->is_policy_checked = false;
        $certificatePolicy->is_risk_retention_insured = false;
        $certificatePolicy->is_actual_cash_value = false;
        $certificatePolicy->insurance_provider_code = $certificateData['insurance_provider_code'][$k];
        if ($certificateData['insurance_provider_code'][$k] == 'A') {
          $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][0];
        }
        elseif ($certificateData['insurance_provider_code'][$k] == 'B') {
          $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][1];
        }
        elseif ($certificateData['insurance_provider_code'][$k] == 'C') {
          $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][2];
        }
        elseif ($certificateData['insurance_provider_code'][$k] == 'D') {
          $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][3];
        }
        elseif ($certificateData['insurance_provider_code'][$k] == 'E') {
          $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][4];
        }
        elseif ($certificateData['insurance_provider_code'][$k] == 'F') {
          $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][5];
        }

        $certificatePolicy->policy_number = $certificateData['main_policy_polnum'][$k];
        $certificatePolicy->issue_date = Carbon::now()->format('Y-m-d');
        $certificatePolicy->start_date = $certificateData['main_policy_eff_date'][$k];
        $certificatePolicy->expiry_date = $certificateData['main_policy_exp_date'][$k];
        $certificatePolicy->save();
      }
    }

    if (!empty($certificateData['main_policy_sub'][10])) {
      foreach ($certificateData['main_policy_sub'] as $k => $v) {
        foreach ($certificateData['main_policy_sub'][10] as $vv => $val) {
          if ($k != 10) {
            $certificateUmbrella = new CertificateUmbrella();
            $certificateUmbrella->certificate_id = $cid;
            $certificateUmbrella->policy_type_id = $k;
            $certificateUmbrella->umbrella_subtype_id = $val;
            $certificateUmbrella->save();
          }
        }
      }
    }

    foreach ($certificateData['main_policy_coverage'] as $k => $v) {
      foreach ($certificateData['main_policy_coverage'][$k] as $vv => $val) {
        if (!empty($val)) {
          $certificatePolicyLimit = new CertificatePolicyLimit();
          $certificatePolicyLimit->certificate_id = $cid;
          $certificatePolicyLimit->policy_type_id = $k;
          $certificatePolicyLimit->policy_limit_id = $vv;
          $certificatePolicyLimit->amount = floatval(str_replace(',', '', $val));
          $certificatePolicyLimit->save();
        }
      }
    }

    return $new_cert;
  }

  public function update(array $certificateData)
  {
    $cert = Certificate::find($certificateData['cert_id']);
    $cert->ars =  $certificateData['ars'];
    $cert->descrp =  $certificateData['descrp'];
    $cert->ch =  $certificateData['ch'];
    $cert->updated_at = $this->current_date_time;

    $cert->save();

    foreach ($certificateData['main_policy_sub'] as $k => $v) {
      foreach ($v as $val) {
        $certificatePolicy = CertificatePolicy::where('certificate_id', $cert->id)
          ->where('policy_id', $val)
          ->first();
        if (isset($certificatePolicy->policy_id)) {
          $certificatePolicy->certificate_id = $cert->id;
          $certificatePolicy->policy_type_id = $k;
          $certificatePolicy->policy_id = $val;
          $certificatePolicy->policy_deductible = 0;
          $certificatePolicy->policy_retention = 0;
          $certificatePolicy->is_policy_checked = false;
          $certificatePolicy->is_risk_retention_insured = false;
          $certificatePolicy->is_actual_cash_value = false;
          $certificatePolicy->insurance_provider_code = $certificateData['insurance_provider_code'][$k];
          if ($certificateData['insurance_provider_code'][$k] == 'A') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][0];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'B') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][1];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'C') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][2];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'D') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][3];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'E') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][4];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'F') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][5];
          }
          $certificatePolicy->policy_number = $certificateData['main_policy_polnum'][$k];
          $certificatePolicy->issue_date = Carbon::now()->format('Y-m-d');
          $certificatePolicy->start_date = $certificateData['main_policy_eff_date'][$k];
          $certificatePolicy->expiry_date = $certificateData['main_policy_exp_date'][$k];
          $certificatePolicy->save();
        } else {
          $certificatePolicy = new CertificatePolicy();
          $certificatePolicy->certificate_id = $cert->id;
          $certificatePolicy->policy_type_id = $k;
          $certificatePolicy->policy_id = $val;
          $certificatePolicy->policy_deductible = 0;
          $certificatePolicy->policy_retention = 0;
          $certificatePolicy->is_policy_checked = false;
          $certificatePolicy->is_risk_retention_insured = false;
          $certificatePolicy->is_actual_cash_value = false;
          $certificatePolicy->insurance_provider_code = $certificateData['insurance_provider_code'][$k];
          if ($certificateData['insurance_provider_code'][$k] == 'A') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][0];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'B') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][1];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'C') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][2];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'D') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][3];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'E') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][4];
          }
          if ($certificateData['insurance_provider_code'][$k] == 'F') {
            $certificatePolicy->insurance_provider_id = $certificateData['insurance_provider_id'][5];
          }
          $certificatePolicy->policy_number = $certificateData['main_policy_polnum'][$k];
          $certificatePolicy->issue_date = Carbon::now()->format('Y-m-d');
          $certificatePolicy->start_date = $certificateData['main_policy_eff_date'][$k];
          $certificatePolicy->expiry_date = $certificateData['main_policy_exp_date'][$k];
          $certificatePolicy->save();
        }
      }
    }

    foreach ($certificateData['main_policy_coverage'] as $k => $v) {
      foreach ($certificateData['main_policy_coverage'][$k] as $vv => $val) {
        if (!empty($val)) {
          $certificatePolicyLimit = CertificatePolicyLimit::where('certificate_id', $cert->id)
            ->where('policy_limit_id', $vv)
            ->first();
          if (isset($certificatePolicyLimit->policy_limit_id)) {
            $certificatePolicyLimit->certificate_id = $cert->id;
            $certificatePolicyLimit->policy_type_id = $k;
            $certificatePolicyLimit->policy_limit_id = $vv;
            $certificatePolicyLimit->amount = floatval(str_replace(',', '', $val));
            $certificatePolicyLimit->save();
          } else {
            // $certificatePolicyLimit = new CertificatePolicyLimit();
            // $certificatePolicyLimit->certificate_id = $cert->id;
            // $certificatePolicyLimit->policy_type_id = $k;
            // $certificatePolicyLimit->policy_limit_id = $vv;
            // $certificatePolicyLimit->amount = $val;
            // $certificatePolicyLimit->save();
          }
        }
      }
    }

    return $cert;
  }
}
