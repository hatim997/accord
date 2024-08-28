<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscription_plan;

class subscriptionPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $subPlan = new Subscription_plan();
      $subPlan->name = 'Free';
      $subPlan->description = 'Certificate of Insurance';
      $subPlan->price = 'free';
      $subPlan->duration = 'month';
      $subPlan->exdetail = 'No Claims Contact,Nature of Goods,Value of Shipment, Signature of Insured or Agent.';
      $subPlan->save();
    }
}
