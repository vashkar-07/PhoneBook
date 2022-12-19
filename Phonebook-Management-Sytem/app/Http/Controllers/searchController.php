<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\job;
use App\Models\department;

class searchController extends Controller
{
    //
    function search(Request $request){
        if(session('staff')){
            $search = $_GET['search'];
            $count = 0;
            $data = User::find(session('staff.id'));
            $jobs = job::where([
                'organization'=> session('staff.organization')
            ])->orderBy('hierarchy')->get();
            $depts = department::where([
                'organization'=> session('staff.organization')
                ])->orderBy('hierarchy')->get();
            $users = User::where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('organization', 'like', "%$search%")
            ->orWhere('job title', 'like', "%$search%")
            ->orWhere('departmant', 'like', "%$search%")
            ->orWhere('mobile', 'like', "%$search%")
            ->orWhere('location', 'like', "%$search%")
            ->get();
            foreach ($users as $item) {
                # code...
                if($item->verified== false){
                    unset($users[$count]);
                }
                else if($item['organization']!=session('staff.organization')){
                    unset($users[$count]);
                }
                $count+=1;
            }
            return view('searchData', ['data'=>$data,'users'=>$users, 'jobs'=>$jobs, 'depts'=>$depts]);
        }
        else{
            return "Unauthorized access";
        }

    }
}
