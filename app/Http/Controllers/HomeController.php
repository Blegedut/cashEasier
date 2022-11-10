<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Sale;

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
        // $this_year=Carbon::now()->format('Y');
        // $sales=Sale::where('created_at','like',$this_year.'%')->get();
        // for ($i=1;$i<=12;$i++){
        //     $data_sale[(int)$i]=0;
        // }
        // foreach($sales as $sale){
        //     $check=explode('-',$sale->created_at)[1];
        //     $data_sale[(int)$check]+=1;
        // }

        if(Auth::user()->user_role->role->name === "Manager"){
            return redirect()->route('cashier.index');
        }
        if(Auth::user()->user_role->role->name === "Cashier"){
            return redirect()->route('cashier.index');
        }
        
        // return view('dashboard', compact(['data_sale']));
    }
}
