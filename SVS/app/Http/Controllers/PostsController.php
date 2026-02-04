<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    // Display all posts
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view("posts.index")->with('posts', $posts);
    }

    // Show create form
    public function create()
    {
         return view("posts.create");
    }

    // Store new post
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    // Show a single post
    public function show($id)
    {
        $post = Post::find($id);
        return view("posts.show")->with('post', $post);
    }

    // Show edit form
    public function edit($id)
    {
        $post = Post::find($id);
        //User auth check
        if(auth()->user()->id !== $post->user_id){
        return redirect('/posts')->with('error', 'Unauthorized Page');
    }
        return view("posts.edit")->with('post', $post);
    }

    // Update existing post
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    // Delete post
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }
}