<x-layout>
    <div class="container-fluid accesso">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 ">
                <form class="p-5 form-accesso" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @if (session('password-link'))
                        <div id="message" class="alert alert-success message">
                            {{ session('password-link') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control input-accesso" id="email" name="email"
                            value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-accesso">Reimposta password</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
