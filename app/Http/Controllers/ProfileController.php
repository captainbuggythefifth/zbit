<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    //
    public function profile($sUsername){
        $oUser = User::whereUsername($sUsername)->first();
        return view('user.profile', compact('oUser', $oUser));
    }
}
