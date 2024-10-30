<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use App\Models\AgencyInfos;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $agent = new User();
    $agent->name = 'Agent';
    $agent->email = 'agent@gmail.com';
    $agent->password = Hash::make('password');
    $agent->role = 'agent';
    $agent->save();

    AgencyInfos::create([
      'user_id' => $agent->id,
      'name' => 'SaveInsure Co.',
      'address' => 'Apt 10, West Rd',
      'state' => 'Florida',
      'city' => 'Orlando',
      'zip' => '33332',
      'cellphone' => '1 234 6789',
      'fax' => '1 335 6797',
      'extra_email' => 'agent2@gmail.com',
      'producer_customer_number' => 'RXDERF536',
      'is_active' => 1,
    ]);
  }
}
