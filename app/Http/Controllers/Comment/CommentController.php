<?php

namespace App\Http\Controllers\Comment;



use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;

class CommentController extends BaseController
{
    // Create Comment
    public function store(StoreRequest $request, $id)
    {
        $data = $request->validated();
        return $this->services->store($data,$id);
    }

    // get all comments of a post
    public function index($id)
    {
        return $this->services->index($id);
    }

    // update a comment
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        return $this->services->update($data,$id);
    }

    // delete a comment
    public function destroy($id)
    {
        return $this->services->destroy($id);
    }


}
