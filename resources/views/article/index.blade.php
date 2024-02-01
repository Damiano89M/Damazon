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
    {{-- header --}}
      <div class="container-fluid">
        <div class="row carousel-container">
            <div class="col-12 bg-header-index carousel-slide slide-1">

            </div>
        </div>
    </div>
    {{-- carosello --}}
  {{--   <div class="slider-frame">
        <div class="slide-images">
                <div class="img-container">
                    <img class="img-fluid" src="https://www.shutterstock.com/image-illustration/anime-manga-empty-room-dusk-260nw-2187520393.jpg">
                </div>
                <div class="img-container">
                    <img class="img-fluid" src="https://image.winudf.com/v2/image1/Y29tLkVwaWNXYWxscGFwZXJzRlVMTEhELk1hbmdhQXJ0X3NjcmVlbl8wXzE1NjA0MTE2NDZfMDY2/screen-0.webp?fakeurl=1&type=.webp">
                </div>
                <div class="img-container">
                    <img class="img-fluid" src="https://i.pinimg.com/736x/01/54/bd/0154bd289ec968562c8a99d3554cc6ed.jpg">
                </div>
        </div>
    </div> --}}
    <div class="container container-card">
        <div class="row mt-4">
            <div class="col-12">
                <h3 class="text-center fs-1">Tutti gli annunci</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @forelse ($articles as $article)
                <div class="col-12 col-md-2 mt-md-4">
                    <x-card :article="$article" />
                </div>

            @empty
                <h1>Non ci sono articoli <a href="{{ route('article.create') }}">Inseriscine uno!</a></h1>
            @endforelse
        </div>
        {{ $articles->links() }}
    </div>
</x-layout>
