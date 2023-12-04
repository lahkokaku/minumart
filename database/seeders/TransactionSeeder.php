<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_headers')->insert([
            "user_id" => 1,
            "total_price" => 40000,
            "status" => "1",
            "transaction_date" => Carbon::now(),
            "payment_provider_id" => 3,
            "payment_proof" => 'dummy_proof.png',
            "account_name" => 'Joko',
            "account_number" => '5471249081',
        ]);
        DB::table('transaction_details')->insert([
            "transaction_header_id" => 1,
            "beverage_id" => 1,
            "quantity" => 2,
            "total_price" => 40000,
        ]);
    }
}
