<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Airwaybill;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Log;

class AirwaybillExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View {
        $airwaybills = Airwaybill::select('airwaybills.awb_code', 'airwaybills.created_at', 'airwaybills.awb_status', 'agents.agent_name')
            ->leftJoin('agents', 'agents.agent_code', 'airwaybills.agent_id')->get();
        Log::info(json_encode($airwaybills));
        return view('admin/reportAirwaybills', [
            'airwaybills' => $airwaybills
        ]);
    }
}
