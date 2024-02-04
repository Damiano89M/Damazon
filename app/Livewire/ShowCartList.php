<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShowCartList extends Component
{  
    public function destroy(Cart $cart)
    {
        $cart->delete();
    session()->flash('message', 'Articolo rimosso dal carrello');
   
}

public function render()
{
$carts = Cart::all();

return view('livewire.show-cart-list', compact('carts'));
}
}
      
    
