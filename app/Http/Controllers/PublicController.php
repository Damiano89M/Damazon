<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('welcome', compact('articles'));
    }

    public function profile() {

        return view('auth.profile');
    }

    
        
}
