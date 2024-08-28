<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShipperDriver;
use App\Models\ShipperInfos;
use App\Models\User;
use Hash;

class ShipperInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $shipper = new User();
      $shipper->name = 'Jack';
      $shipper->email = 'shipper@gmail.com';
      $shipper->password = Hash::make('123');
      $shipper->role = 'shipper';
      $shipper->save();

      ShipperInfos::create([
        'user_id' => $shipper->id,
        'name' => 'Ship Show',
        'address' => 'Apt 10, West Rd',
        'address2' => 'Not Know',
        'state' => 'New York',
        'city' => 'New York City',
        'zip' => '10004',
        'cellphone' => '1 456 2359',
        'extra_email' => 'shipwork@email.net',
        'status' => 1,
      ]);

      ShipperDriver::create([
        'shipper_id'  => $shipper->id,
        'driver_id' => 3,
        'relation_status' => 1
      ]);
    }
}
