<x-layout>
    <div class="container-fluid accesso">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 ">
                <form class="p-5 form-accesso" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                      </div>
                      @error('email')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ricordami</label>
                    </div>
                    <button type="submit" class="btn btn-accesso">Accedi</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
