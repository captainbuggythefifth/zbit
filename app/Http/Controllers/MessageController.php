<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function index(){
        $oMessages = Message::orderBy('id', 'desc');
        dd($oMessages);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){

    }

    public function show($id){
        $oArticle = Article::findOrFail($id);

        return view('articles.show', compact('oArticle'));
    }

    public function edit($id){
        $oArticle = Article::findOrFail($id);

        return view('articles.edit', compact('oArticle'));
    }

    public function update(Request $request, $id){
        $oArticle = Article::findOrFail($id);
        if(!(isset($request->live))){
            $oArticle->update(array_merge($request->all(), ['live' => false]));
        }else
            $oArticle->update($request->all());

        return redirect('/articles');
    }

    public function destroy($id){

    }
}
