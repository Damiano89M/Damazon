<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('homepage');
    }
   public function searchArticle(request $request) {
    $minprice = $request->input('min_price', 0);
    $maxprice = $request->input('max_price', PHP_FLOAT_MAX);

    $articles = Article::search($request->searched)->paginate(10);
                /* ->where('price', '>=', $minprice)
                ->where('price', '<=', $maxprice)
                ->paginate(10); */

    return view('article.index', compact('articles'));
   }

    public function homepage()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(5)->get();

        /* $category_musica = Category::where('name','=', 'Musica')->get(); */
        
        return view('welcome', compact('articles'/* , 'category_musica' */));
    }

    public function profile() {
       
        return view('auth.profile');
    }

    
        
}
