<div>
   {{--  <table class="table table-light tbody-cart">
        <tbody>
            @forelse ($carts as $cart)
                {{-- Condizione che un utente vede il proprio carrello o quello che lui carica --}}
                {{--  @if (Auth::user() && $cart->user_id == Auth::user()->id)
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
                        <td>Q.tà: {{ $cart->quantity }} </td>
                        <td>
                            <button class="btn apriModale" data-target="myModal{{ $cart->id }}"><i
                                    class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                @endif
            @empty
                <h2 class="text-center">Il tuo carrello è vuoto!</h2>
            @endforelse

        </tbody>
    </table> --}}
    <div class="carrello">
        <div class="div-h4">
            <h4>Carrello</h4>
            <hr>
        </div>
        @forelse ($carts as $cart)
            {{-- Condizione che un utente vede il proprio carrello o quello che lui carica --}}
            @if (Auth::user() && $cart->user_id == Auth::user()->id)
                <div class="row mb-3 rowCart">
                    {{-- <div class="col-2">{{ $cart->id }}</div> --}}
                    <div class="col-2">
                        @if ($cart->article && $cart->article->images && !$cart->article->images->isEmpty())
                            <img class="img-fluid img-show-cart"
                                src="{{ Storage::url($cart->article->images->first()->path) }}" alt="">
                        @else
                            <!-- Immagine di fallback o nessuna immagine -->
                            <img src="{{ asset('path/to/fallback-image.jpg') }}" alt="">
                        @endif
                    </div>
                    <div class="col-2">{{ $cart->article_title }}</div>
                    <div class="col-4">{{ $cart->article_description }}</div>
                    {{-- <div class="col-2">{{ $cart->email }}</div> --}}
                    <div class="col-1">{{ $cart->price }}€</div>
                    <div class="col-1">Q.ntà:{{ $cart->quantity }}</div>
                    <div class="col-1">
                        <button class="btn apriModale" data-target="myModal{{ $cart->id }}"><i
                                class="fa-regular fa-trash-can text-danger"></i>
                        </button>
                    </div>
                </div>
                
            @endif
        @empty
            <h2 class="text-center">Il tuo carrello è vuoto!</h2>
        @endforelse
    </div>

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
