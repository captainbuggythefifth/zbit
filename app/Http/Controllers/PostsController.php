<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Auth;
use DB;
use App\User;

class PostsController extends Controller
{
    //
    public function index(){
        $aPosts = Post::orderBy('id', 'desc')->with('user')->paginate(10);
        //$aPostsLive = Post::whereLive(1)->get();

        //$aPosts = DB::table('Posts')->whereLive(1)->get();

        dd($aPosts);
        return view('posts.index', compact('aPosts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        /*return $request->all();*/

        //Readable //Eloquent
        Post::create($request->all());

        //Faster  //Query Builder
        //DB::table('Posts')->insert($request->except('_token'));

        return redirect('/posts');
    }

    public function show($id){
        $oPost = Post::findOrFail($id);
        $aUser = User::findOrFail($oPost->user_id);
        $oPost->user = $aUser;
        return view('posts.show', compact('oPost'));
    }

    public function edit($id){
        $oPost = Post::findOrFail($id);

        return view('posts.edit', compact('oPost'));
    }

    public function update(Request $request, $id){
        $oPost = Post::findOrFail($id);
        if(!(isset($request->live))){
            $oPost->update(array_merge($request->all(), ['live' => false]));
        }else
            $oPost->update($request->all());

        return redirect('/posts');
    }

    public function destroy($id){

    }
}

