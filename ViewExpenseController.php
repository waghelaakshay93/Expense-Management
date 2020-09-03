<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ViewExpenseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($exp) {


       $data = DB::table('expense')
            ->join('iexpense','iexpense.expense_id','=','expense.expense_id')
            ->join('users','users.id','=','iexpense.user_id')
            ->select('users.name','iexpense.iamount','expense.amount','expense.ename')
            ->where('expense.expense_id', '=',$exp)
            ->get();

            return view('viewexpense',compact('data'));
    }
}
