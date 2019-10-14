<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return Post::all();
    }

    public function create(Request $request)
    {
        $post = Post::create([
            'user_id' => User::where('api_token', $request['api_token'])->first()->value('id'),
            'header' => $request['header'],
            'description' => $request['description']
        ]);
        return $post;
    }

    public function delete(Request $request)
    {
        $post = Post::find($request['post_id']);
        if ($this->hasPermission($request, $post))
        {
            $post->delete();

        }
    }

    public function update(Request $request)
    {
        $post = Post::find($request['post_id']);
        if ($this->hasPermission($request, $post))
        {
            $post->header = $request['header'];
            $post->description = $request['description'];
            $post->save();
        }
        return $post;
    }

    public function getPostByPostId(Request $request)
    {
        $post = Post::find($request['post_id']);
        return $post;
    }

    public function hasPermission(Request $request, Post $post)
    {
        if($post['user_id'] == User::where('api_token', $request['api_token'])->first()->value('id'))
        {
            return true;
        } else {
            return false;
        }
    }
}
