<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OntvangenSignaal;
use App\UserHistory;


class UserHistoryController extends Controller
{
    //
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
