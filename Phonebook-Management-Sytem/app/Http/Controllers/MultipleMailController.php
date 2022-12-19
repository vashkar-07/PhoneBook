<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
class MultipleMailController extends Controller
{
    //
    function index()
    {
        $users = DB::table('users')->get();
        for ($i=0; $i < $users->count(); $i++) {
            # code...
            unset($users[$i]->password);
        }
     return view('MultipleMail', ['users'=>$users]);
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('organization', 'like', "%$query%")
         ->orWhere('job title', 'like', "%$query%")
         ->orWhere('departmant', 'like', "%$query%")
         ->orWhere('mobile', 'like', "%$query%")
         ->orWhere('location', 'like', "%$query%")
         ->get();

      }
      else
      {
       $data = DB::table('users')
         ->where('organization', session('staff.organization'))
         ->get();
      }
      $count = 0;

      foreach ($data as $item) {
        $item = json_decode(json_encode($item), true);
        //   print($item['verified']);
        # code...
        if($item['verified']== 0){
            unset($data[$count]);
        }
        else if($item['organization']!=session('staff.organization')){
            unset($data[$count]);
        }
        $count+=1;
    }
      $total_row = $data->count();
      if($total_row > 0)
      {
        foreach($data as $row)
        {
        $row = json_decode(json_encode($row), true);
        $x = $row['id'];
         $output .= "
         <tr>
          <td>".$row['name']."</td>
          <td>".$row['email']."</td>
          <td>".$row['job title']."</td>
          <td>".$row['departmant']."</td>
          <td><button onclick='addUsers($x)'>Add/Remove</td>
         </tr>
         ";
        }
      }
      else
      {
       $output = '
       <tr>
        <td class="text-center" colspan="6">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    function sendPage(Request $request){
        $val = json_decode($request->getContent());
        $data = [
            'subject' => $val->subject,
            'name' => $val->name,
            'email_list' => $val->email_list,
            'content' => $request->content
        ];
        Mail::send('email-template', $data, function($message) use ($data){
            $message->to($data['email_list'])
            ->subject($data['subject'])
            ->replyTo(session('staff.email'));;
        });
        $request->session()->put('message', 'Email successfully sent!');
        return response()->json($val->subject);
        // $returnHTML = view('multipleMailSendData')->with('data', $data)->render();
        // echo response()->json(
        //     array(
        //         'success'=>true,
        //         'html'=>$returnHTML
        //     )
        // );
        // return $returnHTML;
        // return view('multipleMailSendData', ['data'=>$request->getContent()]);
    }




    function test_1(){
        return view('MultipleMail_test');
    }
}
