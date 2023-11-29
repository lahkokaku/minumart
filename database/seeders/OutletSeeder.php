<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Minumart Syahdan', 'Minumart Kebayoran Lama'];
        $addresses = ['Jl. Kemanggisan III, No. 9', 'Jl. Kebayoran Lama, No. 91'];

        $len = count($names);

        for($i = 0; $i < $len; $i++){
            DB::table("outlets")->insert([
                "name" => $names[$i],
                "address" => $addresses[$i],
                "open_time" => '09:00',
                "closed_time" => '21:00',
                "is_open" => true,
            ]);
        }
    }
}
