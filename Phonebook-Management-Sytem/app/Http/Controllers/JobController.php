<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\job;
use App\Models\subdomain;

class JobController extends Controller
{
    //
    function index(Request $request){
        $job = new job;
        $job->organization = session('user.organization');
        $job->job_title = $request->job;
        $job->hierarchy = $request->hr;
        $job->save();

        return redirect('admin');
    }

    function delete($id){
        $data = job::find($id);
        $data->delete();
        return redirect('admin');
    }

    function showData($id){
        $data = job::find($id);
        return view('updateJob', ['data'=> $data]);
    }

    function update(Request $request){
        $job = job::find($request->id);
        $job->job_title = $request->job;
        $job->hierarchy = $request->hr;

        $job->save();
        $sub_domain = subdomain::where(
            'sub_domain_name', $request->job
        )->first();
        $sub_domain->hierarchy = $request->hr;
        $sub_domain->save();
        return redirect('admin');
    }
}
