<x-layout>

    <div class="container-fluid">
        <div class="row text-center my-4">
            <h2 class="fs-1">I tuoi articoli</h2>
        </div>
        <div class="row px-5">
            <div class="col-12 col-md-3 infoUser">
                @if (Auth::user())
                    <div>

                        @if (Auth::user()->image)
                            <img src="{{ Storage::url(Auth::user()->image) }}" alt="immagine profilo"
                                class="img-fluid img-profile">
                        @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQJxKGGpPc9-5g25KWwnsCCy9O_dlS4HWo5A&usqp=CAU"
                                alt="immagine default" class="img-fluid img-profile">
                        @endif

                    </div>
                    <span><strong>Città:</strong> {{ Auth::user()->city }}</span>
                    <span><strong>Provincia:</strong> {{ Auth::user()->bio }}</span>
                    <span><strong>Età:</strong> {{ Auth::user()->age }}</span>
                    <span><strong>Biografia:</strong> {{ Auth::user()->province }}</span>
                    <a class="modifica text-center" href="{{ route('auth.profileCreate') }}">modifica</a>
                @endif
            </div>
            <div class="col-12 col-md-6 ">
                <livewire:article-list />
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            @forelse (Auth::user()->articles as $article )
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <h3>non ci sono articoli da mostrare</h3>
            @endforelse
        </div>
    </div>
</x-layout>
