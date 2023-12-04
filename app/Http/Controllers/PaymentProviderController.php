<?php

namespace App\Http\Controllers;

use App\Models\PaymentProvider;
use Illuminate\Http\Request;

class PaymentProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment-providers.index', [
            "paymentProviders" => PaymentProvider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment-providers.create');
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
            "name" => "required|string",
            "type" => "required|string"
        ]);

        PaymentProvider::create([
            "name" => $request->name,
            "type" => $request->type,
        ]);

        return redirect()->route('payment-providers.index')->with('success', "Payment Provider has been successfully created");
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
        $paymentProvider = PaymentProvider::find($id);

        if(!$paymentProvider)
            return redirect()->back()->with('error', "Payment Provider not found");

        return view('payment-providers.edit', [
            "paymentProvider" => $paymentProvider
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
        $paymentProvider = PaymentProvider::find($id);

        if(!$paymentProvider)
            return redirect()->back()->with('error', "Payment Provider not found");

        $request->validate([
            "name" => "required|string",
            "type" => "required|string",
        ]);

        $paymentProvider->update([
            "name" => $request->name,
            "type" => $request->type
        ]);

        return redirect()->route('payment-providers.index')->with('success', "Payment Provider has been successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentProvider = PaymentProvider::find($id);

        if(!$paymentProvider)
            return redirect()->back()->with('error', "Payment Provider not found");

        $paymentProvider->delete();
        return redirect()->route('payment-providers.index')->with('success', "Payment Provider has been successfully deleted");
    }
}
