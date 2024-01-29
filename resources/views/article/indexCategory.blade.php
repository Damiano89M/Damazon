<x-layout>
    <div class="container p-5">
        <div class="row">
            @forelse ($category->articles as $article )
                
            <div class="col-12 col-md-3">
                <x-card :article="$article" />
            </div>
            @empty
                <h3 class="text-center p-5">Non ci sono articoli per questa categoria, <a href="{{ route('article.create') }}">Aggiungine uno</a></h3>
            @endforelse
        </div>
    </div>
</x-layout>