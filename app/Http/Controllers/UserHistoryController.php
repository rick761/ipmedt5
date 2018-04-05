<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OntvangenSignaal;
use App\UserHistory;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('huidtypecheck');
    }

    public function index(Request $request)
    {


        $toon_userhistory = Auth::User()->UserHistory()->get();
        foreach($toon_userhistory as $key=>$item){
            $item->OntvangenSignaal;
            if(!empty($item->OntvangenSignaal->created_at)){
                if(!empty($request->datum)){
                    $request_datum_parsed = Carbon::parse($request->datum);
                    if(!($item->OntvangenSignaal->created_at->isSameAs('Y-m-d',$request_datum_parsed))){
                        $toon_userhistory->forget($key);
                    }
                }
                else{
                    if(!($item->OntvangenSignaal->created_at->isToday())){
                        $toon_userhistory->forget($key);
                    }
                }
            } else { $toon_userhistory->forget($key); }
        }

        $toon_userhistory = $toon_userhistory->sortBy('OntvangenSignaal.created_at');
        //$test = $toon_userhistory->keyBy('OntvangenSignaal.created_at');
        //dd($toon_userhistory);

        $geschiedenis = \Lava::DataTable();
        $geschiedenis->addStringColumn('Zonnesterkte')->addNumberColumn('');

        foreach($toon_userhistory as $i){

            $geschiedenis->addRow([$i->OntvangenSignaal->created_at->format('H:i:s'), $i->OntvangenSignaal->uv]);
        }

        $data['votes'] = \Lava::ColumnChart('Geschiedenis', $geschiedenis,[
            'title' => 'Zonnen sterkte in UV',
            'colors' => ['#6c757d'],
            'backgroundColor'=>'none',
            'width'=>500,
            'legend' => [
            'position' => 'in',
            'fontColor' => 'white'
            ]

        ]);

        ;



        $datumsInDatabase = DB::table('userhistory')
            ->where('user_id', '=', Auth::id())
            ->join('ontvangensignalen', 'userhistory.ontvangen_signaal_id', '=', 'ontvangensignalen.id')
            ->select(DB::raw('DATE(`created_at`)'))
            ->orderBy('DATE(`created_at`)','desc')
            ->distinct()
            ->get();

//        $waardesBijDatumsDatabase = DB::table('userhistory')
//            ->where('user_id', '=', Auth::id())
//            ->join('ontvangensignalen', 'userhistory.ontvangen_signaal_id', '=', 'ontvangensignalen.id')
//            ->select ('uv')
//            ->get();

//        dd($datumsInDatabase);
        $gekozendag = Carbon::now();
        if(!empty($request->datum)){
            $gekozendag = $request->datum;
        }
        $request->datum;
        return view('userHistoryGraph',
            [
                'Votes' => $data,
                'datumsInDatabase' => $datumsInDatabase,
                'huidige_datum' => $gekozendag
            ]);
    }

    public function veranderGrafiek(Request $request){
        //dd($request->datum);
        return $this->index($request);
    }


    public function add(Request $request){
        $logged_user_id = Auth::id();
        $zoekSignaal = OntvangenSignaal::where('created_at', '=', $request->signaal)->get();

	if($logged_user_id == 0){
            return 1;
        }

        if($zoekSignaal->count()>0) { // als er een signaal gevonden is

            //check for bestaande userHistorty

            $bestaat_al = UserHistory::where([
                ['user_id', '=', $logged_user_id],
                ['ontvangen_signaal_id','=', $zoekSignaal->first()->id]
            ])->get()->count();

            if($bestaat_al == 0){
                $NewUserHistory = new UserHistory();
                $NewUserHistory->user_id = intval($logged_user_id);
                $NewUserHistory->ontvangen_signaal_id = intval($zoekSignaal->first()->id);
                $NewUserHistory->save();
                return 1; //succes

            }
        }
       return 0;//fail
    }
}
