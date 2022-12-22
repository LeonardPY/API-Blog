<?php

namespace App\Services\Post;


use App\Models\Post;

class Services
{
    public function index()
    {
        return response([
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ],200);
    }
    public function store($data)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'body'    => $data['body'],
            'image'   => $data['image']
        ]);

        return response([
            'post' => $post
        ],200);
    }
}
