<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;
use DB;

class UserController extends Controller
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
        return view('admin/manageUser')
                ->with("setting", $setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::orderBy('agent_name')->get();
        $setting = [
            "alias"=>Setting::find('company_alias'),
        ];
        return view('admin/createUser')
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
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact = $request->phone;
            $user->agent_id = $request->agent;
            $user->password = Hash::make('p@ssword123');
            if (!$user->save()) {
                return response()->json(["result"=>FALSE, "message"=>"Failed to store user data"]);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully store user data", "user"=>$user]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to store user data", "exception"=>$e]);
        }
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
    public function edit(Request $request, $ids)
    {
        $user = User::find($ids);
        $agents = Agent::orderBy('agent_name')->get();
        $setting = [
            "alias"=>Setting::find('company_alias'),
        ];
        return view('admin/editUser')
                ->with("setting", $setting)
                ->with('user', $user)
                ->with('agents', $agents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $user = User::find($request->ids);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact = $request->phone;
            $user->agent_id = $request->agent;
            // dd($user);
            if (!$user->save()) {
                return response()->json(["result"=>FALSE, "message"=>"Failed to update user data"]);
            }
            return response()->json(["result"=>TRUE, "message"=>"Successfully update user data", "user"=>$user]);
        } 
        catch (\Exception $e) {
            return response()->json(["result"=>FALSE, "message"=>"Failed to update user data", "exception"=>$e]);
        }
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

    public function userData(Request $request)
    {
        // dd($request->all());
        $user = User::orderBy('email')->get();
        $user = DataTables::of($user)
                    ->addColumn('action', function($row){
                        $btn = '<a href="admin/manageUser/edit/'.$row["id"].'" class="btn btn-success mr-1"><i class="fas fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        return $user;
        // return response()->json(["dataTable"=>$pricelist]);
    }
}
