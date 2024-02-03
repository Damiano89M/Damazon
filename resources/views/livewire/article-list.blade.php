<div>
    <div>
        @if (session('message'))
            <div id="message" class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table id="form" class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Azioni</th>
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
                                <button class="btn apriModale" data-target="myModal{{ $article->id }}"><i
                                        class="fa-regular fa-trash-can"></i>
                                </button>
                                <a href="{{ route('article.edit', $article) }}"><i class="fa-regular fa-pen-to-square text-black"></i></a>
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
                            <p>Sicuro di volere eliminare l'annuncio?</p>
                            <a wire:click="destroy({{ $article }})" class="btn btn-danger">Elimina</a>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
    </div>
</div>
