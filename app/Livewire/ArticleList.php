<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ArticleList extends Component
{
    public function render()
    {
        $articles = Article::all();
        return view('livewire.article-list', compact('articles'));
    }

   public function destroy(Article $article)
    {
      

            foreach ($article->images() as $image) {
               Storage::delete($image);
               $image->delete();
    
            }
            $article->delete();
        session()->flash('message', 'Articolo eliminato con successo');
       
    } 
}
