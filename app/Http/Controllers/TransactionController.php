<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    public function manage(){
        
        return view('transactions.manage', [
            "pendingTransactions" => TransactionHeader::where('status', '=', '1')->get(),
            "makingTransactions" => TransactionHeader::where('status', '=', '2')->get(),
            "readyTransactions" => TransactionHeader::where('status', '=', '3')->get(),
            "finishTransactions" => TransactionHeader::where('status', '=', '4')->get()    
        ]);
        
    }

    public function detail (TransactionHeader $transactionHeader){

        $message = "";
        $color = "";

        if($transactionHeader->status == 1){
            $message = "Pending";
            $color = "text-warning";
        }else if($transactionHeader->status == 2){
            $message = "Making";
            $color = "text-blue-4";
        }else if($transactionHeader->status == 3){
            $message = "Ready for Pick Up";
            $color = "text-blue-3";
        }else{
            $message = "Finished";
            $color = "text-success";
        }

        return view('transactions.detail', [
            "transactionHeader" => $transactionHeader,
            "message" => $message,
            "color" => $color,
        ]);

    }

    public function updateStatusAdmin(Request $request, $id){

        $transactionHeader = TransactionHeader::find($id);

        if(!$transactionHeader)
            return redirect()->back()->with('error', 'Transaction not found');

        $transactionHeader->update([
            "status" => $request->status
        ]);

        $message = "";

        if($request->status == 1)
            $message = "Pending";
        else if($request->status == 2)
            $message = "Making";
        else if($request->status == 3)
            $message = "Ready for Pick Up";
        else
            $message = "Finished";
        
        if($request->status == 4){
            $transactionHeader->update([
                "picked_time" => Carbon::now()
            ]);
        }else{
            $transactionHeader->update([
                "picked_time" => null
            ]);
        }

        return redirect()->back()->with('success', 'Order has been set to ' . $message);
    }
}
