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
            'status' => 1
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

    
}
