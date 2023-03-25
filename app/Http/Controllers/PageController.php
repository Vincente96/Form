<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;

class PageController extends Controller
{
    public function detail ($id){

        $article = Article::findOrFail($id);

        return view('articles.detail', compact('article'));
    }

    public function viewcounter(){
        return view('viewcounter');
    }
}
