<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AgentDriver;
use App\Models\DriverDetail;
use App\Models\User;
use Hash;

class TruckerInfoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $trucker = new User();
    $trucker->name = 'Mac';
    $trucker->email = 'trucker@gmail.com';
    $trucker->password = Hash::make('123');
    $trucker->role = 'truck_driver';
    $trucker->save();

    DriverDetail::create([
      'user_id' => $trucker->id,
      'name' => 'Ship Comp',
      'address' => 'Apt 10, West Rd',
      'address2' => 'Not Know',
      'state' => 'New York',
      'city' => 'New York City',
      'zip' => '10001',
      'cellphone' => '1 987 2014',
      'license_number' => 'RDX-1000',
      'license_expiry_date' => '2026-09-19',
      'license_type' => 'Commercial',
      'years_of_experience' => 5,
      'vehicle_registration_number' => 'RXG1999',
      'vehicle_make' => 'USA',
      'vehicle_model' => 'A1',
      'vehicle_year' => '2022',
      'vehicle_capacity' => 'Heavy Items',
      'vehicle_status' => 'Good',
      'mc_number' => 'HW343',
      'extra_email' => 'trvacancy@mail.co',
      'is_active' => 1,
    ]);

    AgentDriver::create([
      'agent_id'  => 2,
      'driver_id' => 3,
      'relation_status'=> 1,
    ]);
  }
}
