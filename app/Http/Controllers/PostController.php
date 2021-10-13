<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $posts = Post::all();
        return view('posts.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required',
           'description' => 'required',
        ]);
        $input = $request->all();
        Post::create($input);
        return redirect()->back();
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
