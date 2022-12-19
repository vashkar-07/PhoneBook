<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    function storeAdmin(Request $request){
        // return $request->organization;
        $this->validate($request,[
            'name' => 'required|max:255',
            'organization' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);
        admin::create([
            'name' => $request->name,
            'organization' => $request->organization,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login');

    }

    function showOrgData(){
        $data = admin::all();
        return view('register', ['data'=> $data]);
    }

    function storeUser(Request $request){
        // return $request->organization;
        $this->validate($request,[
            'name' => 'required|max:255',
            'organization' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'organization' => $request->organization,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('login');
    }
}
