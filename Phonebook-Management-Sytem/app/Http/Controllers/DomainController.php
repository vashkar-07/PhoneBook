<?php

namespace App\Http\Controllers;
use App\Models\domain;
use App\Models\subdomain;
use App\Models\job;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    //
    function updateDomain(Request $request){
        $domain = domain::find($request->id);
        $domain->domain_name = $request->domain;
        $domain->save();
        return redirect('admin');
    }

    function storeDomain(Request $request){
        $domain = new domain;
        $domain->organization = session('user.organization');
        $domain->domain_name = $request->domain;
        $domain->save();
        return redirect('admin');
    }

    function showDataDomain($id){
        $data = domain::find($id);
        return view('updateDomain', ['data'=> $data]);
    }

    function deleteDomain($id){
        $data = domain::find($id);
        $data->delete();
        return redirect('admin');
    }

    function updateSubDomain(Request $request){
        $job = job::where('organization', session('user.organization'))->where('job_title', $request->sub_domain)->first();
        $sub_domain = subdomain::find($request->id);
        $sub_domain->sub_domain_name = $request->sub_domain;
        $sub_domain->hierarchy = $request->hr;
        $sub_domain->save();
        $job->job_title = $request->sub_domain;
        $job->hierarchy = $request->hr;
        $job->save();
        return redirect('admin');
    }

    function storeSubDomain(Request $request){
        $sub_domain = new subdomain;
        $sub_domain->organization = session('user.organization');
        $sub_domain->domain_name = $request->domain;
        $sub_domain->sub_domain_name = $request->sub_domain;
        $sub_domain->hierarchy = $request->hr;
        $sub_domain->save();
        $job = new job;
        $job->organization = session('user.organization');
        $job->job_title = $request->sub_domain;
        $job->hierarchy = $request->hr;
        $job->save();
        return redirect('admin');
    }

    function showDataSubDomain($id){
        $data = subdomain::find($id);
        return view('updateSubDomain', ['jobs'=> $data, 'id'=>$id]);
    }

    function deleteSubDomain($id){
        $data = subdomain::find($id);
        $job = job::where('organization', session('user.organization'))->where('job_title', $data->sub_domain_name)->first();
        $job->delete();
        $data->delete();

        return redirect('admin');
    }
}
