<?php

namespace App\Services\Post;


use App\Models\Post;
use App\Services\BaseService;
use Illuminate\Support\Arr;

class Services extends BaseService
{
    public function index()
    {
        return response([
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ],200);
    }
    public function store($data)
    {
        $data['image'] = $this->saveImage($data['image'], 'posts');
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'body'    => $data['body'],
            'image'   => $data['image']
        ]);

        return response([
            'post' => $post
        ],200);
    }

    public function update($data, $id)
    {
        $post = Post::find($id);
        if(!$post) {
            return response([
                "massages" => "Post Not Found"
            ],403);
        }
        if(auth()->user()->id != $post->user_id) {
            return response([
                "massages" => "Permission denied."
            ],403);
        }

        $body  = Arr::pull($data, 'body');
        $image = Arr::pull($data, 'image');

        if($image) {
            $image = $this->saveImage($image, 'posts');
        }else {
            $image = $post->image;
        }

        $post->update([
           'body'   => $body,
           'image'  => $image
        ]);

        return response([
            "massages" => "updated post",
            "post" => $post
        ],200);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response([
                'message' => 'Post not found.'
            ],403);
        }

        if ($post->user_id != auth()->user()->id) {
            return response([
                'message' => 'Permission denied.'
            ],403);
        }

        $post->delete();

        return response([
            'messages' => 'Post deleted .'
        ],200);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response([
                'message' => 'Post not found.'
            ],403);
        }

        if ($post->user_id != auth()->user()->id) {
            return response([
                'message' => 'Permission denied.'
            ],403);
        }

        return response([
            'post' => $post
        ],200);

    }
}
