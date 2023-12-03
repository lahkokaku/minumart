<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Beverage;
use App\Models\BeverageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'beverage_type_id' => 'required|numeric',
            'outlet_id' => 'required|numeric',
            'name' => 'required|string|min:4',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'photo' => 'required| mimes:png,jpeg,jpg | max:1999'
        ]);

        
        if ($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $request->name . '_' . time() . '.' . $extension;
            $path = $request->file("photo")->storeAs("public/beverage_photo",$fileName);
        }

        Beverage::create([
            'beverage_type_id' => $request->beverage_type_id, 
            'outlet_id' => $request->outlet_id, 
            'name' => $request->name, 
            'price' => $request->price, 
            'quantity' => $request->quantity,
            'rating' => 0 ,
            'photo' => $fileName
        ]);

        return redirect()->route('beverages.index')->with('success', "Beverage has been successfuly created");

    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $beverage = Beverage::find($id);

        if(!$beverage)
            return redirect()->back()->with('error', 'Beverage not found');

        return view('beverages.edit',[
            'beverage' => $beverage,
            "beverageTypes" => BeverageType::all(),
            "outlets" => Outlet::all(),
        ]);
    }

  
    public function update(Request $request, $id)
    {
        $beverage = Beverage::find($id);

        if(!$beverage)
            return redirect()->back()->with('error', 'Beverage not found');

        $request->validate([
            'beverage_type_id' => 'required|numeric',
            'outlet_id' => 'required|numeric',
            'name' => 'required|string|min:4',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'photo' => 'nullable|mimes:png,jpeg,jpg|max:1999'
        ]);

        $fileName = $beverage->photo;

        if ($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $request->name . '_' . time() . '.' . $extension;
            $path = $request->file("photo")->storeAs("public/beverage_photo",$fileName);
        }

        $beverage->update([
            'beverage_type_id' => $request->beverage_type_id, 
            'outlet_id' => $request->outlet_id, 
            'name' => $request->name, 
            'price' => $request->price, 
            'quantity' => $request->quantity,
            'photo' => $fileName
        ]);

        return redirect()->route('beverages.index')->with('success','Beverage has been successfully updateed');
    }

    public function updateQuantity(Request $request, $id){
        $beverage = Beverage::find($id);

        if(!$beverage)
            return redirect()->back()->with('error', 'Beverage not found');

        $request->validate([
            'quantity' => 'required|numeric'
        ]);

        $beverage->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->route('beverages.index')->with('success','Beverage quantity has been successfully updateed');
    }

    public function destroy($id)
    {
        $beverage = Beverage::find($id);

        if(!$beverage)
            return redirect()->back()->with('error', "Beverage is not found");

        $beverage->delete();
        return redirect()->back()->with('success',"Beverage has been successfuly deleted");
    }
}
