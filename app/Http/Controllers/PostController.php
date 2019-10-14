<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
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

    public function getAllPostsJson()
    {
        $posts = Post::all();
        $postsJSON = array();
        foreach ($posts as $post){
            $comments = $post->comments;
            $commentsJSON = array();
            foreach ($comments as $comment)
            {
                $commentsJSON[$comment->getAttribute('id')] = array('author' => $comment->author, 'text' => $comment->getAttribute('text'));
            }
            $postsJSON[$post->getAttribute('id')] = array('author' => $post->author, 'comments' => $commentsJSON);

        }
        return $postsJSON;
    }

    public function findUserIdByPostId(Request $request)
    {
        // we use autoincrement id, so the posts are already sorted by id
        $posts = Post::all('id', 'user_id');
        $n = count($posts);
        $l = 0;
        $r = $n - 1;
        $m = 0;
        $T = intval($request['post_id']);
        while ($l <= $r)
        {
            $m = intval(floor(($l + $r)/2));
            if ($posts[$m]['id'] < $T)
            {
                $l = $m + 1;
            } else if($posts[$m]['id'] > $T){
                $r = $m - 1;
            } else {
                return $posts[$m]['user_id'];
            }
        }
        return "does not exists";
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
