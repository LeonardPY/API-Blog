<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\PostRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

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
        return $this->services->store($data);
    }

    // user update post
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        return $this->services->update($data, $id);
    }

    // user delete post
    public function destroy($id)
    {
        return $this->services->destroy($id);
    }

    // show single post
    public function show($id)
    {
        return $this->services->show($id);
    }
}
