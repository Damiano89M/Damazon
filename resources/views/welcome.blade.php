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
        {{-- Header --}}
        <div class="row mt-2 bg-header">
            <div class="col-12 div-head text-center">
                <h1 class="p-4 fs-2">Comincia a guadagnare con il tuo usato!</h1>
                <a class="btn btn-div-head" href="{{ route('article.create') }}">Inizia a vendere</a>
            </div>
        </div>
        <div class="row my-4 mt-5">
            <div class="col-12 col-md-10 px-4 messaggio">
                <p class="fs-5 pt-1">Comodo facile e veloce direttamente a casa tua.</p>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-12 col-md-4 ms-4">
                <h3 class="h3-row-3">Ultimi articoli inseriti</h3>
            </div>
            <div class="col-12 col-md-2 mt-2">
                <a class="tag-a-veditutti" href="{{ route('article.index') }}">Vedi tutti</a>
            </div>

        </div>
    </div>
    <div class="container">

        {{-- Tutti gli annunci --}}
        <div class="row justify-content-center row-card-home">
            @forelse ($articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>

        <hr>
    </div>
    <div class="container container-row-watch">
        <div class="row row-watch">
            <div class="col-12 col-md-6 p-5 justify-content-center  d-flex align-items-center watch">
                <h2 class="h2-watch ">Stile che si adatta a te,<br> non il contrario!</h2>
                <h2 class="h2-watch"></h2>
            </div>
            <div class="col-12 col-md-6">

            </div>
        </div>
    </div>
    {{-- Tutti gli annunci elettronica --}}
    {{-- <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3"> Tutto elettronica</h3>

            @forelse ($category_elettronica->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>

        <hr>
    </div> --}}
    {{-- Tutti gli annunci informatica --}}

    {{-- <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto informatica</h3>

            @forelse ($category_informatica->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci telefonia --}}
   {{--  <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto telefonia</h3>

            @forelse ($category_telefonia->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci moda uomo --}}
   {{--  <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto moda uomo</h3>

            @forelse ($category_moda_uomo->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci moda donna --}}
   {{--  <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto moda donna</h3>

            @forelse ($category_moda_donna->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci moda bambino --}}
    {{-- <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto moda bambino</h3>

            @forelse ($category_moda_bambino->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci moda bambina --}}
   {{--  <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto moda bambina</h3>

            @forelse ($category_moda_bambina->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci prima infanzia --}}
   {{--  <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto prima infanzia</h3>

            @forelse ($category_prima_infanzia->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci casa e cucina --}}
   {{-- <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto casa e cucina</h3>

            @forelse ($category_casa_e_cucina->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci giochi --}}
    {{-- <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto giochi</h3>

            @forelse ($category_giochi->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci giocattoli --}}
    {{-- <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto giocattoli</h3>

            @forelse ($category_giocattoli->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
    {{-- Tutti gli annunci musica --}}
    {{-- <div class="container">
        <div class="row justify-content-center row-card-home">
            <h3 class="ms-4 my-3">Tutto musica</h3>

            @forelse ($category_musica->articles as $article)
                <div class="col-12 col-md-2 mt-md-2 ">
                    <x-card :article="$article" />
                </div>

            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine
                        uno!</a></h3>
            @endforelse
        </div>
        <hr>
    </div> --}}
</x-layout>
