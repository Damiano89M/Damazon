<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Article $article)
    {

        if (Auth::id()) {
            $user = Auth::user();

            // Verifica se l'articolo esiste prima di procedere
            if ($article) {
                $cart = new Cart();
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->user_id = $user->id;
                $cart->article_title = $article->title;
                $cart->price = $article->price;
                $cart->article_id = $article->id;
                $cart->images_id = $article->images->first()->id;

                // Salva il carrello
                $cart->save();

                return redirect()->back()->with('message', 'Articolo aggiunto al carrello');
            } else {
                // Gestisci il caso in cui l'articolo non esiste
                return redirect()->back()->with('error', 'Articolo non trovato');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function showCart()
    {

        $carts = Cart::all();

        $user = Auth::user();

        return view('article.showCart', compact('carts')); 

/* 
        $user = Auth::user();

      
        if ($user) {
            $cart = $user->cart;

            if ($cart) {
                $carts = $cart->articles;
            } else {
                $carts = []; // Inizializza come array vuoto se l'utente non ha un carrello
            }

            return view('article.showCart', compact('carts'));
        } else {
            return redirect()->route('login');
        } */
    }

}
