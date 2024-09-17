<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
class ArticleController extends Controller
{
        public function __construct()
        {
            $this->middleware('permission:view article')->only('index');
            $this->middleware('permission:create article')->only('create');
            $this->middleware('permission:edit article')->only('edit');
            $this->middleware('permission:delete article')->only('destroy');
        }
    
    
    public function index(){
        $articles = Article::all();
        return view('articles.index',compact('articles'));
    }

    public function create(){
        return view('articles.add');
    }
    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit',compact('article'));
    }

    public function store(Request $request){
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->author = $request->author;
        $article->save();
        return redirect()->route('article')->with('success','Article created Successfully');
    }

    public function update(Request $request, $id)
{
    $article = Article::find($id);
    
    if ($article) {
        $article->title = $request->title;
        $article->description = $request->description;
        $article->author = $request->author;
        $article->save();

        return redirect()->route('article')->with('success', 'Article updated successfully');
    } else {
        return redirect()->route('article')->with('error', 'Article not found');
    }
}

public function destroy($id)
{
    $article = Article::find($id);

    if ($article) {
        $article->delete();
        return redirect()->route('article')->with('success', 'Article deleted successfully');
    } else {
        return redirect()->route('article')->with('error', 'Article not found');
    }
}


}
