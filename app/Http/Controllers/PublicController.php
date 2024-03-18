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

        $category_elettronica = Category::where('name','=', 'Elettronica')->first();
        $category_informatica = Category::where('name','=', 'informatica')->first();
        $category_telefonia = Category::where('name','=', 'Telefonia')->first();
        $category_moda_uomo = Category::where('name','=', 'Moda-uomo')->first();
        $category_moda_donna = Category::where('name','=', 'Moda-donna')->first();
        $category_moda_bambino = Category::where('name','=', 'Moda-bambino')->first();
        $category_moda_bambina = Category::where('name','=', 'Moda-bambina')->first();
        $category_prima_infanzia = Category::where('name','=', 'Prima-infanzia')->first();
        $category_casa_e_cucina = Category::where('name','=', 'Casa e cucina')->first();
        $category_giochi = Category::where('name','=', 'Giochi')->first();
        $category_giocattoli = Category::where('name','=', 'Giocattoli')->first();
        $category_musica = Category::where('name','=', 'Musica')->first();
        
        
        return view('welcome', compact('articles',
                                      'category_elettronica',
                                      'category_informatica',
                                      'category_telefonia',
                                      'category_moda_uomo',
                                      'category_moda_donna',
                                      'category_moda_bambino',
                                      'category_moda_bambina',
                                      'category_prima_infanzia',
                                      'category_casa_e_cucina',
                                      'category_giochi',
                                      'category_giocattoli',
                                      'category_musica'));
    }

    public function setLanguage($lang) {
        
        session()->put('locale', $lang);
        return redirect()->back();
    }

    
        
}
