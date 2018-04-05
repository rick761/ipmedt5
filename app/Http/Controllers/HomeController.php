<?php

namespace App\Http\Controllers;

use App\OntvangenSignaal;
use Illuminate\Http\Request;
use App\UserHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp;
use Carbon\Carbon;




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
        $userhistorys_vandaag = Auth::User()->UserHistory()->get();
        $tijd_in_zon = 0;

        foreach($userhistorys_vandaag as $a){
            $a->OntvangenSignaal;
        }


        $userhistorys_vandaag = $userhistorys_vandaag->where('OntvangenSignaal.created_at','>=', Carbon::today());
        if($userhistorys_vandaag->count() >0){
            //dump($userhistorys_vandaag);
            foreach($userhistorys_vandaag as $historyItem){
                //dump($historyItem->OntvangenSignaal->created_at->diff(Carbon::now()));
            }
            //$totalDuration = $userhistorys_vandaag->OntvangenSignaal->created_at;//->diff(Carbon::now());
        }


        $laatsteUserHistory= DB::table('userhistory')
            ->where('user_id','=' , Auth::id())
            ->join('ontvangensignalen', 'userhistory.ontvangen_signaal_id', '=', 'ontvangensignalen.id')
            ->orderBy('created_at','desc')
            ->first();

        $laatsteSignaal = OntvangenSignaal::orderBy('created_at', 'desc')
            ->first();

        $message=null;
        if(!empty($request['message'])){
            $message = $request['message'];
        }

        return view('home',[
            'laatsteSignaal' => $laatsteSignaal,
            'laatsteUserHistory'=> $laatsteUserHistory,
            'user' => Auth::user(),
            'message'=>$message
        ]);
    }
}
