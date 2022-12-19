<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\User;
use App\Models\user_data;
use App\Models\subdomain;
use Illuminate\Support\Facades\Hash;
use App\Models\job;
use Illuminate\Auth\Events\Verified;

use function PHPSTORM_META\type;

class UserController extends Controller
{
    //
    function login(Request $request){
        $data = admin::where(['email'=>$request->email])->first();
        if(!$data){
            $data = User::where(['email'=>$request->email])->first();
            if(!$data || !Hash::check($request->password, $data->password)){
                return "Username of password not matched";
            }
            else{
                unset($data['password']);
                $request->session()->put('staff', $data);
                // return typeOf($data['applied']);
                if($data['applied'] == false){
                    // return "hello";
                    return redirect('application');
                }
                elseif($data['verified'] == true){
                    return redirect("userFirstPage");
                }
                else {
                    return redirect('wait');
                }
                // return redirect('application');
                // return redirect('admin');
            }
        }
        if(!$data || !Hash::check($request->password, $data->password)){
            return "Username of password not matched";
        }
        else{
            unset($data['password']);
            // return $data;
            $request->session()->put('user', $data);
            return redirect('admin');
        }
    }

    function showUserData($id){
        $data = User::find($id);
        return view('arman', ["data"=> $data]);
    }

    function acceptRequest($id){
        $data = User::find($id);
        $data->verified = true;
        $data->save();
        $sub_domain = subdomain::where('organization', session('user.organization'))->where('sub_domain_name', $data['job title'])->get(['domain_name']);
        $new_data = new user_data;
        $new_data->sub_section = $sub_domain[0]['domain_name'];
        // $new_data->sub_section = $sub_domain['domain_name'];
        $new_data->name = $data->name;
        $new_data->email = $data->email;
        $new_data->organization = $data->organization;
        $new_data->about = $data->about;
        $new_data['job title'] = $data['job title'];
        $new_data->departmant = $data->departmant;
        $new_data->imgDir = $data->imgDir;
        $new_data->hierarchy = $data->hierarchy;
        $new_data->verified = $data->verified;
        $new_data->applied = $data->applied;
        $new_data->mobile = $data->mobile;
        $new_data->facebook = $data->facebook;
        $new_data->twitter = $data->twitter;
        $new_data->linkedin = $data->linkedin;
        $new_data->github = $data->github;
        $new_data->location = $data->location;
        $new_data->save();
        return redirect('admin');
    }

    function rejectRequest($id){
        $data = User::find($id);
        $data->applied = false;
        $data->save();
        return redirect('admin');
    }
}
