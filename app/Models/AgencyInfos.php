<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyInfos extends Model
{
  use HasFactory;

  protected $table = 'agency_infos';
  protected $fillable = [
    'user_id',
    'name',
    'address',
    'address2',
    'city',
    'state',
    'zip',
    'cellphone',
    'fax',
    'lname',
    'ialn',
    'mname',
    'prefix',
    'fname',
    'suffix',
    'websit',
    'title',
    'producer_customer_number',
    'image_path',
    'is_active',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function getByUserId ($id) {
    return AgencyInfos::where('user_id',$id)->first();
  }

  public function getBrokersByAgency ($id) {
    return AgentDriver::with('driver:id,name,role,status')->where('agent_id', $id)->get();
  }

  public function getTruckersByAgency ($id) {
    return AgentDriver::with('driver:id,name,role,status')->where('agent_id', $id)->get();
  }
}
