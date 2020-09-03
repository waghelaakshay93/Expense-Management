<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
Use Carbon\Carbon;

class AddExpenseController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index() {

        return view('expense.addexpense');
    }


   
    public function storeexpense(Request $request) {


        request()->validate([
            
                'name' => ['required'],
                'amount' => ['required','numeric'],
                'split' => ['required'],
                'ename' => ['required','string','min:5']
        ]);
        
            $names = $request->input('name');
        
            $currentuserid = array_push($names,Auth::user()->id);

            $amount = $request->input('amount');
            
            $split = $request->input('split');
            
            $ename =  $request->input('ename');

            $exp_id = rand(0,100000);

            

             if($split == '50%') {

                $newamount = $amount/count($names);
            
                $type = 'half';

                $data = array('expense_id'=>$exp_id,'type'=>$type,'ename'=>$ename,'amount'=>$amount);

                DB::table('expense')->insert($data);

                for($i = 0;$i <count($names);$i++) {
                            
                    
                    $query = array('expense_id' => $exp_id,'user_id'=>$names[$i],'amount'=>$newamount);
                    DB::table('iexpense')->insert($query);
    
                }
                
             }

             else if($split == '100%') {

                $newamount = $amount;
                $type = 'full';
                
                $data = array('expense_id'=>$exp_id,'type'=>$type,'ename'=>$ename,'amount'=>$amount);

                DB::table('expense')->insert($data);

                for($i = 0;$i <count($names);$i++) {

                    if(Auth::user()->id == $names[$i]) {
                        
                    $query = array('expense_id' => $exp_id,'user_id'=>$names[$i],'amount'=>"-".$newamount);
                    DB::table('iexpense')->insert($query);

                    }
                    else {

                    $query = array('expense_id' => $exp_id,'user_id'=>$names[$i],'amount'=>$newamount);
                    DB::table('iexpense')->insert($query);

                    }
                }
             }

        return back()->withStatus(__('Expense added successfully.'));
            
    }

    public function groupIndex(Request $request)
    {
        $groupID = $request->route('groupID');

        $groupName = DB::table('groups')->select('groups.groupName')->where('groups.groupID',$groupID)->groupby('groups.groupName')->get();

        $members = DB::table('groups')
        ->join('users','users.id','=','groups.userID')
        ->select('users.name','groups.userID')
        ->where('groups.groupID', '=',$groupID)
        ->get();

        return view('expense.addexpensegroup',compact('groupID','groupName','members'));
       
    }

    public function storeexpensegroup(Request $request)
    {
        $groupID = $request->input('id');
        echo $groupID;
  
        $amount = $request->input('amount');

        $split = $request->input('split');

        $ename =  $request->input('ename');

        $date = Carbon::now();

        $exp_id = rand(0,100000);

        if($split == 'equally') 
        {
            $names = User::select(DB::raw('groups.userID'))
            ->from('groups')
            ->where('groups.groupID',$groupID)
            ->get();

            $newamount = $amount/count($names);
            $type = 'half';

            $data = array('expense_id'=>$exp_id,'type'=>$type,'ename'=>$ename,'amount'=>$amount,'groupID'=>$groupID,'added_by'=>Auth::user()->id,'date' => $date);

            DB::table('expense_groups')->insert($data);

            $da = DB::table('expense_groups')
            ->select('added_by')
            ->where('expense_id','=',$exp_id)
            ->get();
        
           $d = explode(":",$da);
           $d1 = preg_replace("/[^a-zA-Z0-9]/","",$d[1]);

            for($i = 0;$i <count($names);$i++) 
            {
                // $query = array('expense_id' => $exp_id,'user_id'=>$names[$i]->userID,'iamount'=>$newamount);
                // DB::table('iexpense_groups')->insert($query);
                if($d1 == $names[$i])
                {      
                    $query = array('expense_id' => $exp_id,'user_id'=>$names[$i]->userID,'iamount'=>$newamount,'paid_by'=>true);
                    DB::table('iexpense_groups')->insert($query);
                }
                else 
                {       
                    $query = array('expense_id' => $exp_id,'user_id'=>$names[$i]->userID,'iamount'=>$newamount,'paid_by'=>false);
                    DB::table('iexpense_groups')->insert($query);
                }
            }  
        }
        else if($split == 'unequally') 
        {
            $names = $request->input('members');
            $newamount = $amount/count($names);
            $type = 'full';
                
            $data = array('expense_id'=>$exp_id,'type'=>$type,'ename'=>$ename,'amount'=>$amount,'groupID'=>$groupID,'added_by'=>Auth::user()->id,'date' => $date);

            DB::table('expense_groups')->insert($data);

            $da = DB::table('expense_groups')
            ->select('added_by')
            ->where('expense_id','=',$exp_id)
            ->get();
        
           $d = explode(":",$da);
           $d1 = preg_replace("/[^a-zA-Z0-9]/","",$d[1]);

            for($i = 0;$i <count($names);$i++) 
            {
                // $query = array('expense_id' => $exp_id,'user_id'=>$names[$i],'iamount'=>$newamount);
                // DB::table('iexpense_groups')->insert($query);
                if($d1 == $names[$i])
                {      
                    $query = array('expense_id' => $exp_id,'user_id'=>$names[$i],'iamount'=>$newamount,'paid_by'=>true);
                    DB::table('iexpense_groups')->insert($query);
                }
                else 
                {       
                    $query = array('expense_id' => $exp_id,'user_id'=>$names[$i],'iamount'=>$newamount,'paid_by'=>false);
                    DB::table('iexpense_groups')->insert($query);
                }
            }  

         }
        return back()->withStatus(__('Expense added successfully.'));
        // return view('expense.addexpensegroup');
    
    }
}

