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

        return view('vragenlijst',[
            'quizvragen' => QuizVraag::All()
        ]);
    }
    public function voerVragenlijstIn(Request $request){
        $message = '';

        //check for dubbele antwoorden
        $controleer_dubbele_antwoorden = false;
        $vorige_vraag_id = '';
        foreach($request->all() as $request_item_name => $request_item_value){
            if($request_item_name!='_token'){
                if($vorige_vraag_id == $request_item_value){
                    $controleer_dubbele_antwoorden = true;
                    $message .= 'Er zijn dubbele antwoorden. ';
                }
                $vorige_vraag_id = $request_item_value;
            }
        }

       //check of alle antwoorden zijn ingevoerd
        $controleer_voor_alle_antwoorden = false;
        $alles_ingevoerd_array=[];
        foreach($request->all() as $request_item_name => $request_item_value) {
            if($request_item_name!='_token') {
                $alles_ingevoerd_array[$request_item_value] = 'filled';
            }
        }
        if(count($alles_ingevoerd_array)==5){
            $controleer_voor_alle_antwoorden = true;
        } else {
            $message .= 'Niet alle velden zijn ingevoerd. ';
        }

        //voer data in de database
        if($controleer_voor_alle_antwoorden == true && $controleer_dubbele_antwoorden == false) {
            $resultaat_invoer_array = [];
            foreach ($request->all() as $request_item_name => $request_item_value) {
                if ($request_item_name != '_token') {
                    $resultaat_invoer_array[$request_item_value] = $request_item_name;
                }
            }
            $ingevulde_antwoorden = QuizAntwoord::find([$resultaat_invoer_array[1], $resultaat_invoer_array[2], $resultaat_invoer_array[3],$resultaat_invoer_array[4], $resultaat_invoer_array[5]]);
            $puntencount_antwoorden = 0;
            foreach($ingevulde_antwoorden as $antwoord_item){
                switch ($antwoord_item->letter){
                    case 'a':
                        $puntencount_antwoorden += 1;
                        break;
                    case 'b':
                        $puntencount_antwoorden += 2;
                        break;
                    case 'c':
                        $puntencount_antwoorden += 3;
                        break;
                    case 'd':
                        $puntencount_antwoorden += 4;
                        break;
                }
            }

            $huidtype_restultaat = '';
            if( $puntencount_antwoorden <= 7 ){
                $huidtype_restultaat = '1';
            }
            if( $puntencount_antwoorden >= 8 && $puntencount_antwoorden <= 12 ){
                $huidtype_restultaat = '2';
            }
            if( $puntencount_antwoorden >= 13 && $puntencount_antwoorden <= 17 ){
                $huidtype_restultaat = '3';
            }
            if( $puntencount_antwoorden >= 18 ){
                $huidtype_restultaat = '4';
            }
            $user =  User::find(Auth::id());
            $user->huidtype = $huidtype_restultaat;
            $user->save();



            $message = 'Uw nieuwe huidtype is '.$huidtype_restultaat.'.';



            return redirect()->action('HomeController@index',['message'=>$message]);
        }


        return view('vragenlijst',[
            'quizvragen' => QuizVraag::All(),
            'message' => $message,

        ]);
    }
}
