<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Check Type of User 
        if(Auth::user()->role_name == 'customer'){
            $transctionDetails = Account::where('user_id',Auth::user()->id)->get();
            return view('customer.list',compact('transctionDetails'));
        }else{
             $customerDetails = User::where('role_name','customer')->get();
            return view('banker.list',compact('customerDetails'));
        }
    }

    /**
     * Take Request of withdrawn Amount and update in DB
     */
    public function withdrawn(Request $request){
        Account::create([
            'user_id' => auth()->user()->id,
            'transaction_type' => 'withdrawn',
            'amount' => $request->withdrawn,
            'total_amount' => ($request->total_amount - $request->withdrawn),
            'transaction_id' =>date('myd').time()
        ]);
        return back()->with('success', 'Amount withdrawn Successfully');
    }

    

    /**
     * Take Request of withdrawn Amount and update in DB
     */
    public function deposit(Request $request){
        // dd($request->all());
        Account::create([
            'user_id' => auth()->user()->id,
            'transaction_type' => 'deposit',
            'amount' => $request->deposit,
            'total_amount' => ($request->total_amount + $request->deposit),
            'transaction_id' =>date('myd').time()
        ]);
        return back()->with('success', 'Amount Deposit Successfully');
    }


    public function customerDetail($id=null){
        $transctionDetails = Account::where('user_id',$id)->get();
        return view('banker.customer',compact('transctionDetails'));
    }
}
