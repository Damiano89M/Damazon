<div>
  {{-- <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        @forelse ($articles as $article)
            @if (Auth::user() && $article->user_id == Auth::user()->id)
                <tbody>
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->price }}€</td>
                        <td> --}}
                            <!-- Button trigger modal -->
                            {{--  <form action="{{ route('article.destroy', $article) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Elimina</button>
                            </form> --}}
                            {{-- <button class="btn" id="apriModale"><i class="fa-regular fa-trash-can"></i></button> --}}
                            {{-- <a class="btn" id="apriModale"><i class="fa-regular fa-trash-can"></i></a> --}}
                 {{--        </td>
                    </tr>
                </tbody>  --}}
                {{-- modale --}}
       {{--          <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 modale" id="myModal">

                            <div class="modale-contenuto">
                                <span class="chiudi" id="chiudiModale">&times;</span>
                                <p>Sicuro che vuoi eliminare l'annuncio?</p>
                                <a wire:click="destroy({{ $article }})" class="btn btn-danger">Elimina</a>
                            </div>

                        </div>

                    </div>
                </div>
            @endif
        @empty
            <h3 class="mt-5">Non ci sono annunci <a href="{{ route('article.create') }}">Aggiungine uno</a></h3>
        @endforelse
    </table> --}} 
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            @forelse ($articles as $article)
                @if (Auth::user() && $article->user_id == Auth::user()->id)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $article->id }}</th>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->price }}€</td>
                            <td>
                                <button class="btn apriModale" data-target="myModal{{ $article->id }}"><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                    </tbody>
                @endif
            @empty
                <h3 class="mt-5">Non ci sono annunci <a href="{{ route('article.create') }}">Aggiungine uno</a></h3>
            @endforelse
        </table>
    </div>
    
    <!-- Modale fuori dal ciclo -->
    <div class="container">
        <div class="row">
            @forelse ($articles as $article)
                @if (Auth::user() && $article->user_id == Auth::user()->id)
                    <div class="col-12 col-md-6 modale" id="myModal{{ $article->id }}">
                        <div class="modale-contenuto">
                            <span class="chiudi" data-target="myModal{{ $article->id }}">&times;</span>
                            <p>Sicuro che vuoi eliminare l'annuncio?</p>
                            <a wire:click="destroy({{ $article }})" class="btn btn-danger">Elimina</a>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
    </div>
</div>
