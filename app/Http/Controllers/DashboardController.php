<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('IsAdmin')->only(['admin']);
        $this->middleware('IsCustomer')->only(['user']);
    }

    public function user(){
        if(request('order') == null) {
            $transactionHeaders = TransactionHeader::where("user_id", Auth::guard("web")->user()->id)->first();
        }
        else {
            $transactionHeaders = TransactionHeader::find(request('order'));
        }

        return view('dashboards.user',[
            'transactionHeader' => $transactionHeaders
        ]);
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
