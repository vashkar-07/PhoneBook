<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\job;
use App\Models\User;
use App\Models\department;
use App\Models\domain;
use App\Models\subdomain;

class AdminController extends Controller
{
    //
    function index(Request $request){
        if(session('user')){
            $data = job::where([
                'organization'=> session('user.organization')
            ])->orderBy('hierarchy')->get();
            $dept = department::where([
                'organization'=> session('user.organization')
            ])->orderBy('hierarchy')->get();
            $users = User::where([
                'organization'=> session('user.organization')
            ])->get();
            $domains = domain::where([
                'organization'=> session('user.organization')
            ])->get();
            $subdomains = subdomain::where([
                'organization'=> session('user.organization')
            ])->orderBy('hierarchy')->get();
            return view('admin', ['jobs' => $data, 'depts'=> $dept, 'users'=>$users, 'domains'=>$domains, 'sub_domains'=>$subdomains]);
        }
    }
}
