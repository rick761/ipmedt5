<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OntvangenSignaal;

class GastController extends Controller
{
    //
    public function index(){
        if(Auth::guest()){
           // echo 'gast';
        } else {
            //echo 'geen gast';
        }

        $laatsteSignaal = OntvangenSignaal::orderBy('created_at', 'desc')
            ->first();

        return view('welcome', [
            'laatsteSignaal'=>$laatsteSignaal
        ]);
    }
}
