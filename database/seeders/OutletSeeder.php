<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $photos = ["minumart_syahdan.png", "minumart_kebayoran_lama.png"];
        $len = count($names);

        for($i = 0; $i < $len; $i++){
            DB::table("outlets")->insert([
                "name" => $names[$i],
                "address" => $addresses[$i],
                "photo" => $photos[$i],
                "open_time" => Carbon::createFromTime(9, 0, 0),
                "closed_time" => Carbon::createFromTime(21, 0, 0),
                "is_open" => true,
            ]);
        }
    }
}
