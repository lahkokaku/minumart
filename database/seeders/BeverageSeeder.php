<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beverages')->insert([
            "beverage_type_id" => 1,
            "outlet_id" => 1,
            "name" => "Dummy",
            "price" => 20000,
            "quantity" => 200,
            "rating" => 0,
            "photo" => "dummy.png",
        ]);
    }
}
