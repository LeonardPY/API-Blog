<?php

namespace App\Services\Comment;

use App\Models\Comment;
use App\Models\Post;
use App\Services\BaseService;
use Illuminate\Http\Request;

class Services extends BaseService
{

    // create a comment
    public function store($data, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response([
                'massage' => 'Post not found.'
            ],403);
        }
        Comment::create([
            'user_id'  => auth()->user()->id,
            'post_id'  => $post->id,
            'comment'  => $data['comment']
        ]);

        return response([
            'massage' => 'Comment created.',
        ],200);
    }

    // get all comments of a post
    public function index($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response([
                'massage' => 'Post not found.'
            ],403);
        }

        return response([
            'comments' => $post->comment()->with('user:id,name')->get()
        ],200);
    }

    // update a comment
    public function update($data, $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response([
                'massage' => 'Comment not found.'
            ],403);
        }

        if($comment->user_id != auth()->user()->id)
        {
            return response([
                'massage' => 'Permission denied.'
            ],403);
        }

        $comment->update([
            'comment' => $data['comment'],
        ]);

        return response([
            'message' => 'Comment updated.',
        ],200);
    }

    // delete a comment
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response([
                'massage' => 'Comment not found.'
            ],403);
        }

        if($comment->user_id != auth()->user()->id)
        {
            return response([
                'massage' => 'Permission denied.'
            ],403);
        }

        $comment->delete();

        return response([
            'message' => 'Comment delete.',
        ],200);
    }

}
