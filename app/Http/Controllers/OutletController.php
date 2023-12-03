<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{

    public function index()
    {
        return view("outlets.index",[
            'outlets' => Outlet::all()
        ]);
    }

    public function manage(){

        return view('outlets.manage', [
            "outlets" => Outlet::all()
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('outlets.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:4",
            "address" => "required|string|min:5",
            "open_time" => "required|string|min:5",
            "closed_time" => "required|string|min:5",
            "photo" => "required|mimes:png,jpeg,jpg|max:1999",
        ]);

        if ($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $request->name . '_' . time() . '.' . $extension;
            $path = $request->file("photo")->storeAs("public/outlet_photo",$fileName);
        }

        Outlet::create([
            "name" => $request->name,
            "address" => $request->address,
            "open_time" => $request->open_time,
            "closed_time" => $request->closed_time,
            "photo" => $fileName,
            "is_open" => true,
        ]);

        return redirect()->route('outlets.manage')->with('success', "Outlet has been successfully made");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outlet = Outlet::find($id);

        if(!$outlet)
            return redirect()->back()->with('error', "Outlet not found");

        return view('outlets.edit',[
            "outlet" => $outlet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $outlet = Outlet::find($id);

        if(!$outlet)
            return redirect()->back()->with('error', "Outlet not found");

        $request->validate([
            "name" => "required|string|min:4",
            "address" => "required|string|min:5",
            "open_time" => "required|string|min:5",
            "closed_time" => "required|string|min:5",
            "photo" => "nullable|mimes:png,jpeg,jpg|max:1999",
        ]);

        $fileName = $outlet->photo;

        if ($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $request->name . '_' . time() . '.' . $extension;
            $path = $request->file("photo")->storeAs("public/outlet_photo",$fileName);
        }

        $outlet->update([
            "name" => $request->name,
            "address" => $request->address,
            "open_time" => $request->open_time,
            "closed_time" => $request->closed_time,
            "photo" => $fileName,
        ]);

        return redirect()->route('outlets.manage')->with('success', "Outlet has been successfully updated");

    }

    public function updateStatus($id){

        $outlet = Outlet::find($id);

        if(!$outlet)
            return redirect()->back()->with('error', "Outlet not found");

        $outlet->update([
            "is_open" => !$outlet->is_open
        ]);

        return redirect()->back()->with('success', "Outlet has been successfully updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet = Outlet::find($id);

        if(!$outlet)
            return redirect()->back()->with('error', "Outlet not found");

        $outlet->delete();

        return redirect()->back()->with('success', "Outlet has been successfully deleted");
    }
}
