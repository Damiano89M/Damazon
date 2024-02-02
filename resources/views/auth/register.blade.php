<x-layout>
    <div class="container-fluid accesso">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <form class="p-5 form-accesso" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome utente</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                      </div>
                      @error('name')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <div class="mb-3 position-relative">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                      <i class="fa-regular fa-eye icona" onclick="showapassword()"></i>
                    </div>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <div class="mb-3 position-relative">
                        <label for="password_confirmation" class="form-label">Conferma password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        <i class="fa-regular fa-eye icona" onclick="vediapassword()"></i>
                      </div>
                      @error('password_confirmation')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Ricordami</label>
                    </div>
                    <button type="submit" class="btn btn-accesso">Registrati</button>
                  </form>
            </div>
        </div>
    </div>

</x-layout>