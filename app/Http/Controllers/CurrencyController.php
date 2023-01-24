<?php

namespace App\Http\Controllers;

use App\Models\CurrencyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $currency_types = DB::table('currency_types')->where('is_active','=',1)->get();
        return view('admin.currency.add_new')->with('currency_types',$currency_types);
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show($id)
    {
        //
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
}
