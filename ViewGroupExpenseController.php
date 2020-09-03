<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ViewGroupExpenseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($exp) {
        
        $data = DB::table('expense_groups')
                ->join('groups','groups.groupID','=','expense_groups.groupID')
                ->select('expense_groups.ename','expense_groups.amount','groups.groupName','expense_groups.expense_id')
                ->where('expense_groups.groupID','=',$exp)
                ->groupby('expense_groups.ename','expense_groups.amount','groups.groupName','expense_groups.expense_id')
                ->get();

            return view('viewgroupexpense',compact('data'));
    }
    public function expenseindex($exp) {

        $data = DB::table('expense_groups')
        ->join('iexpense_groups','iexpense_groups.expense_id','=','expense_groups.expense_id')
        ->join('users','users.id','=','iexpense_groups.user_id')
        ->select('users.id','users.name','iexpense_groups.iamount','expense_groups.amount','expense_groups.ename','expense_groups.added_by','iexpense_groups.paid_by')
        ->where('expense_groups.expense_id', '=',$exp)
        ->get();

        // $data = DB::table('expense_groups')
        //      ->join('iexpense_groups','iexpense_groups.expense_id','=','expense_groups.expense_id')
        //      ->join('users','users.id','=','iexpense_groups.user_id')
        //      ->select('users.name','iexpense_groups.iamount','expense_groups.amount','expense_groups.ename')
        //      ->where('expense_groups.expense_id', '=',$exp)
        //      ->get();
 
             return view('viewitemexpense',compact('data'));
     }
}