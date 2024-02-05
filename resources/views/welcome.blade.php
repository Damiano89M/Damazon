<x-layout>
    <div class="container-fluid">
        {{-- Categorie --}}
        <div class="row">
            <div class="col-12 d-flex justify-content-center col-categorie">
                @foreach ($categories as $category )
                    <a class="mx-2 text-center categorie p-2" href="{{ route('article.indexCategory', $category)}}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        {{-- Header --}}
        <div class="row mt-2 bg-header">
            <div class="col-12 div-head text-center">
                <h2 class="p-4">Comincia a guadagnare con il tuo usato!</h2>
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

            {{-- Card --}}
            <div class="row justify-content-center row-card-home">
                @forelse ($articles as $article )
            <div class="col-12 col-md-2 mt-md-2 ">
                <x-card :article="$article" />
            </div>
                
            @empty
                <h3 class="text-center">Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine uno!</a></h3>
            @endforelse
            </div>
        </div>
</x-layout>