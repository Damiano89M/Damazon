<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function article() {

        return $this->belongsTo(Article::class);
    }

    public static function getUrlByFilePath($filepath, $w = null, $h = null) {

        if(!$w && !$h) {
            return Storage::url($filepath);
            
        }

        $path = dirname($filepath);
        $fileName = basename($filepath);
        $file = "{$path}/crop_{$w}x{$h}_{$fileName}";

        return Storage::url($file);
    }

    public function getUrl($w = null, $h = null) {
        return Image::getUrlByFilePath($this->path, $w, $h);
    }

}
