<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\job;
use App\Models\department;
use App\Models\domain;
use App\Models\subdomain;

class userFisrtPageController extends Controller
{
    //
    function index(){
        $data = User::find(session('staff.id'));
        $jobs = job::where([
            'organization'=> session('staff.organization')
        ])->orderBy('hierarchy')->get();
        $depts = department::where([
            'organization'=> session('staff.organization')
        ])->orderBy('hierarchy')->get();
        $users = User::where([
            'organization'=> session('staff.organization')
        ])->get();
        $domains = domain::where([
            'organization'=> session('staff.organization')
        ])->get();
        $sub_domains = subdomain::where([
            'organization'=> session('staff.organization')
        ])
        ->orderBy('hierarchy')
        ->get();
        return view("userFirstPage", ["data"=>$data, "jobs"=>$jobs, "depts"=>$depts, "users"=>$users, 'domains'=>$domains, 'sub_domains'=>$sub_domains]);
    }
}
