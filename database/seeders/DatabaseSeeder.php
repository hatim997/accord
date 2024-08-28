<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call(AdminSeeder::class);
    $this->call(AgentSeeder::class);
    $this->call(PolicyTypeSeeder::class);
    $this->call(PoliciesSeeder::class);
    $this->call(PolicyLimitSeeder::class);
    $this->call(subscriptionPlansSeeder::class);
    $this->call(TruckerInfoSeeder::class);
    $this->call(InsuranceProviderSeeder::class);
    $this->call(ShipperInfoSeeder::class);
  }
}
