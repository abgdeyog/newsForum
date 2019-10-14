<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function create(Request $request)
    {
        Comment::create([
            'user_id' => User::where('api_token', $request['api_token'])->first()->value('id'),
            'post_id' => $request['post_id'],
            'text' => $request['text']
        ]);
        return view('news');
    }

    public function delete(Request $request)
    {
        $comment = Comment::find($request['comment_id']);
        if ($this->hasPermission($request, $comment))
        {
            $comment->delete();
        }
    }

    public function update(Request $request)
    {
        $comment = Comment::find($request['comment_id']);
        if ($this->hasPermission($request, $comment))
        {
            $comment->text = $request['text'];
            $comment->save();
        }
    }

    public function getCommentByCommentId(Request $request)
    {
        $comment = Comment::find($request['post_id']);
        return $comment;
    }

    public function hasPermission(Request $request, Comment $comment)
    {
        if($comment['user_id'] == User::where('api_token', $request['api_token'])->first()->value('id'))
        {
            return true;
        } else {
            return false;
        }
    }

    public function getCommentsByPostId(Request $request)
    {
        $comments = Comment::where('post_id', $request['post_id'])->get();
        return $comments;
    }
}
