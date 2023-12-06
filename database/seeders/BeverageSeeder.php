<?php

namespace Database\Seeders;

use App\Models\Outlet;
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
        $beverageTypes = [1, 2, 3];
        $names = ["Black Coffee", "Roasted Vanilla Milk", "Honey Green Tea"];
        $decriptions = [
            "Your simple everyday black coffee",
            "Vanilla milk with a kick of roasted flavour",
            "Green tea with a sweet taste of honey",
        ];
        $prices = [10000, 15000, 12000];
        $photo = ["black_coffee.png", "roasted_vanilla_milk.png", "honey_green_tea.png"];

        $outlets = Outlet::all();

        foreach($outlets as $outlet){
            for($j = 0; $j < count($beverageTypes); $j++){
                DB::table('beverages')->insert([
                    "beverage_type_id" => $beverageTypes[$j],
                    "outlet_id" => $outlet->id,
                    "name" => $names[$j],
                    "description" => $decriptions[$j],
                    "price" => $prices[$j],
                    "quantity" => 200,
                    "rating" => 0,
                    "photo" => $photo[$j],
                ]);
            };
        };

    }
}
