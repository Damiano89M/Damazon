<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
       
        return view('auth.profile');
    }

    public function profileCreate() {

        $articles = Article::all();
        return view('auth.profileCreate', compact('articles'));
    }

   
}
