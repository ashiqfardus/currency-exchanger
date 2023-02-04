<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyMerger extends Controller
{
    public function create(){
        $currency_details = DB::table('currency_details')
            ->select('currency_details.*','currency_types.name as currency_type_name')
            ->leftJoin('currency_types','currency_details.currency_type','=','currency_types.id')
            ->where('currency_details.is_active','=',1)
            ->get();
        return view('admin.currency_merger.add_new')->with('currency_details',$currency_details);
    }

    public function getReceiveUrl($id){
        $data = DB::table('currency_details')
            ->select('currency_details.*','currency_types.name as currency_type_name')
            ->leftJoin('currency_types','currency_details.currency_type','=','currency_types.id')
            ->where('currency_details.is_active','=',1)
            ->where('currency_details.id', '!=', $id)
            ->get();

        $td ='<option value="">Select receive currency</option>';

        foreach ($data as $item){
            $td .= '
                <option value="'.$item->id.'" data-type="'.$item->currency_type_name.'">'.$item->name.'</option>
            ';
        }
        return response()->json(['td'=>$td]);
    }
}
