<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    public function user(){
        return view('dashboards.user');
    }

    public function admin(){

        $month = Carbon::now()->month;
        $year = Carbon::now()->year;


        // Monthly Data
        $onGoingTransactionCountThisMonth = TransactionHeader::where('status', '!=', '4')->count();
        $finishedTransactionsThisMonth = TransactionHeader::where('status', '=', '4')
                                ->where('transaction_date', '>=', $year.'-'.$month.'-'.'01')
                                ->where('transaction_date', '<=', $year.'-'.$month.'-'.'31')
                                ->get();
        $revenueThisMonth = 0;

        foreach($finishedTransactionsThisMonth as $finishedTransaction){
            $revenueThisMonth += $finishedTransaction->total_price;
        }

        // Annual Data
        $finishedTransactionsThisYear = TransactionHeader::where('status', '=', '4')
                                ->where('transaction_date', '>=', $year.'-01-'.'01')
                                ->where('transaction_date', '<=', $year.'-12-'.'31')
                                ->get();
        $revenueThisYear = 0;

        foreach($finishedTransactionsThisYear as $finishedTransaction){
            $revenueThisYear += $finishedTransaction->total_price;
        }

        return view('dashboards.admin',[
            "onGoingTransactionCountThisMonth" => $onGoingTransactionCountThisMonth,
            "finishedTransactionCountThisMonth" => $finishedTransactionsThisMonth->count(),
            "revenueThisMonth" => $revenueThisMonth,
            "finishedTransactionCountThisYear" => $finishedTransactionsThisYear->count(),
            "revenueThisYear" => $revenueThisYear
        ]);
    }
}
