<?php

namespace App\Http\Controllers;
use App\Models\job;
use App\Models\User;
use App\Models\department;
use Illuminate\Http\Request;

class editPageController extends Controller
{
    //
    function index($id){
        if(session('staff')){
            $user = User::find($id);
            $jobs = job::where([
                'organization'=> session('staff.organization')
            ])->get();
            $dept = department::where([
                'organization'=> session('staff.organization')
            ])->get();
            return view('edit', ['jobs' => $jobs, 'depts'=> $dept, 'user'=> $user]);
        }
    }

    function storeData(Request $request){

        $data = User::find($request->id);
        $data['job title'] = $request->job_title;
        $data->mobile = $request->mobile;
        $data->name = $request->name;
        $data->about = $request->about;
        $data->facebook = $request->facebook;
        $data->linkedin = $request->linkedin;
        $data->twitter = $request->twitter;
        $data->github = $request->github;
        $data->departmant = $request->department;
        $data->save();

        return redirect('userFirstPage');
}
}
