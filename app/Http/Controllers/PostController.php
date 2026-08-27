<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'title' => 'All Posts',
            'posts' => ['First Post', 'Second Post', 'Third Post'],
        ]);
    }
        public function about()
        {
            return view('about');
        }

        public function create()
    {
        return view('posts.create');
    }
        public function store()
    {
        return 'Store Post';
    }

        public function show(string $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(string $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(string $post)
    {
        return "Update Post {$post}";
    }

    public function destroy(string $post)
    {
        return "Delete Post {$post}";
    }
}