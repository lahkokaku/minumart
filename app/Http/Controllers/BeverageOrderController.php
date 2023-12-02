<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Outlet;
use App\Models\Beverage;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BeverageOrderController extends Controller
{
    public function index($outlet= null ){

        if (!$outlet ) return redirect()->route("outlets.index")->with('error', "You must choose the outlet first");

        $outlet = Outlet::find($outlet);
        $beverages = Beverage::where("outlet_id",$outlet->id)->get();
        return view('beverage-orders.index',[
            'outlet' => $outlet,
            'beverages' => $beverages
        ]);
    }

    public function store(Request $request){
        $id = explode(",",$request->id);
        $quantity = explode(",",$request->quantity);
        
        // dd($id);
        // $len = count($id);
        // for ($i = 0; $i < $len; $i++) {
        //     $beverage = Beverage::find   ($id[$i]);
        // }

        return view('beverage-orders.check-out', [
            'id' => $id,
            'quantity' => $quantity,
            'outlet' => Outlet::find($request->outlet_id),
            'beverages' => Beverage::all(),
            'grandTotal' => $request->grand_total,
        ]);
    }

    public function checkout( Request $request){
        $id = explode(',', $request->beverage_id);
        $quantity = explode(',', $request->quantity);

        $len= count($id);
        $transactionHeader = TransactionHeader::create([
            'transaction_date'=> Carbon::now(),
            'total_price' => $request->grand_total,
            'user_id' => !Auth::user() ? 1 : Auth::user()->id,
            'status' => "1"
        ]);
        for ($i = 0; $i < $len ; $i++){
            $beverage = Beverage::find($id[$i]);
            TransactionDetail::create([
                'transaction_header_id'=> $transactionHeader->id,
                'beverage_id' => $beverage->id,
                'quantity' => $quantity[$i],
                'total_price' => $beverage->price * $quantity[$i]
            ]);
        }

        return redirect()->route('beverage-orders.finish-order','avail=true')->with("success", "Order has been successfully added");
    }

    public function finishOrder(){
        if(request('avail') == false || request('avail') == null)
            return redirect()->route("outlets.index");
        return view("beverage-orders.finish-order");
    }

    public function manage(){
        

        return view('beverage-orders.manage', [
            "pendingTransactions" => TransactionHeader::where('status', '=', '1')->get(),
            "makingTransactions" => TransactionHeader::where('status', '=', '2')->get(),
            "readyTransactions" => TransactionHeader::where('status', '=', '3')->get(),
            "finishTransactions" => TransactionHeader::where('status', '=', '4')->get()    
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
            $message = "On Check";
        else if($request->status == 2)
            $message = "Making";
        else if($request->status == 3)
            $message = "Ready for Pick Up";
        else
            $message = "Finished";

        return redirect()->route('beverage-orders.manage')->with('success', 'Order has been set to ' . $message);
    }
    
}
