<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleEdit extends Component
{
    use WithFileUploads;

    public $article;
    public $title;
    public $description;
    public $price;
    public $images = [];
    public $image;
    public $category_id;
    public $temporary_images;
    public $old_images;

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:2000',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
          
          
        }
    }
    public function deleteOldImage($key){

        if ($this->old_images->has($key)) {
           $this->old_images->get($key)->delete();
            $this->old_images->forget($key);
        }

        session()->flash('message', 'Immagine eliminata con successo');
    }    

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function update() {

        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
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

        session()->flash('message', 'Articolo modificato con successo');
        $this->reset();
    }

    public function mount() {

        $this->title = $this->article->title;
        $this->description = $this->article->description;
        $this->price = $this->article->price;
        $this->category_id = $this->article->category_id;
        $this->old_images = Image::where('article_id', $this->article->id)->get();
        $this->temporary_images = $this->old_images;
    }
    public function render()
    {


        return view('livewire.article-edit');
    }
}
