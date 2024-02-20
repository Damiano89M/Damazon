<x-layout>
    <div class="container-fluid">
        {{-- Categorie --}}
        <div class="row">
            <div class="col-12 d-flex justify-content-center col-categorie">
                @foreach ($categories as $category)
                    <a class="mx-2 text-center categorie p-2"
                        href="{{ route('article.indexCategory', $category) }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container container-show">
        @if (session('message'))
            <div id="message" class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (isset($messaggio))
            <div id="message" class="alert alert-info">
                {{ $messaggio }}
            </div>
        @endif

        <div class="row" id="form">
            <div class="col-12 col-md-7">
                <div id="showCarousel" class="carousel">
                    @if ($article->images)
                        <div class="carousel-inner carousss">
                            @foreach ($article->images as $image)
                                <div class="carousel-item div-img-show @if ($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}" class="img-fluid img-show"
                                        alt="immagini degli articoli">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <button class="carousel-control-prev btn-carousel" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __('ui.precedente') }}</span>
                    </button>
                    <button class="carousel-control-next btn-carousel" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __('ui.successivo') }}</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-4 div-dati-show">
                <h3>{{ $article->title }}</h3>

                <div class="d-flex">
                    @if ($article->discount_price)
                        <p class="card-text text-danger price_show">
                            <del>{{ $article->price }}€</del>
                        </p>
                        <p class="card-text text-success ms-2 price_show">
                            {{ $article->discount_price }}€
                        </p>
                    @else
                        <p class="card-text price_show">{{ $article->price }}€</p>
                    @endif
                </div>
                <p>{{ $article->created_at->translatedFormat('D d/m/y') }}</p>
                <p>{{ Auth::user()->name ?? 'Non specificato' }}</p>
                <p class="card-text colonna-2">{{ $article->created_at->diffForHumans() }}</p>
                <p class="card-text colonna-2">{{ $article->category->name }}</p>
                <form action="{{ route('article.addToCart', $article) }}" method="POST" class="row mb-3">
                    @csrf
                    <div class="col-12 col-md-3 d-flex">
                        <input type="number" name="quantity" min="1" value="1"
                            class="form-control input-show">
                    </div>
                    <div class="col-12 col-md-6">
                        <button type="submit" class="btn btn-warning">Aggiungi al carrello</button>
                    </div>
                </form>
                @if ($article->quantity)
                    <span>Qnt.à disponibile: {{ $article->quantity }}</span>
                @else
                    <span class="text-danger">Prodotto terminato</span>
                @endif
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Descrizione</h3>
                <hr style="border-style: dashed">
            </div>
            <div class="col-6 fascia-separazione">
                <p>{{ $article->description }}</p>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 my-3">
                <h3>Articoli simili</h3>
            </div>
            {{-- articoli correlati alla categoria del dettaglio --}}
            @forelse ($article->category->articles as $category)
            <div class="col-12 col-md-2 m-1">
                <x-card :article="$category" />
            </div>
        @empty
            <h3 class="text-center p-5">
                Non ci sono articoli per questa categoria,
                <a href="{{ route('article.create') }}">Aggiungine uno</a>
            </h3>
        @endforelse
        </div>
    </div>
</x-layout>
