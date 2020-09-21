<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    function index(){
        return view('layouts.articles');
    }

    public function show($post_name) {
        //dd('test');
        $posts = \App\Post::where('post_name',$post_name)->first(); //get first post with post_nam == $post_name
        $post_id = \App\Post::where('post_name',$post_name)->value('id');
        $comments = \App\Comment::where('post_id',$post_id)->get();
        //return $posts;
        return view('posts.single',array( //Pass the post to the view
            'post' => $posts,
            'comments' => $comments,
            'post_id' =>$post_id
        ));
    }
}
