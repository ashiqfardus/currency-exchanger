<?php

namespace App\Http\Controllers;

use App\Models\CurrencyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{

    public function index()
    {
        $currency_types = DB::table('currency_types')->where('is_active','=',1)->get();
        $data = DB::table('currency_details')
            ->select('currency_details.*','currency_types.name as currency_type_name')
            ->leftJoin('currency_types','currency_details.currency_type','=','currency_types.id')
            ->get();
        $count = collect($data)->count();
        return view('admin.currency.view')->with(['count'=>$count, 'data'=>$data,'currency_types'=>$currency_types]);
    }

    public function create()
    {
        $currency_types = DB::table('currency_types')->where('is_active','=',1)->get();
        return view('admin.currency.add_new')->with('currency_types',$currency_types);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,gif',
            'reserve'=>'required|numeric',
            'currency_type'=>'required'
        ]);

        if (request()->hasFile('image')){
            $image = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('assets/images/currency',$image);
        }
        else{
            $image ='';
        }

        $data = [
          'name'=>$request->name,
            'image' => $image,
            'currency_type'=>$request->currency_type,
            'reserve'=>$request->reserve,
            'is_active'=>$request->is_active
        ];
        $result = DB::table('currency_details')->insert($data);
        if ($result){
            return redirect()->route('currency.create')->with('success','Currency has been added.');
        }
        else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function show($id)
    {
        return $id;
    }

    public function edit($id)
    {
        $currency_types = DB::table('currency_types')->where('is_active','=',1)->get();
        $currency_details = DB::table('currency_details')->where('id',$id)->get();
        return view('admin.currency.edit')->with(['currency_types'=>$currency_types, 'currency_details'=>$currency_details[0]]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'reserve'=>'required|numeric',
            'currency_type'=>'required'
        ]);

        $currency_details = DB::table('currency_details')->where('id',$id)->get();

        if (request()->hasFile('image')){
            $old_image = public_path('/assets/images/currency/'.$currency_details[0]->image);
            if (file_exists($old_image)){
                unlink($old_image);
            }
            $image = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('assets/images/currency',$image);
        }
        else{
            $image =$currency_details[0]->image;
        }

        $data = [
            'name'=>$request->name,
            'image' => $image,
            'currency_type'=>$request->currency_type,
            'reserve'=>$request->reserve,
            'is_active'=>$request->is_active
        ];

        $result = DB::table('currency_details')->where('id',$id)->update($data);
        if ($result){
            return redirect()->route('currency.index')->with('success','Currency has been updated.');
        }
        else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function destroy(Request $request)
    {
        $result = DB::table('currency_details')->where('id',$request->delete_id)->delete();
        if ($result){
            return redirect()->route('currency.index')->with('success','Currency has been Deleted successfully.');
        }
        else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function activate($id){
        $data = DB::table('currency_details')->where('id',$id)->get();
        if ($data[0]->is_active==1){
            $new = ['is_active'=>0];
        }
        else{
            $new = ['is_active'=>1];
        }
        $result = DB::table('currency_details')->where('id',$id)->update($new);
        if ($result){
            return redirect()->back()->with('success','User active status has been updated');
        }
        else{
            return redirect()->back()->with('error','Something went wrong.');
        }

    }

    public function getReserve($id){
        $data = DB::table('currency_details')->where('id',$id)->get();
        return response()->json($data[0]);
    }

    public function updateReserve(Request $request){
        $request->validate([
            'reserve'=>'required|numeric'
        ]);
        $newData = ['reserve'=>$request['reserve']];
        return $data = DB::table('currency_details')->where('id',$request['dataId'])->update($newData);
    }

    public function updateAllReserve(){
        $data = DB::table('currency_details')
            ->select('currency_details.*','currency_types.name as currency_type_name')
            ->leftJoin('currency_types','currency_details.currency_type','=','currency_types.id')
            ->where('currency_details.is_active',1)->get();

        return view('admin.currency.updateAllReserve')->with(['currency'=>$data]);
    }

    public function updateSaveReserve(Request $request){
        $request->validate([
            'reserve' => 'required',
//            'reserve.*'=> ' required|numeric'
        ],[
            'reserve' => 'Reserve field is required',
//            'reserve.*'=> 'Reserve field is required'
        ]);
        $id = $request->id;
        $reserve = $request->reserve;
        for ($i=0; $i<count($id); $i++){
            $result = DB::table('currency_details')->where('id',$id[$i])->update(['reserve'=>$reserve[$i]]);
        }
        return redirect()->back()->with('success','Reserve has been updated.');
    }
}
