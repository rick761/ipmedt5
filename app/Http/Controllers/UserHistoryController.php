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
        $toon_userhistory = Auth::User()->UserHistory()->get();//alle userhistory wordt opgehaald
        foreach($toon_userhistory as $key=>$item){
            $item->OntvangenSignaal;//ontvangen signaal koppeling wordt gemaakt
            if(!empty($item->OntvangenSignaal->created_at)){ // als bestaat
                if(!empty($request->datum)){ // als er een datum is opgegeven in de view
                    $request_datum_parsed = Carbon::parse($request->datum);
                    if(!($item->OntvangenSignaal->created_at->isSameAs('Y-m-d',$request_datum_parsed))){ //toon de historys die opgegeven zijn in de request
                        $toon_userhistory->forget($key); // vergeet de rest
                    }
                }
                else{
                    if(!($item->OntvangenSignaal->created_at->isToday())){
                        $toon_userhistory->forget($key); // als er geen datum is ogegeven in de view, vergeet alle historys die niet vandaag zijn
                    }
                }
            } else { $toon_userhistory->forget($key); } // vergeet alle historys die niet gekoppeld zijn.
        }

        $toon_userhistory = $toon_userhistory->sortBy('OntvangenSignaal.created_at'); //sorteer
        $geschiedenis = \Lava::DataTable(); // maak chart
        $geschiedenis->addStringColumn('Zonnesterkte')->addNumberColumn('');
        foreach($toon_userhistory as $i){ // plaats in chart met for loop
            $geschiedenis->addRow([$i->OntvangenSignaal->created_at->format('H:i:s'), $i->OntvangenSignaal->uv]);
        }

        $data['votes'] = \Lava::AreaChart('Geschiedenis', $geschiedenis,[ // instellingen van de chart
            'title' => 'Zonnen sterkte in UV',
            'colors' => ['#6c757d'],
            'backgroundColor'=>'none',

            'legend' => [
            'position' => 'in',
            'fontColor' => 'white',
            ]
        ]);

        $datumsInDatabase = DB::table('userhistory') // alle datums van userhistory, gebruikt in het kiezen van een dag voor de geschiedenis
            ->where('user_id', '=', Auth::id())
            ->join('ontvangensignalen', 'userhistory.ontvangen_signaal_id', '=', 'ontvangensignalen.id')
            ->select(DB::raw('DATE(`created_at`)'))
            ->orderBy('DATE(`created_at`)','desc')
            ->distinct()
            ->get();

        $gekozendag = Carbon::now(); // standaard op vandaag
        if(!empty($request->datum)){
            $gekozendag = $request->datum; //keuze uit form
        }
        $request->datum;
        return view('userHistoryGraph', //view redirect
            [
                'Votes' => $data,
                'datumsInDatabase' => $datumsInDatabase,
                'huidige_datum' => $gekozendag
            ]);
    }

    public function veranderGrafiek(Request $request){//form keuze
        return $this->index($request);
    }


    public function add(Request $request){ //updates/koppeld de history aan de user als er een live update plaatsvind
        $logged_user_id = Auth::id();
        $zoekSignaal = OntvangenSignaal::where('created_at', '=', $request->signaal)->get();

	    if($logged_user_id == 0){
            return 1; // als er niet ingelogd is.
        }

        if($zoekSignaal->count()>0) { // zoekt naar signaal om te koppelen, als er een signaal gevonden is.. gaat hij verder..

            //check for bestaande userHistorty

            $bestaat_al = UserHistory::where([ // checks of veld al bestaat.
                ['user_id', '=', $logged_user_id],
                ['ontvangen_signaal_id','=', $zoekSignaal->first()->id]
            ])->get()->count();

            if($bestaat_al == 0){ // als niet bestaat.
                $NewUserHistory = new UserHistory();
                $NewUserHistory->user_id = intval($logged_user_id);
                $NewUserHistory->ontvangen_signaal_id = intval($zoekSignaal->first()->id);
                $NewUserHistory->save(); //opgeslagen
                return 1; //succes
            }
        }
       return 0;//fail
    }
}
