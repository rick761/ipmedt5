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
        $this->middleware('huidtypecheck');
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



        ///advies
        $huidtype = 1;

        if (Auth::User()->huidtype > 0) {
            $huidtype = Auth::User()->huidtype;
        }

        $zonsterkte = round($laatsteSignaal -> uv);

        $advies = DB::table('adviezen')
            ->where('zonkracht', '=', $zonsterkte)
            ->where('huidtype', '=', $huidtype)
            ->first();

        function convertToHoursMins($time, $format = '%02d:%02d') {
            if ($time < 1) {
                return;
            }
            $uren = floor($time / 60);
            $minuten = ($time % 60);
            if ($minuten < 10) {
                $minuten = '0' . $minuten;
            }
            return sprintf($format, $uren, $minuten);
        }

        $factoradvies10 = 1;
        $factoradvies20 = 1;
        $factoradvies30 = 1;
        $factoradvies50 = 1;

        if ($zonsterkte > 0) {
            $factoradvies10 = str_replace("minutes","minuten",str_replace("hours","uur en",convertToHoursMins($advies->minuten * 10, '%02d hours %02d minutes')));
            $factoradvies20 = str_replace("minutes","minuten",str_replace("hours","uur en",convertToHoursMins($advies->minuten * 20, '%02d hours %02d minutes')));
            $factoradvies30 = str_replace("minutes","minuten",str_replace("hours","uur en",convertToHoursMins($advies->minuten * 30, '%02d hours %02d minutes')));
            $factoradvies50 = str_replace("minutes","minuten",str_replace("hours","uur en",convertToHoursMins($advies->minuten * 50, '%02d hours %02d minutes')));
        }


        return view('home',[
            'laatsteSignaal' => $laatsteSignaal,
            'laatsteUserHistory'=> $laatsteUserHistory,
            'user' => Auth::user(),
            'message'=>$message,
            'advies'=>$advies,
            'factoradvies10'=>$factoradvies10,
            'factoradvies20'=>$factoradvies20,
            'factoradvies30'=>$factoradvies30,
            'factoradvies50'=>$factoradvies50
        ]);
    }
}
