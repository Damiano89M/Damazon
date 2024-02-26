@if (Route::CurrentRouteName() != 'password.reset' && Route::CurrentRouteName() != 'password.update')

    <nav class="navbar navbar-expand-lg bg-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepage') }}">Damazon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <form action="{{ route('article.search') }}" method="GET" class="d-flex w-75" role="search">
                    <input name="searched" class="form-control me-2" type="search" placeholder="Cerca"
                        aria-label="Search">
                    {{-- <button class="btn btn-outline-success" type="submit">Cerca</button> --}}
                </form>
            </div>
            <div class="collapse navbar-collapse justify-content-end azioni" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    @auth
                        <div class="dropdown">
                            @if (Auth::user()->image)
                                <img src="{{ Storage::url(Auth::user()->image) }}" alt="immagine profilo"
                                    class="img-fluid image-profile">
                            @else
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQJxKGGpPc9-5g25KWwnsCCy9O_dlS4HWo5A&usqp=CAU"
                                    alt="immagine default" class="img-fluid image-profile">
                            @endif

                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}

                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link text-dark" aria-current="page"
                                        href="{{ route('auth.profile') }}">Profilo</a></li>
                                <li><a class="nav-link text-dark" href="{{ route('homepage') }}">Home</a></li>
                                <li><a class="nav-link text-dark" href="{{ Route('article.create') }}">Inserisci
                                        articolo</a></li>
                                <li><a class="nav-link text-dark" aria-current="page"
                                        href="{{ Route('article.index') }}">articoli</a></li>
                                <li>
                                    <a class="nav-link text-dark" aria-current="page" href="#"
                                        onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                                    <form action="{{ route('logout') }}" method="POST" id="form-logout">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <a class="nav-link text-dark" aria-current="page" href="{{ Route('article.showCart') }}"><i
                                class="fa-solid fa-cart-shopping">
                                <span class="badge badge-pill badge-danger text-black count">

                                    {{ session('cart') ? count(session('cart')) : 0 }}
                                </span>
                            </i></a>
                    @else
                        <a class="nav-link text-dark" href="{{ route('register') }}">Registrati</a>
                        <a class="nav-link text-dark" href="{{ route('login') }}">Accedi</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
@endif
