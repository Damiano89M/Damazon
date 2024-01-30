<x-layout>
    <div class="container-fluid ">
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
    
    <div class="container container-card">

        <div class="row justify-content-evely">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 p-5">
                    <x-card :article="$article" />
                </div>

            @empty
                <h1>Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine uno!</a></h1>
            @endforelse
        </div>
        {{ $articles->links() }}
    </div>
</x-layout>
