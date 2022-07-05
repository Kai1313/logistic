<?php

namespace App\Http\Controllers;

use App\Models\Airwaybill;
use App\Models\Pricelist;
use App\Models\Deposit;
use App\Models\Agent;
use App\Models\Invoice;
use App\Models\Subscribe;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use DB;

class AirwaybillController extends Controller
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
        return view('admin/manageAirwaybill')
                ->with("setting", $setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pricelists = Pricelist::latest()->get();
        $setting = [
            "alias"=>Setting::find('company_alias'),
        ];
        return view('admin/createAirwaybill')
                ->with("setting", $setting)
                ->with('pricelists', $pricelists);
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
            DB::beginTransaction();
            $airwaybill = new Airwaybill;
            $airwaybill->awb_id = Str::uuid();
            $airwaybill->agent_id = $request->session()->get('agent_id');
            $airwaybill->pricelist_id = $request->pricelist;
            $airwaybill->promo_code = $request->promo_code;
            $airwaybill->payment_method = $request->payment;
            $airwaybill->acceptance_method = $request->acceptance;
            $airwaybill->description = $request->description;
            $airwaybill->special_instruction = $request->specialInstruction;
            $airwaybill->awb_weight = $request->weight;
            $airwaybill->awb_length = $request->length;
            $airwaybill->awb_width = $request->width;
            $airwaybill->awb_height = $request->height;
            $airwaybill->awb_volume = (float)($request->length*$request->width*$request->height);
            $airwaybill->awb_packaging = $request->packaging;
            $airwaybill->awb_cost = (float)($request->weight*$request->hiddenPricelist);
            $airwaybill->awb_packaging_cost = $request->packagingCost;
            $airwaybill->awb_additional_cost = $request->additional;
            $airwaybill->awb_insurance_cost = $request->insurance;
            $airwaybill->awb_discount = $request->discount;
            $airwaybill->awb_total_cost = (float)($request->weight*$request->hiddenPricelist+($request->packagingCost+$request->insurance+$request->additional-$request->discount));
            $airwaybill->origin_name = $request->originName;
            $airwaybill->origin_contact = $request->originContact;
            $airwaybill->origin_description = $request->originDescription;
            $airwaybill->alias_name = $request->aliasName;
            $airwaybill->alias_contact = $request->aliasContact;
            $airwaybill->alias_description = $request->aliasDescription;
            $airwaybill->destination_name = $request->destinationName;
            $airwaybill->destination_contact = $request->destinationContact;
            $airwaybill->destination_description = $request->destinationDescription;
            $airwaybill->awb_status = 0;
            $airwaybill->created_by = session()->get('user_id');
            $airwaybill->awb_code = $this->generateUniqueCode();
            $codes = $airwaybill->awb_id;
            // Check deposit if agents
            $current = Agent::find(session()->get('agent_id'));
            if ($current->agent_type >= 0) {
                $currentDepo = (float)$current->agent_deposit;
                $totalCost = (float)($request->weight*$request->hiddenPricelist+($request->packagingCost+$request->insurance+$request->additional-$request->discount));
                // Get sharing profit
                $subs = Subscribe::find($current->subs_id);
                $sharing = (!is_null($subs->sharing_profit))?$subs->sharing_profit:0;
                $sharingAmount = (float) $totalCost*$sharing/100;
                if ($currentDepo < $totalCost) {
                    return response()->json(["result"=>FALSE, "message"=>"Failed to store airwaybill data. Insufficient Deposit"]);
                }
                // Decrease deposit
                $current->agent_deposit = $currentDepo - ($totalCost - $sharingAmount);
                if (!$current->save()) {
                    DB::rollback();
                    return response()->json(["result"=>FALSE, "message"=>"Failed to store airwaybill data. Error when decreasing deposit"]);
                }
                // Create invoice
                $invoice = new Invoice;
                $invoice->invoice_code = $this->generateUniqueInvoiceCode();
                $invoice->awb_id = $airwaybill->awb_id;
                $invoice->invoice_date = date('y-m-d');
                $invoice->invoice_information = 'Invoice untuk resi : '.$airwaybill->awb_code;
                $invoice->invoice_amount = $totalCost;
                $invoice->invoice_tax = 0;
                $invoice->invoice_total = $totalCost + 0;
                $invoice->invoice_status = 1;
                if (!$invoice->save()) {
                    DB::rollback();
                    return response()->json(["result"=>FALSE, "message"=>"Failed to store airwaybill data. Error when creating invoice"]);
                }
            }
            // dd($codes);
            if (!$airwaybill->save()) {
                DB::rollback();
                return response()->json(["result"=>FALSE, "message"=>"Failed to store airwaybill data"]);
            }
            
            DB::commit();
            return response()->json(["result"=>TRUE, "message"=>"Successfully store airwaybill data", "airwaybill"=>$codes]);
        } 
        catch (\Exception $e) {
            DB::rollback();
            \Log::info($e);
            return response()->json(["result"=>FALSE, "message"=>"Failed to store airwaybill data", "exception"=>$e]);
        }        
    }

    public function generateUniqueCode()
    {
        do {
            $company = Setting::find('company_code');
            $code = $company->setting_value.date('ymd').random_int(100000, 999999);
        } while (Airwaybill::where("awb_code", $code)->first());
        return $code;
    }

    public function generateUniqueInvoiceCode()
    {
        do {
            $code = 'INV-'.date('ymd').random_int(100000, 999999);
        } while (Invoice::where("invoice_code", $code)->first());
        return $code;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airwaybill  $airwaybill
     * @return \Illuminate\Http\Response
     */
    public function show(Airwaybill $airwaybill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airwaybill  $airwaybill
     * @return \Illuminate\Http\Response
     */
    public function edit(Airwaybill $airwaybill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airwaybill  $airwaybill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airwaybill $airwaybill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airwaybill  $airwaybill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airwaybill $airwaybill)
    {
        //
    }

    public function airwaybillData(Request $request)
    {
        if (session()->get('agent_type') < 0) {
            $airwaybill = Airwaybill::orderBy('created_at', 'desc');
            $airwaybill = DataTables::of($airwaybill)
                        ->addColumn('acceptance', function($row){
                            $acp = ($row["acceptance_method"] == 0)?'Non-COD':'COD';
                            return $acp;
                        })
                        ->addColumn('action', function($row){
                            $check = Invoice::where('awb_id', $row["awb_id"])->first();
                            $btn = '<a href="print/'.$row["awb_id"].'" class="btn btn-sm btn-success mr-1 mb-1" target="__blank"><i class="fas fa-print"></i> Print</a>';
                            $btn .= (is_null($check))?'<button type="button" class="btn btn-sm btn-success mr-1 mb-1" target="__blank" disabled><i class="fas fa-print"></i> Invoice</button>':'<a href="'.url('').'/admin/invoice/print/'.$row["awb_id"].'" class="btn btn-sm btn-success mr-1 mb-1" target="__blank"><i class="fas fa-print"></i> Invoice</a>';
                            $btn .= '<button type="button" data-id="'.$row["awb_id"].'" data-identifier="btn-approve" class="btn btn-sm btn-success mr-1 mb-1 btn-approve" '.(($row["awb_status"] > 0)?'disabled':'').'><i class="fas fa-edit"></i>Finish</button>';
                            $btn .= '<button type="button" data-id="'.$row["awb_id"].'" data-identifier="btn-void" class="btn btn-sm btn-warning mr-1 mb-1 btn-void" '.(($row["awb_status"] > 0)?'disabled':'').'><i class="fas fa-edit"></i>Void</button>';
                            return $btn;
                        })
                        ->rawColumns(['acceptance', 'action'])
                        ->make(true);            
        }
        else {
            $airwaybill = Airwaybill::orderBy('created_at', 'desc')->where('agent_id', session()->get('agent_id'));
            $airwaybill = DataTables::of($airwaybill)
                        ->addColumn('acceptance', function($row){
                            $acp = ($row["acceptance_method"] == 0)?'Non-COD':'COD';
                            return $acp;
                        })
                        ->addColumn('action', function($row){
                            $btn = '<a href="print/'.$row["awb_id"].'" class="btn btn-sm btn-success mr-1" target="__blank"><i class="fas fa-print"></i> Print</a>';
                            $btn .= '<a href="'.url('').'/admin/invoice/print/'.$row["awb_id"].'" class="btn btn-sm btn-success mr-1" target="__blank"><i class="fas fa-print"></i> Invoice</a>';
                            return $btn;
                        })
                        ->rawColumns(['acceptance', 'action'])
                        ->make(true);
        }
        return $airwaybill;
    }

    public function print(Request $request, $ids)
    {
        $logo = Setting::find('company_logo');
        $awb = Airwaybill::find($ids);
        $pricelist = Pricelist::find($awb->pricelist_id);
        return view('admin/printAirwaybill')
                ->with('awb', $awb)
                ->with('pricelist', $pricelist)
                ->with('logo', $logo->setting_value);
    }

    public function approveAirwaybill(Request $request)
    {
        try {
            DB::beginTransaction();
            $airwaybill = Airwaybill::find($request->ids);
            $airwaybill->awb_status = 1;
            $airwaybill->updated_by = session()->get('user_id');
            if (!$airwaybill->save()) {
                DB::rollback();
                return response()->json(["result"=>FALSE, "message"=>"Failed to finish airwaybill data", "exception"=>'at update airwaybill status']);
            }

            DB::commit();
            return response()->json(["result"=>TRUE, "message"=>"Successfully to finish airwaybill data"]);
        }
        catch (\Exception $e) {
            DB::rollback();
            return response()->json(["result"=>FALSE, "message"=>"Failed to finish airwaybill data", "exception"=>$e]);
        }
    }

    public function voidAirwaybill(Request $request)
    {
        try {
            $airwaybill = Airwaybill::find($request->ids);
            $airwaybill->awb_status = 2;
            $airwaybill->updated_by = session()->get('user_id');
            if (!$airwaybill->save()) {
                DB::rollback();
                return response()->json(["result"=>FALSE, "message"=>"Failed to void airwaybill data", "exception"=>'at update airwaybill status']);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully to void airwaybill data"]);
        }
        catch (\Exception $e) {
            \Log::info($e);
            return response()->json(["result"=>FALSE, "message"=>"Failed to void airwaybill data", "exception"=>$e]);
        }
    }
}
