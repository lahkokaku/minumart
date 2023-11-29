<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\BeverageType;
use App\Models\Outlet;
use Illuminate\Http\Request;

class BeverageController extends Controller
{
     
    public function index()
    {
        return view('beverages.index',[
            'beverages' => Beverage::all()
        ]);
    }

     
    public function create()
    {
        return view ("beverages.create", [
            "beverageTypes" => BeverageType::all(),
            "outlets" => Outlet::all(),
        ]);
    }

    
    public function store(Request $request)
    {

        $request->validate([
            'beverage_type_id' => 'required',
            'outlet_id' => 'required',
            'nama' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        Beverage::create([
            'beverage_type_id' => $request->beverage_type_id, 
            'outlet_id' => $request->outlet_id, 
            'name' => $request->nama, 
            'price' => $request->price, 
            'quantity' => $request->quantity,
            'rating' => 0 ,
        ]);

        return redirect()->route('beverages.index')->with('success', "Beverage has successfuly created");

    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        $beverage = Beverage::find($id);
        $beverage->delete();
        return redirect()->back()->with('success',"Beverage has successfuly deleted");
    }
}
