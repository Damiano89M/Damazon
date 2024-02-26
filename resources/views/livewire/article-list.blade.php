<div>
    <div class="overflow">
        @if (session('message'))
            <div id="message" class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table id="form" class="table ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Quantità</th>
                    <th scope="col"></th>
                    <th scope="col">Azioni</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            @forelse ($articles as $article)
                @if (Auth::user() && $article->user_id == Auth::user()->id)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $article->id }}</th>
                            <td>{{ $article->title }}</td>
                            <td>
                                <div class="d-flex">
                                    @if ($article->discount_price)
                                        <p class="card-text text-danger">
                                            <del>{{ $article->price }}€</del>
                                        </p>
                                        <p class="card-text text-success ms-2">
                                            {{ $article->discount_price }}€
                                        </p>
                                    @else
                                        <p class="card-text">{{ $article->price }}€</p>
                                    @endif
                                </div>
                            </td>
                            @if ($article->quantity)
                                <td>{{ $article->quantity }}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td>
                                <button class="btn apriModale" data-target="myModal{{ $article->id }}"><i
                                        class="fa-regular fa-trash-can"></i>
                                </button>
                            </td>
                            <td>
                                <a href="{{ route('article.edit', $article) }}"><i
                                        class="fa-regular fa-pen-to-square text-black icon"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('article.show', $article) }}"><i
                                        class="fa-regular fa-eye text-black icon"></i></a>
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
