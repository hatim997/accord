<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InsuranceProvider;

class InsuranceProviderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $data = [
      [
        'name' => 'Denise Fisher',
        'address' => 'Apt# 642 8358 Morar Village',
        'contact_info' => '1-283-284-6176',
        'naic_number' => 'RVI82BRH6LV',
        'best_rating_number' => 'posuere+',
      ],
      [
        'name' => 'Camden Camacho',
        'address' => 'Ap #290-2808 Lobortis Street',
        'contact_info' => '1-220-422-1649',
        'naic_number' => 'EYK58JUD2XE',
        'best_rating_number' => 'conubia+',
      ],
      [
        'name' => 'Montana Velez',
        'address' => 'Ap #343-5354 Erat, Road',
        'contact_info' => '(298) 785-3342',
        'naic_number' => 'WID50BNU5QX',
        'best_rating_number' => 'sociis',
      ],
      [
        'name' => 'Uta Norton',
        'address' => 'Ap #361-2307 Non Street',
        'contact_info' => '(544) 366-6324',
        'naic_number' => 'CCU74HEQ5IG',
        'best_rating_number' => 'nonummy-',
      ],
      [
        'name' => 'Cade Cook',
        'address' => 'Ap #417-7310 Venenatis St.',
        'contact_info' => '(549) 754-0663',
        'naic_number' => 'HJG88GNR6JQ',
        'best_rating_number' => 'egestas',
      ],
    ];

    InsuranceProvider::insert($data);
  }
}
