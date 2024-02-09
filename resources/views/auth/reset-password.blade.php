<x-layout>
    <div class="container-fluid accesso">

        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <form class="p-5 form-accesso" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="mb-3 text-center">
                        <span class="fs-3">Reset password</span>
                    </div>
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
                        <i class="fa-regular fa-eye icona" onclick="showapassword()"></i>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 position-relative">
                        <label for="password_confirmation" class="form-label">Conferma password</label>
                        <input type="password" class="form-control input-accesso" id="password_confirmation"
                            name="password_confirmation">
                        <i class="fa-regular fa-eye icona" onclick="vediapassword()"></i>
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-accesso mb-3">Salva password</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
