<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller{
    //
    public function index($model, $modelId){
        $iUserId = Auth::user()->id;
        $fromModel = $model . "_id";
        Like::create(
            [
                "user_id" => $iUserId,
                "from"    => $model,
                $fromModel => $modelId
            ]
        );
    }

}
