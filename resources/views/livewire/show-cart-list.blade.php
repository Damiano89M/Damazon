<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Articolo</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Immagine</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
                {{-- Condizione che un utente vede il proprio carrello o quello che lui carica --}}
                @if (Auth::user() && $cart->user_id == Auth::user()->id)
                    <tr>
                        <th scope="row">{{ $cart->id }}</th>
                        <td>{{ $cart->name }}</td>
                        <td>{{ $cart->email }}</td>
                        <td>{{ $cart->article_title }}</td>
                        <td>{{ $cart->price }}€</td>
                        <td>
                            @if ($cart->article && $cart->article->images && !$cart->article->images->isEmpty())
                                <img class="img-fluid img-show-cart"
                                    src="{{ Storage::url($cart->article->images->first()->path) }}" alt="">
                            @else
                                <!-- Immagine di fallback o nessuna immagine -->
                                <img src="{{ asset('path/to/fallback-image.jpg') }}" alt="">
                            @endif
                        </td>
                        <td>
                            <button class="btn apriModale" data-target="myModal{{ $cart->id }}"><i
                                    class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
    <!-- Modale fuori dal ciclo -->
    <div class="container">
        <div class="row">
            @forelse ($carts as $cart)
                @if (Auth::user() && $cart->user_id == Auth::user()->id)
                    <div class="col-12 col-md-6 modale" id="myModal{{ $cart->id }}">
                        <div class="modale-contenuto">
                            <span class="chiudi" data-target="myModal{{ $cart->id }}">&times;</span>
                            <p>Sicuro di voler togliere l'annuncio dal carrello?</p>
                            <a wire:click="destroy({{ $cart }})" class="btn btn-danger">Elimina</a>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
    </div>{{--  --}}
</div>
