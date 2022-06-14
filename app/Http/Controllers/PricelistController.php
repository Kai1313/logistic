<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Imports\PricelistImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use DB;

class PricelistController extends Controller
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
        return view('admin/managePricelist')
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
        return view('admin/createPricelist')
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
        try {
            $check = Pricelist::where('pricelist_code', $request->code)->first();
            if ($check) {
                return response()->json(["result"=>FALSE, "message"=>"Pricelist Code already been used!!! Try another code"]);
            }
            $pricelist = new Pricelist;
            $pricelist->pricelist_id = Str::uuid();
            $pricelist->pricelist_code = $request->code;
            $pricelist->province = $request->province;
            $pricelist->regency = $request->regency;
            $pricelist->district = $request->district;
            $pricelist->village = $request->village;
            $pricelist->pricelist_destination = $request->destination;
            $pricelist->pricelist_destination_type = $request->destinationType;
            $pricelist->pricelist_note = $request->note;
            $pricelist->pricelist_type = $request->type;
            $pricelist->pricelist_price = $request->price;
            $pricelist->pricelist_price_volume = $request->priceSpecial;
            $pricelist->pricelist_minimum_weight = $request->weight;
            $pricelist->pricelist_minimum_volume = $request->weightSpecial;
            $pricelist->pricelist_minimum_duedate = $request->minimumDuedate;
            $pricelist->pricelist_maximum_duedate = $request->maximumDuedate;
            if (!$pricelist->save()) {
                return response()->json(["result"=>FALSE, "message"=>"Failed to store pricelist data"]);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully store pricelist data", "pricelist"=>$pricelist]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to store pricelist data", "exception"=>$e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function show(Pricelist $pricelist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $ids)
    {
        $pricelist = Pricelist::find($ids);
        $provinces = Province::orderBy('name')->get();
        $regencies = Regency::where('province_id', $pricelist->province)->orderBy('name')->get();
        $districts = District::where('regency_id', $pricelist->regency)->orderBy('name')->get();
        $villages = Village::where('district_id', $pricelist->district)->orderBy('name')->get();
        $setting = [
            "alias"=>Setting::find('company_alias'),
        ];
        return view('admin/editPricelist')
                ->with("setting", $setting)
                ->with('pricelist', $pricelist)
                ->with('provinces', $provinces)
                ->with('regencies', $regencies)
                ->with('districts', $districts)
                ->with('villages', $villages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pricelist $pricelist)
    {
        try {
            $pricelist = Pricelist::find($request->ids);
            $pricelist->province = $request->province;
            $pricelist->regency = $request->regency;
            $pricelist->district = $request->district;
            $pricelist->village = $request->village;
            $pricelist->pricelist_destination = $request->destination;
            $pricelist->pricelist_destination_type = $request->destinationType;
            $pricelist->pricelist_note = $request->note;
            $pricelist->pricelist_type = $request->type;
            $pricelist->pricelist_price = $request->price;
            $pricelist->pricelist_price_volume = $request->priceSpecial;
            $pricelist->pricelist_minimum_weight = $request->weight;
            $pricelist->pricelist_minimum_volume = $request->weightSpecial;
            $pricelist->pricelist_minimum_duedate = $request->minimumDuedate;
            $pricelist->pricelist_maximum_duedate = $request->maximumDuedate;
            if (!$pricelist->save()) {
                return response()->json(["result"=>FALSE, "message"=>"Failed to update pricelist data"]);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully update pricelist data", "pricelist"=>$pricelist]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to update pricelist data", "exception"=>$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pricelist  $pricelist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricelist $pricelist)
    {
        //
    }

    public function pricelistData(Request $request)
    {
        // dd($request->all());
        $pricelist = Pricelist::orderBy('pricelist_code')->get();
        $pricelist = DataTables::of($pricelist)
                    ->addColumn('duedate', function($row){
                        $due = $row["pricelist_minimum_duedate"].' - '.$row["pricelist_maximum_duedate"];
                        return $due;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="admin/managePricelist/edit/'.$row["pricelist_id"].'" class="btn btn-success mr-1"><i class="fas fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->rawColumns(['duedate', 'action'])
                    ->make(true);
        return $pricelist;
        // return response()->json(["dataTable"=>$pricelist]);
    }

    public function pricelistFind(Request $request)
    {
        $pricelist = Pricelist::orderBy('pricelist_code')->get();
        $pricelist = DataTables::of($pricelist)
                    ->addColumn('duedate', function($row){
                        $due = $row["pricelist_minimum_duedate"].' - '.$row["pricelist_maximum_duedate"];
                        return $due;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="pickPricelist(\''.$row["pricelist_id"].'\')" class="btn btn-success mr-1"><i class="fas fa-edit"></i> Pick</button>';
                        return $btn;
                    })
                    ->rawColumns(['duedate', 'action'])
                    ->make(true);
        return $pricelist;
    }

    public function fetch(Request $request)
    {
        try {
            $pricelist = Pricelist::select('pricelists.*', 'provinces.name as province_name', 'regencies.name as regency_name', 'districts.name as district_name', 'villages.name as village_name')->where('pricelist_id', $request->ids)
            ->leftjoin('provinces', 'pricelists.province', '=', 'provinces.id')
            ->leftjoin('regencies', 'pricelists.regency', '=', 'regencies.id')
            ->leftjoin('districts', 'pricelists.district', '=', 'districts.id')
            ->leftjoin('villages', 'pricelists.village', '=', 'villages.id')
            ->first();
            return response()->json(["result"=>TRUE, "message"=>"Successfully fetched pricelist data", "pricelist"=>$pricelist]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to fetch pricelist data", "exception"=>$e]);
        }
    }

    public function import(Request $request)
    {
        // dd($request->all());
        // dd(Excel::toCollection(new PricelistImport, $request->file('imported')));
        // return response()->json(["result"=>TRUE, "message"=>"Successfully importing pricelist data"]);
        try {
            $importeds = Excel::toCollection(new PricelistImport, $request->file('imported'));
            // dd($importeds[0]);
            DB::beginTransaction();
            foreach ($importeds[0] as $imported) {
                $pricelist = new Pricelist;
                $pricelist->pricelist_id = Str::uuid();
                $pricelist->pricelist_code = $imported["code"];
                $pricelist->pricelist_note = $imported["note"];
                $pricelist->pricelist_type = ($imported["type"] != null)?$imported["type"]:'REG';
                $pricelist->pricelist_destination = $imported["destination"];
                $pricelist->pricelist_price = ($imported["price"] != null)?$imported["price"]:0;
                $pricelist->pricelist_price_volume = ($imported["spcprice"] != null)?$imported["spcprice"]:0;
                $pricelist->pricelist_minimum_weight = ($imported["minweight"] != null)?$imported["minweight"]:1;
                $pricelist->pricelist_minimum_volume = ($imported["minvolume"] != null)?$imported["minvolume"]:1;
                $pricelist->pricelist_minimum_duedate = $imported["mindue"];
                $pricelist->pricelist_maximum_duedate = $imported["maxdue"];
                $pricelist->pricelist_status = ($imported["sts"] != null)?$imported["sts"]:0;
                if (!$pricelist->save()) {
                    DB::rollback();
                    return response()->json(["result"=>FALSE, "message"=>"Failed to import pricelist data", "failed"=>$imported]);
                }
            }
            DB::commit();
            return response()->json(["result"=>TRUE, "message"=>"Successfully importing pricelist data", "count"=>count($importeds[0])]);
        } 
        catch (\Throwable $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to import pricelist data", "exception"=>$e]);
        }
    }

    public function getRegencies(Request $request)
    {
        try {
            $regencies = Regency::where('province_id', $request->que)->orderBy('name')->get();
            return response()->json(["result"=>TRUE, "message"=>"Successfully fetched regencies data", "data"=>$regencies]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to get regencies data", "exception"=>$e]);
        }
    }

    public function getDistricts(Request $request)
    {
        try {
            $districts = District::where('regency_id', $request->que)->orderBy('name')->get();
            return response()->json(["result"=>TRUE, "message"=>"Successfully fetched districts data", "data"=>$districts]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to get districts data", "exception"=>$e]);
        }
    }

    public function getVillages(Request $request)
    {
        try {
            $villages = Village::where('district_id', $request->que)->orderBy('name')->get();
            return response()->json(["result"=>TRUE, "message"=>"Successfully fetched villages data", "data"=>$villages]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to get villages data", "exception"=>$e]);
        }
    }
}
