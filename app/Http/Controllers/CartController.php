<?php

namespace App\Http\Controllers;


use LDAP\Result;
use App\Models\Cart;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
            $cart = new Cart();
            // Trova il carrello esistente per l'utente e l'articolo
            $existingCart = Cart::where('user_id', $user->id)
                ->where('article_id', $article->id)
                ->first();
            // Verifica se l'articolo esiste prima di procedere
            if ($existingCart) {
                // Carrello esistente: aggiorna la quantità
                /*  $existingCart->quantity += $request->quantity;
                $existingCart->save(); */
                $messaggio = "Prodotto già nel carrello";
                return view('article.show', compact('article', 'existingCart', 'messaggio'));
            } elseif ($cart) {

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->user_id = $user->id;
                $cart->article_title = $article->title;

                if ($article->discount_price != null) {
                    $cart->price = $article->discount_price * $request->quantity;
                } else {

                    $cart->price = $article->price * $request->quantity;
                }

                $cart->article_id = $article->id;

                $cart->images_id = $article->images->first()->id;
                $cart->article_description = $article->description;

                //se il prodotto è terminato//
                if ($article->quantity != null) {

                    $cart->quantity = $request->quantity;
                } else {
                    $messaggio = "Prodotto terminato";
                    return view('article.show', compact('article', 'messaggio'));
                }

                // quantità non disponibile//
                if ($article->quantity < $request->quantity) {
                    $messaggio = "Quantità non disponibile";
                    return view('article.show', compact('messaggio', 'article'));
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

                // count cart
                $cartItems = session('cart', []);
                $cartItems[] = $cart->id;
                Session::put('cart', $cartItems);


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

      public function destroy(Cart $cart)
    {   
            // Rimuovi l'ID del carrello dalla sessione
            $cartItems = session('cart', []);
            $cartItems = array_diff($cartItems, [$cart->id]);
            Session::put('cart', $cartItems);
            
            $cart->delete();

        // Se il carrello è vuoto, azzera la sessione del carrello
        if (empty($cartItems)) {
            Session::forget('cart');
        }
            
        return view('article.showCart', compact('cart'))->with('message', 'Articolo eliminato con successo');
       
    }

    // funzione aggiungi al carrello vecchia//

    /*  public function addToCart(Article $article, Request $request)
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

                if($article->discount_price != null) {
                    $cart->price = $article->discount_price * $request->quantity;   
                } else {

                    $cart->price = $article->price * $request->quantity;
                }

                $cart->article_id = $article->id;
                $cart->images_id = $article->images->first()->id;
                $cart->article_description = $article->description;

                        //se il prodotto è terminato//
                        if($article->quantity != null) {

                            $cart->quantity = $request->quantity;
                        } else {
                            $messaggio = "Prodotto terminato";
                            return view ('article.show', compact('article', 'messaggio'));
                        } 
                        
                        // quantità non disponibile//
                        if($article->quantity < $request->quantity) {
                            $messaggio = "Quantità non disponibile";
                            return view('article.show', compact('messaggio', 'article'));
                        }
                
                            //aggiornamento quantità//
                        if ($article->quantity != null && $article->quantity >= $request->quantity) {
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
                        }

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
    } */
}
