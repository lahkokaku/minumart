<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_providers')->insert([
            [
                "type" => "E-Wallet",
                "name" => "OVO",
            ],
            [
                "type" => "E-Wallet",
                "name" => "Go-Pay",
            ],
            [
                "type" => "E-Wallet",
                "name" => "BliPay",
            ],
            [
                "type" => "Bank",
                "name" => "BCA",
            ],
            [
                "type" => "Bank",
                "name" => "Mandiri",
            ],
            [
                "type" => "Bank",
                "name" => "BNI",
            ],
            [
                "type" => "Bank",
                "name" => "BRI",
            ],
        ]);
    }
}
