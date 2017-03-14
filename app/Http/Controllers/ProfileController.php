<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
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

    public function show($sUsername){
        $bOwner = false;

        $oUser = User::whereUsername($sUsername)->orWhere('id', $sUsername)->first();
        $oPosts = Post::where('user_id', $oUser->id)->orderBy('id', 'desc')->paginate(10);

        if($oUser->id == Auth::user()->id){
            $bOwner = true;
        }

        $oUser['oPosts'] = $oPosts;
        $oUser['bOwner'] = $bOwner;
        return view('user.show', compact('oUser', $oUser));
    }

    public function activities(){
        $oComments = Comment::where('user_id', Auth::user()->id)->with('post')->paginate();
        $oLikes = Like::where('user_id', Auth::user()->id)->with('post')->paginate();

        $aActivities['oComments'] = $oComments;
        $aActivities['oLikes'] = $oLikes;

        return view('user.activities', compact('aActivities', $aActivities));
    }


}
