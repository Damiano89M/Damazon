<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Articolo</th>
                            <th scope="col">Prezzo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            @if (Auth::user() && Auth::user()->name)
                                <tr>
                                    <th scope="row"></th>
                                    <td>{{ $cart->name }}</td>
                                    <td>{{ $cart->email }}</td>
                                    <td>{{ $cart->article_title }}</td>
                                    <td>{{ $cart->price }}</td>
                                    <td>
                                      @if ($cart->article && $cart->article->images && !$cart->article->images->isEmpty())
                                      <img class="img-fluid img-show" src="{{ Storage::url($cart->article->images->first()->path) }}" alt="">
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
