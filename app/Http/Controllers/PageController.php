<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function about()
    {
        $authors = User::has('posts')->get(); // ambil user yang punya post
        return view('about', [
            'title' => 'About Us',
            'authors' => $authors
        ]);
    }
}
