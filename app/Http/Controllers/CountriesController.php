<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller{
    //
    public function index(){
        dd (Country::all());
    }
}
