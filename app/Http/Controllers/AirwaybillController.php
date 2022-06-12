<?php

namespace App\Http\Controllers;

use App\Models\Airwaybill;
use App\Models\Pricelist;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pricelists = Pricelist::latest()->get();
        return view('admin/createAirwaybill')
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
            $airwaybill = new Airwaybill;
            $airwaybill->awb_id = Str::uuid();
            $airwaybill->agent_id = null;
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
            $airwaybill->awb_status = 1;
            $airwaybill->awb_code = $this->generateUniqueCode();
            // dd($airwaybill);
            if (!$airwaybill->save()) {
                return response()->json(["result"=>FALSE, "message"=>"Failed to store airwaybill data"]);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully store airwaybill data", "airwaybill"=>$airwaybill]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to store airwaybill data", "exception"=>$e]);
        }        
    }

    public function generateUniqueCode()
    {
        do {
            $code = 'MTL'.date('ymd').random_int(100000, 999999);
        } while (Airwaybill::where("awb_code", $code)->first());
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
        // dd($request->all());
        $airwaybill = Airwaybill::orderBy('created_at', 'desc')->get();
        $airwaybill = DataTables::of($airwaybill)
                    ->addColumn('action', function($row){
                        $btn = '<a href="admin/manageAirwaybill/edit/'.$row["awb_id"].'" class="btn btn-success mr-1"><i class="fas fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        return $airwaybill;
    }

    public function print(Request $request)
    {
        $logo = Setting::find('company_logo');
        return view('admin/printAirwaybill')
                ->with('logo', $logo->setting_value);
    }
}
