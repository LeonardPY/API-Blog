<?php

namespace App\Services\Like;


use App\Models\Like;
use App\Models\Post;

class Services
{
    // like or unlike
    public function likeOrUnlike($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response([
                'message' => 'Post not found.'
            ],403);
        }

        $like = $post->like()->where('user_id',auth()->user()->id)->first();

        // if not liked then like
        if (!$like)
        {
            Like::create([
                'post_id' => $id,
                'user_id' => auth()->user()->id
            ]);

            return response([
                'message' => 'like'
            ],200);
        }
        // else dislike
        $like->delete();

        return response([
            'message' => 'dislike'
        ],200);

    }
}
