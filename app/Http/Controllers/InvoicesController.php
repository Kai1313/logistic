<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Airwaybill;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $ids)
    {
        $setting = [
            "alias"=>Setting::find('company_alias'),
            "name"=>Setting::find('company_name'),
            "address"=>Setting::find('company_address'),
            "phone"=>Setting::find('company_phone'),
        ];
        $invoice = Invoice::where('awb_id', $ids)->first();
        $airwaybill = Airwaybill::find($ids);
        $agent = Agent::find($airwaybill->agent_id);
        return view('admin/printInvoice')
                ->with('invoice', $invoice)
                ->with('agent', $agent)
                ->with('airwaybill', $airwaybill)
                ->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
