<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create', [
            'title' => 'Create New Post',
            'categories' => Category::all(),
            'authors' => User::has('posts')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required'
        ]);

        Post::create($validated);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::all(),
            'authors' => User::has('posts')->get()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required'
        ]);

        $post->update($validated);

        return redirect('/posts')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted successfully!');
    }
}
