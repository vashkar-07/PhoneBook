<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_data;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\Session\Session as SessionSession;
use Mail;
use Session;

class EmailController extends Controller
{
    //
    function create($id){
        $data = User::find($id);
        return view('email', ['data'=>$data]);
    }

    public function sendEmail(Request $request)
    {
        // return 'Hi';
        $request->validate([
          'email' => 'required|email',
          'subject' => 'required',
          'name' => 'required',
          'content' => 'required',
        ]);

        $data = [
          'subject' => $request->subject,
          'name' => $request->name,
          'email' => $request->email,
          'content' => $request->content
        ];


        Mail::send('email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject'])
          ->replyTo(session('staff.email'));
        });

        $request->session()->put('message', 'Email successfully sent!');
        return back();
    }


    function search_users_page(){
        return view('admin.admin_search_users_mail');
    }

    function search_users(Request $request){
        // $data = [];
        if (strtolower($request->dept)=='all' && strtolower($request->job)=='all' && strtolower($request->job)=='all') {
            $data = user_data::where('organization', session('user.organization'))->get();
        }
        elseif(strtolower($request->dept)=='all'){
            if(strtolower($request->sub_section)=='all'){
                $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('sub_section',$request->job)->get();
                // return 'hello';
            }
            elseif(strtolower($request->job)=='all'){
                $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('sub_section',$request->sub_section)->get();
            }
            else{
                $data = user_data::where('organization', session('user.organization'))->where('sub_section',$request->sub_section)->where('job title',$request->job)->get();
            }
        }
        elseif(strtolower($request->sub_section)=='all'){
            if(strtolower($request->job)=='all'){
                $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('departmant', $request->dept)->get();
            }

            else{
                $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('departmant', $request->dept)->where('sub_section',$request->sub_section)->get();
            }
            // return 'hello';
        }
        elseif(strtolower($request->job)=='all'){
            $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('departmant', $request->dept)->where('sub_section',$request->sub_section)->get();
        }
        else{
            $val = $request->dept;
            $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('departmant',$val)->where('sub_section',$request->sub_section)->where('job title',$request->job)->get();
        }
        // return $data;
        $data = json_decode(json_encode($data), true);
        return view('admin.admin_search_users_mail', ['data' =>$data]);
    }

    function send_email(Request $request){

        // $data = [
        //     'subject' => $request->subject,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'content' => $request->content
        //   ];


        //   Mail::send('email-template', $data, function($message) use ($data) {
        //     $message->to($data['email'])
        //     ->subject($data['subject'])
        //     ->replyTo(session('staff.email'));
        //   });

          $request->session()->put('message', 'Email successfully sent!');
          return back();
    }

    function search_sms_page(){
        return view('admin.admin_search_users_sms');
    }

    function search_sms(Request $request){
        // $data = [];
        if (strtolower($request->dept)=='all' && strtolower($request->job)=='all' && strtolower($request->job)=='all') {
            $data = user_data::where('organization', session('user.organization'))->get();
        }
        elseif(strtolower($request->dept)=='all'){
            if(strtolower($request->sub_section)=='all'){
                $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('sub_section',$request->job)->get();
                // return 'hello';
            }
            elseif(strtolower($request->job)=='all'){
                $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('sub_section',$request->sub_section)->get();
            }
            else{
                $data = user_data::where('organization', session('user.organization'))->where('sub_section',$request->sub_section)->where('job title',$request->job)->get();
            }
        }
        elseif(strtolower($request->sub_section)=='all'){
            if(strtolower($request->job)=='all'){
                $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('departmant', $request->dept)->get();
            }

            else{
                $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('departmant', $request->dept)->where('sub_section',$request->sub_section)->get();
            }
            // return 'hello';
        }
        elseif(strtolower($request->job)=='all'){
            $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('departmant', $request->dept)->where('sub_section',$request->sub_section)->get();
        }
        else{
            $val = $request->dept;
            $data = DB::table('user_datas')->where('organization', session('user.organization'))->where('departmant',$val)->where('sub_section',$request->sub_section)->where('job title',$request->job)->get();
        }
        // return $data;
        $data = json_decode(json_encode($data), true);
        return view('admin.admin_search_users_sms', ['data' =>$data]);
    }

    function send_sms(Request $request){

        $to = "01790317966";
        $token = "245809f76967c78f3e0a96fe1c167a4d";
        $message = $_POST['message'];
        $url = "http://api.greenweb.com.bd/api.php?json";


        $data= array(
        'to'=>"$to",
        'message'=>"$message",
        'token'=>"$token"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);


        // $to = $_POST['users'];
        // $message = $_POST['message'];
        // $token = "245809f76967c78f3e0a96fe1c167a4d";
        // $url = "http://api.greenweb.com.bd/api.php?json";
        // $data= array(
        // 'to'=>"$to",
        // 'message'=>"$message",
        // 'token'=>"$token"
        // );
        // $ch = curl_init(); // Initialize cURL
        // curl_setopt($ch, CURLOPT_URL,$url);
        // curl_setopt($ch, CURLOPT_ENCODING, '');
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $smsresult = curl_exec($ch);
        // if (curl_error($ch)) {
        //     echo curl_error($ch);
        // }

          $request->session()->put('message', 'Sms successfully sent!');
          return back();
    }
}
