<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(["message"=>"post not found"],404);
        }
        return response()->json($post);
    }
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post);
    }
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(["message"=>"post not found"],404);
        }
        $post->update($request->all());
        return response()->json($post);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(["message"=>"post not found"],404);
        }
        $post->delete();
        return response()->json(["message"=>"post deleted successfully"]);
    }
}
