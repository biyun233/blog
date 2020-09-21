<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(CommentRequest $request)
    {
        //$validated = $request->validated();
        $comment = new Comment();
        $comment->comment_name = $request->nom;
        $comment->comment_email = $request->email;
        $comment->comment_content = $request->message;
        $comment->post_id = $request->post_id;
        $comment->save();
        return view('layouts/confirm');
    }
}
