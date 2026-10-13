<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('dashboard')->with('status', 'Post created successfully!');
    }

    public function edit($post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $post)
    {
        return redirect()->route('dashboard')->with('status', 'Post updated successfully!');
    }

    public function destroy($post)
    {
        return redirect()->route('dashboard')->with('status', 'Post deleted successfully!');
    }
}
