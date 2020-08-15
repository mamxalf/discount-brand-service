<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('en_US');

        for($i = 1; $i <= 8; $i++) {
            DB::table('brands')->insert([
                'title' => $faker->jobTitle
            ]);
        }
    }
}
