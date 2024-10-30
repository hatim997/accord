<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PolicyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = base_path() . '/database/seeds/policy_type.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
