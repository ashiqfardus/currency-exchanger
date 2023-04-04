<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendIndexController extends Controller
{
    public function index(){
            $send_currency = DB::table('currency_details')
            ->leftJoin('currency_types', 'currency_details.currency_type','=','currency_types.id')
            ->leftJoin('currency_merger', 'currency_details.id', '=', 'currency_merger.send_id')
            ->select('currency_details.*', 'currency_types.name AS currency_type', 'currency_merger.send_id', 'currency_merger.min', 'currency_merger.max')
            ->where('currency_merger.send_id', '!=', '')
            ->groupBy('currency_merger.send_id')
            ->get();

        return view('welcome')->with('send_currency', $send_currency);
    }


    //get receive currency details by send currency ID
    public function getReceiveCurrency($id){
        $data = DB::table('currency_merger')
            ->leftJoin('currency_details','currency_merger.receive_id','=','currency_details.id')
            ->leftJoin('currency_types', 'currency_details.currency_type', '=', 'currency_types.id')
            ->select('currency_merger.*','currency_details.name', 'currency_details.reserve', 'currency_types.name AS currency_type')
            ->where('currency_merger.send_id','=',$id)
            ->get();

        $option = '<option value="">Select Receive Currency</option>';

        foreach ($data as $item){
            $option .= '
                <option value="'.$item->receive_id.'" data-send="'.$item->sent_unit.'" data-receive="'.$item->receive_unit.'" data-reserve="'.$item->reserve.'">'.$item->name.' - '.$item->currency_type.'</option>
            ';
        }
        return response()->json(['option'=>$option]);
    }
}
