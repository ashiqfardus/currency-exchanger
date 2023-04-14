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
            ->where('currency_merger.is_active', '=',1)
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
            ->where('currency_merger.is_active', '=',1)
            ->get();

        $option = '<option value="">Select Receive Currency</option>';

        foreach ($data as $item){
            $option .= '
                <option value="'.$item->receive_id.'" data-send="'.$item->sent_unit.'" data-receive="'.$item->receive_unit.'" data-reserve="'.$item->reserve.'" data-receive-currency="'.$item->currency_type.'">'.$item->name.' - '.$item->currency_type.'</option>
            ';
        }
        return response()->json(['option'=>$option]);
    }


    //place order first step form data
    public function placeOrder(Request $request){

//        return $request;
        $data =[];
        $send_currency = DB::table('currency_details')
                                ->leftJoin('currency_types', 'currency_details.currency_type', '=', 'currency_types.id')
                                ->select('currency_details.*', 'currency_types.name as currency_type_name')
                                ->where('currency_details.id', $request->send_currency)->get();


        $receive_currency = DB::table('currency_details')
                            ->leftJoin('currency_types', 'currency_details.currency_type', '=', 'currency_types.id')
                            ->select('currency_details.*', 'currency_types.name as currency_type_name')
                            ->where('currency_details.id', $request->receive_currency)->get();

        $data = [
          'send_id' => $send_currency[0]->id,
          'send_currency_name' => $send_currency[0]->name,
          'send_currency_type' => $send_currency[0]->currency_type_name,
          'send_currency_image' => $send_currency[0]->image,
          'receive_id' => $receive_currency[0]->id,
          'receive_currency_name' => $receive_currency[0]->name,
          'receive_currency_type' => $receive_currency[0]->currency_type_name,
            'receive_currency_image' => $receive_currency[0]->image,
            'send_unit' => $request->send_unit,
            'receive_unit' => $request->receive_unit,
            'send_amount' => $request->send_amount,
            'receive_amount' => $request->receive_amount,
            'account_details' => $send_currency[0]->account_details,
            'instruction' => $send_currency[0]->instruction,
        ];

        return view('order')->with('formData', $data);
    }
}
