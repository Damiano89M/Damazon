<?php

namespace App\Livewire;

use App\Jobs\ResizeImage;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ArticleCreateForm extends Component
{
    use WithFileUploads;
    
    public $title;
    public $description;
    public $price;
    public $temporary_images;
    public $images = [];
   /*  public $image; */
    public $article;
    public $category_id;
    public $quantity;
  
    
    protected $rules = [

        'title' => 'required|min:3|max:100',
        'images.*' => 'required|image|max:2000|mimes:webp,png,jpeg,jpg',
        'description' => 'required|min:10|max:10000',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric'
    ];
        
    protected $messages = [

        'required' => 'Il campo deve essere compilato',
        'min' => 'Il campo deve contenere minimo :min caratteri',
        'max' => 'Il campo deve contenere massimo :max caratteri',
        'images.*.image' => 'Il file deve essere un\'immagine',
        'images.*.max' => 'L\'immagine deve avere massimo 2000kb',
        'mimes' => 'Le estensioni devono essere :values',
        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 2mb',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'price' => 'Il campo deve essere una cifra',
    ];

    public function updatedTemporaryImages() {

        if ($this->validate([
            'temporary_images.*' => 'image|max:2000',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }


    public function removeImage($key) {
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);

        }
    }

   

    public function store() {

        $this->validate();

        $this->article = Auth::user()->articles()->create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'quantity' => $this->quantity,
            /* 'image' => $this->image->store('public/articles') */
        ]);

        if (count($this->images)) {

            foreach($this->images as $image) {
               $this->article->images()->create(['path'=>$image->store('images', 'public')]);
              /*   $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

                dispatch(new ResizeImage($newImage->path, 200, 200)); */
            }

            /* File::deleteDirectory(storage_path('app/livewire-tmp')); */
        }

        session()->flash('message', 'Articolo creato con successo');
        $this->redirectRoute('auth.profile');
        $this->reset();
    }


    public function render()
    {
        
        return view('livewire.article-create-form');
    }
}
