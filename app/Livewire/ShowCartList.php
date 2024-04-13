<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ShowCartList extends Component
{
   /*  public function destroy(Cart $cart)
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
        // Restituisci una risposta appropriata (includendo il conteggio aggiornato)

        session()->flash('message', 'Articolo rimosso dal carrello');
    } */

    public function render()
    {
        $carts = Cart::all();

        return view('livewire.show-cart-list', compact('carts'));
    }
}
