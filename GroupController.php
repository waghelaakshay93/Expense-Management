<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class GroupController extends Controller
{
    public function index() {
        $id = Auth::user()->id;

        // $data1 =  User::orderby('groupName','asc')
        // ->select(DB::raw('groupID','groupName'))
        // ->from('groups')
        // //->groupby('groups.groupID','groups.groupName')
        // // ->whereIN('groups.groupID' ,function($query) use ($id)
        // // {
        // //     $query->select(DB::raw('contact.contactid'))
        // //     ->from('groups')
        // //     ->join ('users', 'users.id', '=', 'contact.userID')
           
        // ->where('groups.userID',$id)
            
        // // })
        // ->get();

        $data = DB::table('groups')->select('groups.groupName','groups.groupID')->groupby('groups.groupName','groups.groupID')->get();
        //return view('users.index', compact('data'));
        return view('group',compact('data'));
    }

    public function insert(Request $request) {

        request()->validate([
            
            'groupname' => ['required'],
            'name' => ['required']
    ]);
        $groupname = $request->input('groupname');
        $names = $request->input('name');
        $group_id = rand(0,10000);
        for($i = 0;$i <count($names);$i++) 
        {    
            $query = array('groupID' => $group_id,'groupName'=>$groupname,'userID'=>$names[$i]);
            DB::table('groups')->insert($query);
        }
        // $data=array('groupName'=>$groupname);
        // DB::table('groups')->insert($data);
        
         return back()->withStatus(__('Group added!'));
     //return view('group',compact('data'));
     }
}
