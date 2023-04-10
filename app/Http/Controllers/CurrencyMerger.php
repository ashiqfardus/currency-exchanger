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

    //currency merger delete
    public function delete(Request $request){
        $id = $request->delete_id;

        $count = DB::table('currency_merger')->where('send_id', $id)->get();
        $count = collect($count)->count();
        $res = DB::table('currency_merger')->where('send_id', $id)->delete();

        if ($count == $res){
            return redirect()->back()->with('success', 'Deleted successfully');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    //get currency details for edit dropdown
    public function getCurrencyDetails($id){
        //get currency data for dropdown
        $currency_details = DB::table('currency_details')
            ->select('currency_details.*','currency_types.name as currency_type_name')
            ->leftJoin('currency_types','currency_details.currency_type','=','currency_types.id')
            ->where('currency_details.is_active','=',1)
            ->get();

        $option = '<option value="">Select Currency</option>';
        $currency_type= '';
        foreach ($currency_details as $item){
            $option .= '
                <option value="'.$item->id.'" '.($item->id == $id ? "selected" : "").' data-type="'.$item->currency_type_name.'">'.$item->name.'</option>

            ';

            if ($item->id == $id){
                $currency_type = $item->currency_type_name;
            }
        }

        //get currency merger data by send_currency_id
        $send_currency = DB::table('currency_merger')->where('send_id',$id)->get();
        $min_amnt = $send_currency[0]->min;
        $max_amnt = $send_currency[0]->max;


        //get existing table rows
        $mergedData = DB::table('currency_merger')
            ->select('currency_merger.*','currency_types.name as currency_type_name')
            ->leftJoin('currency_details','currency_merger.receive_id','=','currency_details.id')
            ->leftJoin('currency_types','currency_details.currency_type','=','currency_types.id')
            ->where('send_id',$id)->get();

        $tr = '';
        $dataId = 100;

        $active_status = $mergedData[0]->is_active;

        foreach ($mergedData as $row){
            $tr .= '
                <tr id="raw-row-id'.$dataId.'" class="row-item">
                    <input type="hidden" name="inc_prod_data_id[]" value="'.$dataId.'">
                    <td width="10px">
                        <label class="checkbox-area">
                            <input type="checkbox" name="raw-check-item" class="checkbox-raw-item" id="raw-checkbox-id'.$dataId.'" data-id="'.$dataId.'">
                            <span class="checkmark checkmark-item"></span>
                        </label>
                    </td>

                    <td width="250px">
                        <select onchange="getReceiveCurrencyTypeEdit('.$dataId.')" name="edit_receive_currency_id[]" id="edit_receive_currency_id'.$dataId.'" class="custom-field receive_currency_id" data-id="'.$dataId.'" required>
                            <option value="">Select receive currency</option>
                        ';


                    foreach ($currency_details as $cd){
                        if ($row->send_id !== $cd->id){
                            $tr .= '
                                <option value="'.$cd->id.'" data-type="'.$cd->currency_type_name.'" '.($cd->id==$row->receive_id ? "selected" : "").'>'.$cd->name.'</option>
                            ';
                        }
                    }


            $tr.='
                        </select>
                    </td>

                    <td width="180px">
                        <input type="text" style="border: inherit;" value="'.$row->currency_type_name.'" class="readOnly custom-field text-center" name="edit_receive_currency_type[]" id = "edit_receive_currency_type'.$dataId.'" data-id="'.$dataId.'" data-parsley-required="true">
                    </td>
                    <td width="150px">
                        <input class="custom-field text-end" value="'.$row->sent_unit.'" style="padding-right: 30px;" type="number" name="edit_sent_amount[]" id="edit_sent_amount'.$dataId.'" data-id="'.$dataId.'" data-parsley-required="true" data-parsley-min="0" step="0.01" data-parsley-type="number">
                    </td>
                    <td width="150px">
                        <input class="custom-field text-end" value="'.$row->receive_unit.'" style="padding-right: 30px;" type="number" name="edit_receive_amount[]" id="edit_receive_amount'.$dataId.'" data-id="'.$dataId.'" data-parsley-required="true" data-parsley-min="0" step="0.01" data-parsley-type="number">
                    </td>
                </tr>
            ';
            $dataId++;
        }



        return response()->json(
            [
                'currency_details' => $option,
                'currency_type_name' => $currency_type,
                'min'=>$min_amnt,
                'max' => $max_amnt,
                'tr' => $tr,
                'active_status' => $active_status
            ]
        );
    }


    //store updated currency merger
    function updateMerger(Request $request){
        $request->validate([
            'edit_currency' => 'required|numeric',
            'edit_min_amount' => 'required|numeric',
            'edit_max_amount' => 'required|numeric',
            'inc_prod_data_id' => 'required',
            'edit_receive_currency_id' => 'required',
            'edit_sent_amount' => 'required',
            'edit_receive_amount' => 'required',
        ]);

        $sendCurrencyId = $request->edit_currency;
        $editMin = $request->edit_min_amount;
        $editMax = $request->edit_max_amount;
        $editRcvId = $request->edit_receive_currency_id;
        $editSentAmount = $request->edit_sent_amount;
        $editRcvAmount = $request->edit_receive_amount;
        $is_active = $request->is_active;

        $deleteExistingData = DB::table('currency_merger')->where('send_id',$sendCurrencyId)->delete();

        //insert data
        $res = 0;

        for ($i=0; $i<count($editRcvId); $i++){
            $data = [
                'send_id' => $sendCurrencyId,
                'min' => $editMin,
                'max' => $editMax,
                'receive_id' => $editRcvId[$i],
                'sent_unit' => $editSentAmount[$i],
                'receive_unit' => $editRcvAmount[$i],
                'created_by' => Auth::user()->id,
                'is_active' =>$is_active
            ];

            $insert = DB::table('currency_merger')->insert($data);
            if ($insert){
                $res +=1;
            }
            else{
                $res = $res;
            }
        }

        if (count($editRcvId) == $res){
            return redirect()->back()->with('success', 'Currency merger edited successfully');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
