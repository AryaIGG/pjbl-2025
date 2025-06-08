<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Controller
{
    public function contact()
    {
        $authors = \App\Models\User::whereIn('id', Post::pluck('author_id'))->get();

        return view('contact', [
            'title' => 'Contact',
            'authors' => $authors,
        ]);
    }
}
