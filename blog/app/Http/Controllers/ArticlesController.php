<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('articles.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_name' => 'required'
        ]);

        $post = new \App\Post;
        $post->user_id = '1';
        $post->post_date = now();
        $post->post_title = $request->post_title;
        $post->post_name = $request->post_name;
        $post->post_content = $request->post_content;
        $post->post_type = 'article';
        $post->post_status = 'published';
        $post->post_category = 'blog';
        $post->save();

        return redirect('articles')->with('Success', 'Article Inserted Succeessfully');
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    function store_comment(Request $request)
    {
        $request->validate([
            'comment_name' => 'bail|required|alpha',
            'comment_email' => 'bail|required|email',
            'comment_content' => 'bail|required|max:250',
        ]);

        $comment = new Comment();
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_content = $request->comment_content;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect('articles')->with('Success', 'Comment added Succeessfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrfail($id);
        $comments = \App\Comment::where('post_id',$id)->get();
        return view('articles.show', compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        return view('articles.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_name' => 'required'
        ]);


        $input_data = array(
            'user_id' => '1',
            'post_date' => now(),
            'post_title' => $request->post_title,
            'post_name' => $request->post_name,
            'post_content' => $request->post_content,
            'post_type' => 'article',
            'post_status' => 'published',
            'post_category' => 'blog'
        );
        Post::whereId($id)->update($input_data);

        return redirect('articles')->with('Success', 'Article Edited Succeessfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        $post->delete();
        return redirect('articles')->with('error', 'Article Deleted Succeessfully');
    }
}
