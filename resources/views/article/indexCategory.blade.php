<x-layout>
    {{-- header --}}
      <div class="container mt-3">
        <div class="row carousel-container bg-header-index">
            <div class="col-12 col-md-8 carousel-slide slide-1 text-end d-flex align-items-center watch-index">
                <h3 class="fs-1 testo-index-head ">Rivoluziona il tuo quotidiano con prodotti innovativi che fanno la differenza.</h3>
            </div>
        </div>
    </div>
    
    
    <div class="container p-5 ">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center fs-1">{{ $category->name }}</h2>
            </div>
            <hr>
            @forelse ($category->articles as $article )
                
            <div class="col-12 col-md-2 m-1">
                <x-card :article="$article" />
            </div>
            @empty
                <h3 class="text-center p-5">Non ci sono articoli per questa categoria, <a href="{{ route('article.create') }}">Aggiungine uno</a></h3>
            @endforelse
        </div>
       
    </div>
</x-layout>