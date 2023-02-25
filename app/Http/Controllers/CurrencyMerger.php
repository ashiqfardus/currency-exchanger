<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    //store form data

    public function store(Request $request){
        $request->validate([
           'currency' => 'required|numeric',
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'inc_prod_data_id' => 'required',
            'receive_currency_id' => 'required',
            'sent_amount' => 'required',
            'receive_amount' => 'required'
        ]);

        $currency_id = $request->currency;
        $min_amount = $request->min_amount;
        $max_amount = $request->max_amount;
        $count = count($request->inc_prod_data_id);
        $receive_currency_id = $request->receive_currency_id;
        $sent_amount = $request->sent_amount;
        $receive_amount = $request->receive_amount;

        $res = 0;

        for ($i=0; $i<$count; $i++){
            $data = [
              'send_id' => $currency_id,
                'min' => $min_amount,
                'max' => $max_amount,
                'receive_id' => $receive_currency_id[$i],
                'sent_unit' => $sent_amount[$i],
                'receive_unit' => $receive_amount[$i],
                'created_by' => Auth::user()->id
            ];

            $insert = DB::table('currency_merger')->insert($data);
            if ($insert){
                $res +=1;
            }
            else{
                $res = $res;
            }

        }
        if ($count == $res){
            return redirect()->back()->with('success', 'Currency merged successfully');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    //currency merger view all
    public function index(){
        $data = DB::table('currency_merger as cm')
            ->leftJoin('currency_details as cd', 'cm.send_id','=','cd.id')
            ->leftJoin('currency_details as cdr', 'cm.receive_id','=','cdr.id')
            ->leftJoin('currency_types as ct', 'cd.currency_type', '=', 'ct.id')
            ->leftJoin('currency_types as ctr', 'cdr.currency_type', '=', 'ctr.id')
            ->select('cm.*', 'cd.name as send_currency_name','cdr.name as rcv_currency_name', 'ct.name as send_currency_type', 'ctr.name as rcv_currency_type')
            ->get();
        $data = collect($data)->groupBy('send_id');

        $count = collect($data)->count();
        return view('admin.currency_merger.view')->with(['count'=>$count, 'data'=>$data]);
    }
}
