<?php

namespace App\Http\Controllers;

use App\Models\BeverageType;
use Illuminate\Http\Request;

class BeverageTypeController extends Controller
{

    public function __construct(){
        $this->middleware('IsAdmin');
    }
    public function index()
    {
        return view('beverage-types.index', [
            "beverageTypes" => BeverageType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beverage-types.create');
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
            "name" => "required|string|min:4"
        ]);

        BeverageType::create([
            "name" => $request->name
        ]);

        return redirect()->route('beverage-types.index')->with('success', "Beverage Type has been successfully created");
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
        $beverageType = BeverageType::find($id);

        if(!$beverageType)
            return redirect()->back()->with('error', "Beverage Type not found");

        return view('beverage-types.edit', [
            "beverageType" => $beverageType
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
        $beverageType = BeverageType::find($id);

        if(!$beverageType)
            return redirect()->back()->with('error', "Beverage Type not found");

        $request->validate([
            "name" => "required|string|min:3"
        ]);

        $beverageType->update([
            "name" => $request->name
        ]);

        return redirect()->route('beverage-types.index')->with('success', "Beverage Type has been successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beverageType = BeverageType::find($id);

        if(!$beverageType)
            return redirect()->back()->with('error', "Beverage Type not found");

        $beverageType->delete();
        return redirect()->route('beverage-types.index')->with('success', "Beverage Type has been successfully deleted");
    }
}
