<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OntvangenSignaal;
use App\UserHistory;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\DB;

class UserHistoryController extends Controller
{

    public function index()
    {
        $votes = \Lava::DataTable();
        $votes->addStringColumn('Zonnesterkte')->addNumberColumn('Zonnekracht')
            ->addRow(['13:50', 1])
            ->addRow(['13:52', 2])
            ->addRow(['13:54', 5])
            ->addRow(['13:55', 4])
            ->addRow(['13:56', 2])
            ->addRow(['13:57', 3])
            ->addRow(['13:58', 6])
            ->addRow(['13:59', 4]);
        $data['votes'] = \Lava::LineChart('Votes', $votes);

        $datumsInDatabase = DB::table('userhistory')
            ->where('user_id', '=', Auth::id())
            ->join('ontvangensignalen', 'userhistory.ontvangen_signaal_id', '=', 'ontvangensignalen.id')
            ->select(DB::raw('DATE(`created_at`)'))
            ->distinct()
            ->get();

//        $waardesBijDatumsDatabase = DB::table('userhistory')
//            ->where('user_id', '=', Auth::id())
//            ->join('ontvangensignalen', 'userhistory.ontvangen_signaal_id', '=', 'ontvangensignalen.id')
//            ->select ('uv')
//            ->get();

//        dd($datumsInDatabase);

        return view('userHistoryGraph',
            [
                'Votes' => $data,
                'datumsInDatabase' => $datumsInDatabase
            ]);
    }

    public function veranderGrafiek(Request $request){
        dd($request->datum);
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
