<nav class="navbar navbar-expand-lg bg-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">Damazon</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <form action="{{ route('article.search') }}" method="GET" class="d-flex w-75" role="search">
                <input name="searched" class="form-control me-2" type="search" placeholder="Cerca" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cerca</button>
            </form>
        </div>
        <div class="collapse navbar-collapse justify-content-end interazioni" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @auth
                    <a class="nav-link text-dark" aria-current="page" href="{{ route('auth.profile') }}">{{ Auth::user()->name }}</a>
                    <a class="nav-link text-dark" aria-current="page" href="{{ route('homepage') }}">Home</a>
                    <a class="nav-link text-dark" aria-current="page" href="{{ Route('article.create') }}">Inserisci articolo</a>
                    <a class="nav-link text-dark" aria-current="page" href="{{ Route('article.index') }}">articoli</a>
                    <a class="nav-link text-dark" aria-current="page" href="{{ Route('article.showCart') }}"><i class="fa-solid fa-cart-shopping">
                        <span class="badge badge-pill badge-danger"></span>
                        </i></a>
                    <a class="nav-link text-dark" aria-current="page" href="#"
                        onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                    <form action="{{ route('logout') }}" method="POST" id="form-logout">
                        @csrf
                    </form>
                @else
                    <a class="nav-link text-dark" href="{{ route('register') }}">Registrati</a>
                    <a class="nav-link text-dark" href="{{ route('login') }}">Accedi</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
