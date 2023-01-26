<?php

namespace App\Http\Controllers;

use App\Models\CurrencyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{

    public function index()
    {
        $data = DB::table('currency_details')
            ->select('currency_details.*','currency_types.name as currency_type_name')
            ->leftJoin('currency_types','currency_details.currency_type','=','currency_types.id')
            ->get();
        $count = collect($data)->count();
        return view('admin.currency.view')->with(['count'=>$count, 'data'=>$data]);
    }

    public function create()
    {
        $currency_types = DB::table('currency_types')->where('is_active','=',1)->get();
        return view('admin.currency.add_new')->with('currency_types',$currency_types);
    }

    public function store(Request $request)
    {
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
            return redirect()->with('error','Something went wrong');
        }
    }

    public function show($id)
    {
        return $id;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
}
