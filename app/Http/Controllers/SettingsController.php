<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Agent;
use App\Models\Airwaybill;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = [
            "alias"=>Setting::find('company_alias'),
        ];
        $agent = Agent::find(session()->get('agent_id'));
        $airwaybill = (session()->get('agent_type') > 0)?Airwaybill::where('agent_id', $agent->agent_id)->orderBy('created_at'):Airwaybill::orderBy('created_at');
        $awbFinish = clone $airwaybill;
        $awbProcess = clone $airwaybill;
        // dd($airwaybill->where('awb_status', 1)->count());
        return view('admin/dashboard')
                ->with("agent", $agent)
                ->with("awball", $airwaybill->count())
                ->with("awbfinish", $awbFinish->where('awb_status', 1)->count())
                ->with("awbprocess", $awbProcess->where('awb_status', 0)->count())
                ->with("setting", $setting);
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
