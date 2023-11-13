<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();
        return response()->json([
            'posts' => $posts
        ]);
    }


    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->only('title', 'body'));
        return response()->json([
            'post' => $post
        ], 201);
    }

    public function show(Post $post)
    {
        return response()->json([
            'post' => $post
        ]);
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->only('title', 'body'));
        return response()->json([
            'post' => $post,
        ]);
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
