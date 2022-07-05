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
        $agents = (session()->get('agent_type') < 0 )?Agent::where('agent_type', 0)->orderBy('agent_name')->get():Agent::where('agent_id', session()->get('agent_id'))->orderBy('agent_name')->get();
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
            $deposit->created_by = session()->get('user_id');
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
        if (session()->get('agent_type') < 0) {
            $deposit = Deposit::select('deposits.deposit_code', 'agents.agent_name', 'deposits.deposit_proof', 'deposits.deposit_amount', 'deposits.deposit_note')
                        ->orderBy('deposit_code')
                        ->join('agents', 'agents.agent_id', 'deposits.agent_id');
            $deposit = DataTables::of($deposit)
                        ->addColumn('status', function($row){
                            switch ($row["deposit_status"]) {
                                case 1:
                                    $btn = '<button type="button" class="btn btn-sm btn-success">Approved</button>';
                                    break;
                                case 2:
                                    $btn = '<button type="button" class="btn btn-sm btn-warning">Void</button>';
                                    break;                                
                                default:
                                    $btn = '<button type="button" class="btn btn-sm btn-default">Confirmation</button>';
                                    break;
                            }
                            return $btn;
                        })
                        ->addColumn('action', function($row){
                            if (session()->get('agent_type') < 0) {
                                $btn = '<button type="button" data-id="'.$row["deposit_id"].'" data-identifier="btn-approve" class="btn btn-sm btn-success mr-1 mb-1 btn-approve" '.(($row["deposit_status"] > 0)?'disabled':'').'><i class="fas fa-edit"></i>Approve</button>';
                                $btn .= '<button type="button" data-id="'.$row["deposit_id"].'" data-identifier="btn-void" class="btn btn-sm btn-warning mr-1 mb-1 btn-void" '.(($row["deposit_status"] > 0)?'disabled':'').'><i class="fas fa-edit"></i>Void</button>';
                            }
                            else {
                                $btn = '<a href="'.$row["deposit_id"].'" class="btn btn-sm btn-info mr-1 mb-1 btn-void"><i class="fas fa-edit"></i>Check</a>';
                            }
                            return $btn;
                        })
                        ->rawColumns(['status', 'action'])
                        ->make(true);
        }
        else {
            $deposit = Deposit::orderBy('deposit_code')->where('agent_id', session()->get('agent_id'));
            $deposit = DataTables::of($deposit)
                        ->addColumn('status', function($row){
                            switch ($row["deposit_status"]) {
                                case 1:
                                    $btn = '<button type="button" class="btn btn-sm btn-success">Approved</button>';
                                    break;
                                case 2:
                                    $btn = '<button type="button" class="btn btn-sm btn-warning">Void</button>';
                                    break;                                
                                default:
                                    $btn = '<button type="button" class="btn btn-sm btn-default">Confirmation</button>';
                                    break;
                            }
                            return $btn;
                        })
                        ->addColumn('action', function($row){
                            if (session()->get('agent_type') < 0) {
                                $btn = '<button type="button" data-id="'.$row["deposit_id"].'" data-identifier="btn-approve" class="btn btn-sm btn-success mr-1 mb-1 btn-approve"><i class="fas fa-edit"></i>Approve</button>';
                                $btn .= '<button type="button" data-id="'.$row["deposit_id"].'" data-identifier="btn-void" class="btn btn-sm btn-warning mr-1 mb-1 btn-void"><i class="fas fa-edit"></i>Void</button>';
                            }
                            else {
                                $btn = '<a href="'.$row["deposit_id"].'" class="btn btn-sm btn-info mr-1 mb-1 btn-void"><i class="fas fa-edit"></i>Check</a>';
                            }
                            return $btn;
                        })
                        ->rawColumns(['status', 'action'])
                        ->make(true);
        }
        return $deposit;
    }

    public function approveDeposit(Request $request)
    {
        try {
            DB::beginTransaction();
            $deposit = Deposit::find($request->ids);
            $deposit->deposit_status = 1;
            $depoAmount = $deposit->deposit_amount;
            $deposit->modified_by = session()->get('user_id');
            if (!$deposit->save()) {
                DB::rollback();
                return response()->json(["result"=>FALSE, "message"=>"Failed to approve deposit data", "exception"=>'at update deposit status']);
            }

            $agent = Agent::find($deposit->agent_id);
            $depoBefore = $agent->agent_deposit;
            $agent->agent_deposit = $depoBefore + $depoAmount;
            if (!$agent->save()) {
                DB::rollback();
                return response()->json(["result"=>FALSE, "message"=>"Failed to approve deposit data", "exception"=>'at update agent deposit']);
            }

            DB::commit();
            return response()->json(["result"=>TRUE, "message"=>"Successfully to approve deposit data"]);
        }
        catch (\Exception $e) {
            DB::rollback();
            return response()->json(["result"=>FALSE, "message"=>"Failed to approve deposit data", "exception"=>$e]);
        }
    }

    public function voidDeposit(Request $request)
    {
        try {
            $deposit = Deposit::find($request->ids);
            $deposit->deposit_status = 2;
            $deposit->modified_by = session()->get('user_id');
            if (!$deposit->save()) {
                DB::rollback();
                return response()->json(["result"=>FALSE, "message"=>"Failed to void deposit data", "exception"=>'at update deposit status']);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully to void deposit data"]);
        }
        catch (\Exception $e) {
            \Log::info($e);
            return response()->json(["result"=>FALSE, "message"=>"Failed to void deposit data", "exception"=>$e]);
        }
    }
}
