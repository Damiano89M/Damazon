<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    /*    public function articles() {
        return $this->belongsToMany(Article::class);
    } */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
