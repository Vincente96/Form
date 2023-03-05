<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function Homepage(){
        
        $articles= Article::all();


        return view('welcome', compact('articles'));
    }

    public function create () {
        return view ('create');
    }

    public function store (StoreArticleRequest $request){

        // 1 metodo di scrittura su db

        // $article = new Article();
        // $article->category = $request-> category;
        // $article->title = $request -> title;
        // $article-> body = $request->body;
        // $article ->save();
   
        // 1 metodo di validazione attenzione l'iniezione di dipendeza va fatto con Request non con StoreArticleRequest  
        
        // $validator = Validator::make($request-> all(),[
        //     'category'=> 'required',
        //     'title'=> 'required',
        //     'body'=> 'required',
        // ],[
        //     'category.required'=>'Il campo categoria è obbligatorio',
        //     'title.required'=> 'il campo titolo è obbligatorio',
        //     'body.required'=> 'il campo testo è obbligatorio'
        // ]);

        // if ($validator->fails()){

        //     return redirect()->back()->withErrors($validator);
        // }

            //  secondo metodo di scrittura su db con attributi protected $fillable ['category',...] in model article

        $article =  Article::create($request->all());
        
         if ($request->hasFile('image')&& $request->file('image')->isValid()){

            $fileext= $request -> file('image')-> extension();    
            $randomFileName =date('Y_m-d'). uniqid('image') . '.' . $fileext;
            $imagePath = $request-> file('image')-> storeAs('public/images/' . $article->id , $randomFileName);
            $article-> image= $imagePath;
            $article ->save();
         }

        return redirect()->route('articles.create')->with(['success'=>'articolo salvato correttamente']);
    }
}
