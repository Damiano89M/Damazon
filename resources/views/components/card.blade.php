<a href="{{ route('article.show', $article) }}">
    <div class="card" style="width: 13rem;">
        <img src="{{ !$article->images()->get()->isEmpty()? Storage::url($article->images()->first()->path): 'public\media\default-avatar-profile-icon-vector-social-media-user-photo-183042379.jpg' }}"
            class="card-img-top" alt="...">
        {{-- <img src="{{ !$article->images()->get()->isEmpty()? $article->images()->first()->getUrl(200, 200): '/public/media/default-img.jpg' }}"
            class="img-fluid"> --}}
        <div class="card-body">
            <h5 class="card-title">{{ Str::limit($article->title, '10') }}</h5>
            <p class="card-text p1">{{ Str::limit($article->description, '20') }}</p>
            <p class="card-text p2">{{ $article->price }}€</p>
            <p class="card-text p3"> {{ $article->category->name ?? 'categoria non specificata' }}</p>
          
          
        </div>
    </div>
</a>
