<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all()->except(Auth::id());
        $dataCount = collect($data)->count();
        return view('admin.user.view')->with(['users'=>$data, 'n'=>1, 'count'=>$dataCount]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function verify($id){
        $user = User::find($id);
        $user->email_verified_at=now();
        $user->save();
        return redirect()->back()->with('success','User has been approved');
    }

    public function activate($id){
        $user = User::find($id);
        if ($user->is_active==1){
            $user->is_active =0;
        }
        else{
            $user->is_active =1;
        }
        $user->save();
        return redirect()->back()->with('success','User active status has been updated');
    }
}
