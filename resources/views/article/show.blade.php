<x-layout>
    <div class="container p-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div id="showCarousel" class="carousel">
                    @if ($article->images)
                        <div class="carousel-inner carousss">
                            @foreach ($article->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}" class="img-fluid"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __('ui.precedente') }}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{ __('ui.successivo') }}</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <h3>{{ $article->title }}</h3>
                <p>{{ $article->description }}</p>
                <p>{{ $article->price }}</p>
                <p>{{ $article->created_at->translatedFormat('D d/m/y') }}</p>
                <p>{{ Auth::user()->name ?? 'Non specificato' }}</p>
                <p class="card-text colonna-2">{{ $article->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</x-layout>
