<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index($sUsername){
        $bOwner = false;

        $oUser = User::whereUsername($sUsername)->orWhere('id', $sUsername)->first();
        $oPosts = Post::where('user_id', $oUser->id)->orderBy('id', 'desc')->paginate(10);

        if($oUser->id == Auth::user()->id){
            $bOwner = true;
        }

        $oUser['oPosts'] = $oPosts;
        $oUser['bOwner'] = $bOwner;
        return view('user.profile', compact('oUser', $oUser));
    }

    public function edit($sUsername){
        $bOwner = false;

        $oUser = User::whereUsername($sUsername)->orWhere('id', $sUsername)->first();

        if($oUser->id == Auth::user()->id){
            $bOwner = true;
        }else{
            redirect("/profile" . $sUsername);
        }


    }
}
