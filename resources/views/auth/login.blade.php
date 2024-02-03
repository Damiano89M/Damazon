<x-layout>
    <div class="container-fluid accesso">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 ">
                <form class="p-5 form-accesso" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3 text-center">
                        <span class="fs-3">Accedi</span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control input-accesso" id="email" name="email"
                            value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control input-accesso" id="password" name="password">
                        <i class="fa-regular fa-eye icona" onclick="mostrapassword()"></i>
                       {{--  <ion-icon name="lock-closed-outline"><i class="fa-solid fa-eye icona"
                            onclick="mostrapassword()"></i></ion-icon> --}}
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ricordami</label>
                    </div>
                    <button type="submit" class="btn btn-accesso">Accedi</button>
                    <div class="mt-3">
                        <span>Non sei ancora registrato? <a href="{{ route('register') }}">Registrati</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
