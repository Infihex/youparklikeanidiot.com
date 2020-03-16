<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicensePlateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('license_plates')->insert([
            'uuid' => Str::uuid(4),
            'registration' => chr(rand(65,90)).chr(rand(65,90)).rand(10000, 99999),
        ]);
    }
}