<?php

use Illuminate\Database\Seeder;

class BrandMediaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 8; $i++) {
            DB::table('brand_media')->insert([
                'id_brand' => $i,
                'logo' => "logo" . $i . ".png"
            ]);
        }
    }
}
