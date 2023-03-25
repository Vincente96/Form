<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// sezione privata

Route::middleware('auth')->prefix('account')->group(function ()  { 
    Route::get('/',[AccountController::class,'index'])->name ('account.index');
    Route::get('/Homepage', [ArticleController::class,'Homepage'])->name('welcome');
    Route::get('/articles/create',[ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store',[ArticleController::class,'store'])->name("articles.store");
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}/update',[ArticleController::class,'update'])->name('articles.update');
    Route::delete('/articles/{article}/destroy',[ArticleController::class,'destroy'])->name('articles.destroy');


    Route::resource('categories', CategoryController::class);
    
    Route::get('/counter', function(){
        return view('viewcounter');
    
    });
    Route::get('/viewcounter', [PageController::class,'viewcounter'])->name('viewcounter');
});    



// sezione pubblica
Route::get('/articles/{id}',[PageController::class,'detail'])->name('detail');

