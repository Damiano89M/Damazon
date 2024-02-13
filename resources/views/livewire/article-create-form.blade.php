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
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" wire:model="title">
                    </div>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label">Categorie</label>
                        <select class="form-select" wire:model="category_id">
                            <option value="">Scegli la categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-3">
                        <label for="quantity" class="form-label">Quantità</label>
                        <input type="number" class="form-control" min="1" id="quantity" wire:model="quantity">
                    </div>
                    @error('quantity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="images" class="form-label">Immagini</label>
                        <input type="file" wire:model="temporary_images" multiple
                            class="form-control @error('temporary_images.*')is-invalid @enderror" id="images">
                    </div>
                    @error('temporary_images.*')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('image')
                        <p class="text-danger fst-italic">{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" cols="30" rows="5" wire:model="description"></textarea>
                    </div>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="from-label mb-2" for="price">Prezzo</label>
                        <input type="float" class="form-control" id="price" wire:model="price">
                    </div>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="from-label mb-2" for="discount_price">Prezzo scontato</label>
                        <input type="float" class="form-control" id="discount_price" wire:model="discount_price">
                    </div>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-form-create">Inserisci</button>
                </form>
            </div>
            @if (!empty($images))

                <div class="col-12 col-md-5 p-5 form-create">
                    <p class="">Anteprima immagine</p>
                    <div class="row">
                        @foreach ($images as $key => $image)
                            <div class="col-4 position-relative">
                                {{--  <div class="img-preview mx-auto shadow rounted"
                                    style="background-image:url({{ $image->temporaryUrl() }})">
        
                                </div> --}}
                                <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid tag-img">
                                <button type="button" class="btn btn-preview"
                                    wire:click="removeImage({{ $key }})">Cancella</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
