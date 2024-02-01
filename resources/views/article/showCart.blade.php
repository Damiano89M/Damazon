<x-layout>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8">
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
                                      <img class="img-fluid img-show-cart" src="{{ Storage::url($cart->article->images->first()->path) }}" alt="">
                                  @else
                                      <!-- Immagine di fallback o nessuna immagine -->
                                      <img src="{{ asset('path/to/fallback-image.jpg') }}" alt="">
                                  @endif
                                    </td>
                                    <td>@mdo</td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layout>
