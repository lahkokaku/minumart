<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Outlet;
use App\Models\Beverage;
use App\Models\PaymentProvider;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BeverageOrderController extends Controller
{

    public function __construct(){
        $this->middleware('IsCustomer');
    }

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
            'paymentProviders' => PaymentProvider::all()
        ]);
    }

    public function checkout(Request $request){
        $id = explode(',', $request->beverage_id);
        $quantity = explode(',', $request->quantity);

        $request->validate([
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            'payment_provider_id' => 'required|numeric',
            'payment_proof' => 'required|mimes:jpg,jpeg,png|max:3000'
        ]);

        if ($request->hasFile('payment_proof')){
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            $fileName = Auth::guard('web')->user()->name . '_' . time() . '.' . $extension;
            $path = $request->file("payment_proof")->storeAs("public/payment_proof",$fileName);
        }

        $len= count($id);
        $transactionHeader = TransactionHeader::create([
            'transaction_date'=> Carbon::now(),
            'total_price' => $request->grand_total,
            'user_id' => !Auth::user() ? 1 : Auth::user()->id,
            'status' => "1",
            'payment_provider_id' => $request->payment_provider_id,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'payment_proof' => $fileName,
        ]);
        for ($i = 0; $i < $len ; $i++){
            $beverage = Beverage::find($id[$i]);
            TransactionDetail::create([
                'transaction_header_id'=> $transactionHeader->id,
                'beverage_id' => $beverage->id,
                'quantity' => $quantity[$i],
                'total_price' => $beverage->price * $quantity[$i]
            ]);
            $beverage->update([
                'quantity' => $beverage->quantity - 1
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
