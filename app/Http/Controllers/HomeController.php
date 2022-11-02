<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Sale;

use Illuminate\Http\Request;

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
        $this_year=Carbon::now()->format('Y');
        $sales=Sale::where('created_at','like',$this_year.'%')->get();
        for ($i=1;$i<=12;$i++){
            $data_sale[(int)$i]=0;
        }
        foreach($sales as $sale){
            $check=explode('-',$sale->created_at)[1];
            $data_sale[(int)$check]+=1;
            // dd($data_sale);
        }
        // dd($data_pb);

        return view('dashboard', compact(['data_sale']));
    }
}
