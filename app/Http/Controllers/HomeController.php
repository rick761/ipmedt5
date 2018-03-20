<?php

namespace App\Http\Controllers;

use App\OntvangenSignaal;
use Illuminate\Http\Request;
use App\UserHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $laatsteSignaal = DB::table('userhistory')
            ->where('user_id','=' , Auth::id())
            ->join('ontvangensignalen', 'userhistory.ontvangen_signaal_id', '=', 'ontvangensignalen.id')
            ->orderBy('created_at','desc')
            ->first();




        $message=null;
        if(!empty($request['message'])){
            $message = $request['message'];
        }

        return view('home',[
            'laatsteSignaal'=> $laatsteSignaal,
            'user' => Auth::user(),
            'message'=>$message
        ]);
    }
}
