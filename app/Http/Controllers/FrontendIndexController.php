<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    public function storeOrder(Request $request){
//        return $request;
        $request->validate([
           'send_id' => 'required',
           'receive_id' => 'required',
           'send_unit' => 'required',
           'receive_unit' => 'required',
           'send_amount' => 'required',
           'receive_amount' => 'required',
           'buyer_name' => 'required',
           'buyer_email' => 'required',
           'account_details' => 'required',
           'payment_details' => 'required',
           'payment_proof' => 'required|image',
        ]);

        if (request()->hasFile('payment_proof')){
            $image = time().request()->file('payment_proof')->getClientOriginalName();
            request()->file('payment_proof')->move('assets/images/payment_proof',$image);
        }
        else{
            $image ='';
        }

        //generate order no
        $row = DB::select("SELECT substring_index(MAX(order_no),'-',-1) as ext FROM orders ORDER BY id DESC LIMIT 1");
        if ($row[0]->ext == ''){
            $ext='1';
        }
        else{
            $ext =$row[0]->ext+1;
        }

        $sl_no ='';
        if ($ext<10){
            $sl_no = '00000'.$ext;
        }
        elseif ($ext<100){
            $sl_no = '0000'.$ext;
        }
        elseif($ext<1000){
            $sl_no = '000'.$ext;
        }
        elseif($ext<10000){
            $sl_no = '00'.$ext;
        }
        elseif($ext<100000){
            $sl_no = '0'.$ext;
        }
        else{
            $sl_no = $ext;
        }

        $order_no = 'CE-'.date('y').'-'.$sl_no;



        $data = [
            'user_id' => Auth::id(),
            'order_no' => $order_no,
            'send_id' => $request->send_id,
            'receive_id' => $request->receive_id,
            'send_unit' => $request->send_unit,
            'receive_unit' => $request->receive_unit,
            'send_amount' => $request->send_amount,
            'receive_amount' => $request->receive_amount,
            'buyer_name' => $request->buyer_name,
            'buyer_email' => $request->buyer_email,
            'account_details' => $request->account_details,
            'payment_details' => $request->payment_details,
            'payment_proof' => $image
        ];

        $result = DB::table('orders')->insert($data);
        Mail::to('ashiqfardus@hotmail.com')->send(new AdminOrderMail($data));
        if ($result){
            return view('order-success')->with(['success'=>'Your order has been placed.', 'order_no' => $order_no]);
        }
        else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }

}
