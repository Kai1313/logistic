<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Setting;
use App\Models\Airwaybill;
use Illuminate\Http\Request;
use App\Exports\AirwaybillExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use DB;
use Log;

class ReportsController extends Controller
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
        return view('admin/manageReport')
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchReport(Request $request)
    {
        try {
            // dd($request->all());
            // return Excel::download(new AirwaybillExport, 'report-airwaybills.xlsx');
            $airwaybills = Airwaybill::select('airwaybills.awb_code', 'airwaybills.created_at', 'airwaybills.awb_status', 'agents.agent_name', 'pricelists.pricelist_code', 'airwaybills.payment_method', 'airwaybills.acceptance_method', 'airwaybills.awb_weight', 'airwaybills.awb_volume', 'airwaybills.awb_cost', 'airwaybills.awb_packaging_cost', 'airwaybills.awb_additional_cost', 'airwaybills.awb_insurance_cost', 'airwaybills.awb_discount', 'airwaybills.awb_total_cost')
            ->join('agents', 'agents.agent_id', 'airwaybills.agent_id')
            ->join('pricelists', 'pricelists.pricelist_id', 'airwaybills.pricelist_id');
            if (session()->get('agent_type') < 0) {
                $data = $airwaybills->get();
            }
            else {
                $data = $airwaybills->where('airwaybills.agent_id', session()->get('agent_id'))->get();
            }
            return view('admin/reportAirwaybills')
                ->with('data', $data);
        } 
        catch (\Exception $e) {
            Log::info($e);
        }
    }

    public function reportData(Request $request)
    {
        try {
            dd($request->all());
        } 
        catch (\Exception $e) {
            Log::info($e);
        }
        // $airwaybill = Agent::orderBy('agent_code');
        // $agent = DataTables::of($agent)
        //             ->addColumn('action', function($row){
        //                 $btn = '<a href="edit/'.$row["agent_id"].'" class="btn btn-sm btn-success mr-1"><i class="fas fa-edit"></i> Edit</a>';
        //                 return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // return $agent;
    }
}
