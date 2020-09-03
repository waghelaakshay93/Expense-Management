<?php

// Swapnil Phanse
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdduserController extends Controller
{
   
     public function insert(Request $request) {
        $userid = $request->input('userid');
        
        $contactid = $request->input('contactid');
       
        $data=array('userID'=>$userid,"contactID"=>$contactid);
        DB::table('contact')->insert($data);

       


        return back()->withStatus(__('User added successfully.'));
     //   echo '<a href = "/insert">Click Here</a> to go back.';
     }
}
