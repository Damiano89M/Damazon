<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'description', 'price', 'category_id', 'quantity'];

    public function toSearchableArray()
    {
        $category = $this->category;

        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'price' => (float) $this->price,
            'category' => $category,
        ];
        return $array;
        
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function images() {

        return $this->hasMany(Image::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function carts()
{
    return $this->hasMany(Cart::class);
}
}
