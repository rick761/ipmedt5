<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizVraag;
use App\QuizAntwoord;
use App\OntvangenSignaal;
use App\User;

use Illuminate\Support\Facades\Auth;

class vragenlijstController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        /*
         * $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', route('addSignaaltoDbEvent',['testmessage']), [
            'verify' => false,
        ]);
        echo $res->getBody();
        */


        return view('vragenlijst',[
            'quizvragen' => QuizVraag::All()
        ]);
    }
    public function voerVragenlijstIn(Request $request){

            if(count($request->all()) == 6) { // check of alle antwoorden zijn ingevoerd

                //dd($request->all());
                $punten=0;
                $huidtype_resultaat=0;
                foreach($request->all() as $veld_key => $veld){
                    if($veld_key != '_token'){
                        if($veld == 'a'){$punten+=1;}
                        if($veld == 'b'){$punten+=2;}
                        if($veld == 'c'){$punten+=3;}
                        if($veld == 'd'){$punten+=4;}
                    }
                }

                if($punten <= 7){$huidtype_resultaat='1';}
                if($punten > 7 && $punten <= 12){$huidtype_resultaat='2';}
                if($punten > 12 && $punten <= 17){$huidtype_resultaat='3';}
                if($punten > 17){$huidtype_resultaat='4';}

                //dd($punten,$huidtype_resultaat);
                $user =  Auth::User();
                $user->huidtype = $huidtype_resultaat;
                $user->save();

                return redirect()->action('HomeController@index');

            } else {
                return view('vragenlijst', [
                    'quizvragen' => QuizVraag::All(),
                ]);
            }
    }
}
