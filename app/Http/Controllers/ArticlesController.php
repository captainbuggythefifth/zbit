<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Controllers\Auth;
use DB;

class ArticlesController extends Controller
{
    //
    public function index(){
        $aArticles = Article::orderBy('id', 'desc')->paginate(10);
        //$aArticlesLive = Article::whereLive(1)->get();

        //$aArticles = DB::table('articles')->whereLive(1)->get();

        return view('articles.index', compact('aArticles'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){
        /*return $request->all();*/

        //Readable //Eloquent
        Article::create($request->all());

        //Faster  //Query Builder
        //DB::table('articles')->insert($request->except('_token'));

        return redirect('/articles');
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

