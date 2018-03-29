<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OntvangenSignaal;

class GastController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('loggedinredirect');
    }


    public function index(){


        $laatsteSignaal = OntvangenSignaal::orderBy('created_at', 'desc')
            ->first();





        return view('welcome', [
            'laatsteSignaal'=>$laatsteSignaal
        ]);
    }
}
