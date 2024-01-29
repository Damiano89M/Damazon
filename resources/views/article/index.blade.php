<x-layout>
    <div class="container p-5">
        <div class="row justify-content-evely">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @forelse ($articles as $article )
        <div class="col-12 col-md-3 p-5">
            <x-card :article="$article" />
        </div>
            
        @empty
            <h1>Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine uno!</a></h1>
        @endforelse
        </div>
    </div>
</x-layout>