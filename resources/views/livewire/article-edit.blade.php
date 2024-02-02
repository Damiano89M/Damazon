<div>
    <form class="p-5 form-accesso" wire:submit.prevent="update">
        @csrf
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" wire:model="title">
        </div>
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control" id="description" wire:model="description">
        </div>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Categorie</label>
            <select class="form-select" wire:model="category_id">
                <option value="">Scegli la categoria</option>
                @if (!Empty($categories))
                    
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Immagini attuali</label>
            @if (!Empty($old_images))
                
            @foreach ($old_images as $key => $image)
                <img src="{{ Storage::url($image->path) }}" alt="" class="img-fluid old-images">
                <a href="" wire:click.prevent="deleteOldImage({{ $key }})"><i
                        class="fa-solid fa-circle-xmark text-danger ms-2"></i></a>
            @endforeach
             @endif
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Immagini</label>
            <input type="file" wire:model="temporary_images" multiple
                class="form-control @error('temporary_images.*')is-invalid @enderror" id="images">
        </div>
        @error('temporary_images.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p class="">photo preview</p>
                    <div class="row">
                        @foreach ($images as $key => $image)
                            <div class="col">
                                {{--  <div class="img-preview mx-auto shadow rounted"
                                        style="background-image:url({{ $image->temporaryUrl() }})">
    
                                    </div> --}}
                                <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid">
                                <button type="button" class="btn"
                                    wire:click="removeImage({{ $key }})">Cancella</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        @endif
        @error('image')
            <p class="text-danger fst-italic">{{ $message }}</p>
        @enderror
        <div class="mb-3">
            <label class="from-label mb-2" for="price">Prezzo</label>
            <input type="float" class="form-control" id="price" wire:model="price">
        </div>
        @error('price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-accesso">Salva</button>
    </form>
</div>
