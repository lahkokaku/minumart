<?php

namespace Database\Seeders;

use App\Models\BeverageType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeverageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $names = ['Coffee', 'Tea', 'Milk', 'Milk Tea', 'Milk Coffee'];
        $len = count($names);

        for($i = 0; $i < $len; $i++){
            DB::table("beverage_types")->insert([
                "name" => $names[$i]
            ]);
        }

    }
}
