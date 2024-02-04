<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Article $article, Request $request)
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

                        //se il prodotto è terminato//
                        if($article->quantity != null) {

                            $cart->quantity = $request->quantity;
                        } else {
                            $messaggio = "Prodotto terminato";
                            return view ('article.show', compact('article', 'messaggio'));
                            
                        }

                            //aggiornamento quantità//
                       /*  if ($article->quantity != null && $article->quantity >= $request->quantity) {
                            $cart->quantity = $request->quantity;
                    
                            // Aggiorna la quantità disponibile in magazzino
                            $article->quantity -= $request->quantity;
                            $article->save();
                            
                            // Salva il carrello
                            $cart->save();
                    
                            return redirect()->back()->with('message', 'Articolo aggiunto al carrello');
                        } else {
                            $messaggio = "Quantità non disponibile";
                            return view('article.show', compact('messaggio', 'article'));
                        } */

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

        return view('article.showCart', compact('carts')); 

    }

  /*   public function destroy(Cart $cart)
    {
      

            foreach ($cart->images() as $image) {
               Storage::delete($image);
               $image->delete();
    
            }
            $cart->delete();
        session()->flash('message', 'Articolo eliminato con successo');
       
    } */

}
