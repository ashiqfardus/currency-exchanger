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
}
