<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\PostRequest;
use App\Models\Post;

class PostController extends BaseController
{
    // get all posts
    public function index()
    {
        return $this->services->index();
    }

    // user create post
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->saveImage($request->image, 'posts');
        return $this->services->store($data);
    }
}
