<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use App\Models\job;
use App\Models\User;
use App\Models\domain;
use App\Models\subdomain;

class DepartmentController extends Controller
{
    //
    function index(Request $request){
        $dept = new department;
        $dept->organization = session('user.organization');
        $dept->department = $request->dept;
        $dept->hierarchy = $request->hierarchy;
        $dept->save();

        return redirect('admin');
    }
    function delete($id){
        $data = department::find($id);
        $data->delete();
        return redirect('admin');
    }

    function showData($id){
        $data = department::find($id);
        return view('updateDepartment', ['data'=> $data]);
    }

    function update(Request $request){
        $dept = department::find($request->id);
        $dept->department = $request->dept;
        $dept->hierarchy = $request->hr;
        $dept->save();
        return redirect('admin');
    }

    function searchDept(Request $request){
        $data = User::find(session('staff.id'));
        $job = job::where([
            'organization' =>session('staff.organization')
        ])->get();
        $users = User::where([
            'organization'=> session('staff.organization'),
            'departmant' => $request->department
        ])->get();
        $domains = domain::where([
            'organization'=> session('staff.organization')
        ])->get();
        $sub_domains = subdomain::where([
            'organization'=> session('staff.organization')
        ])->get();
        return view('searchDept', ['dept'=>$request->department, 'users' =>$users, 'domains'=>$domains, 'sub_domains'=>$sub_domains, 'data'=> $data]);
    }
}
