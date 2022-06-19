<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Agent;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;

class DepositsController extends Controller
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
        return view('admin/manageDeposit')
                ->with("setting", $setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::where('agent_type', 0)->orderBy('agent_name')->get();
        $setting = [
            "alias"=>Setting::find('company_alias'),
        ];
        return view('admin/createDeposit')
                ->with("setting", $setting)
                ->with('agents', $agents);
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
            $deposit = new Deposit;
            $deposit->deposit_id = Str::uuid();
            $deposit->agent_id = $request->agent;
            $deposit->deposit_note = $request->note;
            $deposit->deposit_amount = $request->amount;
            $file = Str::uuid().'-'.time().'.'.$request->proof->extension();
            $request->proof->move(public_path('assets/images/deposit-proof'), $file);
            $deposit->deposit_proof = $file;
            $deposit->deposit_code = $this->generateUniqueCode();
            if (!$deposit->save()) {
                return response()->json(["result"=>FALSE, "message"=>"Failed to store deposit data"]);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully store deposit data", "deposit"=>$deposit]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to store deposit data", "exception"=>$e]);
        }
    }

    public function generateUniqueCode()
    {
        do {
            $code = 'DPS'.date('ymd').random_int(100000, 999999);
        } while (Deposit::where("deposit_code", $code)->first());
        return $code;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }

    public function depositData(Request $request)
    {
        // dd($request->all());
        $deposit = Deposit::orderBy('deposit_code')->get();
        $deposit = DataTables::of($deposit)
                    ->addColumn('action', function($row){
                        $btn = '<a href="admin/manageDeposit/edit/'.$row["deposit_id"].'" class="btn btn-success mr-1"><i class="fas fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        return $deposit;
        // return response()->json(["dataTable"=>$pricelist]);
    }
}
