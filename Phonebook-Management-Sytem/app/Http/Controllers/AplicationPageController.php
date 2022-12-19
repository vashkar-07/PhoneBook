<?php

namespace App\Http\Controllers;
use App\Models\job;
use App\Models\User;
use App\Models\department;
use Illuminate\Http\Request;

class AplicationPageController extends Controller
{
    //
    function index(){
        if(session('staff')){
            $jobs = job::where([
                'organization'=> session('staff.organization')
            ])->get();
            $dept = department::where([
                'organization'=> session('staff.organization')
            ])->get();
            return view('application', ['jobs' => $jobs, 'depts'=> $dept]);
        }
    }

    function storeData(Request $request){

            $path = $request->file('file')->store('public/img');
            $path = explode('public', $path);
            $path = "storage".$path[1];
            $data = User::find($request->id);
            $data['job title'] = $request->job_title;
            $data->location = $request->location;
            $data->imgDir = $path;
            $data->applied = 1;
            $data->mobile = $request->mobile;
            $data->about = $request->about;
            $data->facebook = $request->facebook;
            $data->linkedin = $request->linkedin;
            $data->twitter = $request->twitter;
            $data->github = $request->github;
            $data->departmant = $request->department;
            $data->save();

            return view('wait');
    }
}
