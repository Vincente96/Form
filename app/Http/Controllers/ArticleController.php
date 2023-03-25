<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function Homepage(){
        
        $articles= Article::where('user_id',auth()->user()->id)->get();
        return view('welcome', compact('articles'));
    }

    public function create () {
        $categories= Category::orderBy('name')->get();
        return view ('create',compact('categories'));
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

            
        $article =  Article::create([
            'user_id' => auth()-> user()->id,
            'category_id'=>$request-> category_id,
            'title'=> $request -> title,
            'body'=> $request-> body,
        ]);
        
        $article->categories()->attach($request->categories);

         if ($request->hasFile('image')&& $request->file('image')->isValid()){

            $fileext= $request -> file('image')-> extension();    
            $randomFileName =date('Y_m-d'). uniqid('image') . '.' . $fileext;
            $imagePath = $request-> file('image')-> storeAs('public/images/' . $article->id , $randomFileName);
            $article-> image= $imagePath;
            $article ->save();
         }

        return redirect()->route('articles.create')->with(['success'=>'articolo salvato correttamente']);
    }


                  
    public function edit(Article $article)
    {
        if($article->user_id !== auth()->user()->id) {
            abort(403);
        }

        $categories = Category::orderBy('name')->get();

        return view('articles.edit', compact('categories', 'article'));
    }



    
    public function update(StoreArticleRequest $request, Article $article)
    {
        if($article->user_id !== auth()->user()->id) {
            abort(403);
        }
        $article->fill($request->all())->save();

        $article->categories()->detach();
        $article->categories()->attach($request->categories);
   

        return redirect()->route('welcome')->with(['success' => 'Articolo modificato.']);
    }



    public function destroy(Article $article){
        
        if($article->user_id !== auth()->user()->id) {
            abort(403);
        }
        $article->categories()->detach();
        $article->delete();
        return redirect()-> back()->with(['success'=>'Articolo eliminato con successo']);
    }
}
