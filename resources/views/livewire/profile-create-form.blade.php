<div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">

                <form id="form" class="p-5 form-create message" wire:submit.prevent="store">
                    @if (session('message'))
                        <div id="message" class="alert alert-success message">
                            {{ session('message') }}
                        </div>
                    @endif
                    @csrf

                    <div class="mb-3">
                        <label for="city" class="form-label">Città</label>
                        <input type="text" class="form-control" id="city" wire:model="city">
                    </div>
                    @error('city')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="province" class="form-label">Provincia</label>
                        <input type="text" class="form-control" id="province" wire:model="province">
                    </div>
                    @error('province')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="age" class="form-label">Città</label>
                        <input type="number" class="form-control" id="age" wire:model="age">
                    </div>
                    @error('age')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 div-img-attuale">
                        <label for="image" class="form-label">Immagine attuale</label>
                        <img src="{{ Storage::url(Auth::user()->image) }}" alt="" class="img-fluid imgAttuale">
                        
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine profilo</label>
                        <input type="file" wire:model="image" class="form-control" id="image">
                    </div>
                    @error('image')
                        <p class="text-danger fst-italic">{{ $message }}</p>
                    @enderror
                   {{--  @if (Auth::User()->image)
                        <div class="mb-1">
                            <label for="image" class="form-label">Anteprima immmagine</label>
                            <img src="{{ Auth::User()->image->temporaryUrl() }}" alt=""
                                class="img-fluid imgAttuale">
                        </div>
                    @endif --}}
                    <div class="mb-3">
                        <label for="" class="form"></label>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Biografia</label>
                        <textarea class="form-control" id="bio" cols="30" rows="5" wire:model="bio"></textarea>
                    </div>
                    @error('bio')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-form-create">Inserisci</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
