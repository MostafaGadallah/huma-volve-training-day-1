<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Controllers\ApiResponseTrait;
class PostController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $posts = Post::all();
        return $this->success($posts,"posts found successfully");
    }
    public function show(Post $post)
    {
        if (!$post) {
            return $this->error("post not found");
        }
        return $this->success($post,"post found successfully");
    }
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());
        return $this->success($post,"post created successfully",201);
    }
    public function update(UpdateRequest $request, Post $post)
    {
        if (!$post) {
            return $this->error("post not found");
        }
        $post->update($request->validated());
        return $this->success($post,"post updated successfully",201);
    }
    public function destroy( Post $post)
    {
        if (!$post) {
            return $this->error("post not found");
        }
        $post->delete();
        return $this->success($post,"post deleted successfully",204);
    }
}
