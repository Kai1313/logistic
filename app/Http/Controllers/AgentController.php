<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;

class AgentController extends Controller
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
        return view('admin/manageAgent')
                ->with("setting", $setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::orderBy('name')->get();
        $regencies = Regency::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        $villages = Village::orderBy('name')->get();
        $setting = [
            "alias"=>Setting::find('company_alias'),
        ];
        return view('admin/createAgent')
                ->with("setting", $setting)
                ->with('provinces', $provinces)
                ->with('regencies', $regencies)
                ->with('districts', $districts)
                ->with('villages', $villages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $agent = new Agent;
            $agent->agent_id = Str::uuid();
            $agent->agent_name = $request->name;
            $agent->agent_type = $request->type;
            $agent->province = $request->province;
            $agent->regency = $request->regency;
            $agent->district = $request->district;
            $agent->village = $request->village;
            $agent->agent_description = $request->note;
            $agent->agent_address = $request->address;
            $agent->agent_phone = $request->phone;
            $agent->agent_email = $request->email;
            $agent->agent_code = $this->generateUniqueCode();
            if (!$agent->save()) {
                return response()->json(["result"=>FALSE, "message"=>"Failed to store agent data"]);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully store agent data", "agent"=>$agent]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to store agent data", "exception"=>$e]);
        }
    }

    public function generateUniqueCode()
    {
        do {
            $code = 'AGT'.date('ymd').random_int(100000, 999999);
        } while (Agent::where("agent_code", $code)->first());
        return $code;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $ids)
    {
        $agent = Agent::find($ids);
        $provinces = Province::orderBy('name')->get();
        $regencies = Regency::where('province_id', $agent->province)->orderBy('name')->get();
        $districts = District::where('regency_id', $agent->regency)->orderBy('name')->get();
        $villages = Village::where('district_id', $agent->district)->orderBy('name')->get();
        $setting = [
            "alias"=>Setting::find('company_alias'),
        ];
        return view('admin/editAgent')
                ->with("setting", $setting)
                ->with('agent', $agent)
                ->with('provinces', $provinces)
                ->with('regencies', $regencies)
                ->with('districts', $districts)
                ->with('villages', $villages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        try {
            $agent = Agent::find($request->ids);
            $agent->agent_name = $request->name;
            $agent->agent_type = $request->type;
            $agent->province = $request->province;
            $agent->regency = $request->regency;
            $agent->district = $request->district;
            $agent->village = $request->village;
            $agent->agent_description = $request->note;
            $agent->agent_address = $request->address;
            $agent->agent_phone = $request->phone;
            $agent->agent_email = $request->email;
            if (!$agent->save()) {
                return response()->json(["result"=>FALSE, "message"=>"Failed to update agent data"]);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully update agent data", "agent"=>$agent]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to update agent data", "exception"=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }

    public function agentData(Request $request)
    {
        // dd($request->all());
        $agent = Agent::orderBy('agent_code')->get();
        $agent = DataTables::of($agent)
                    ->addColumn('action', function($row){
                        $btn = '<a href="admin/manageAgent/edit/'.$row["agent_id"].'" class="btn btn-success mr-1"><i class="fas fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        return $agent;
        // return response()->json(["dataTable"=>$pricelist]);
    }
}
