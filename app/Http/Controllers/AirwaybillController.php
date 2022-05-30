<?php

namespace App\Http\Controllers;

use App\Models\Airwaybill;
use App\Models\Pricelist;
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
        //
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
}
