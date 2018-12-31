<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index() {

        $posts = Post::latest()->paginate(5);

        return view('posts.index', [
            "posts" => $posts,
        ]);
    }

    public function show(Post $post) {

        return view('posts.post', [
            'post' => $post,
        ]);
    }

    public function create() {

        return view('posts.create');
    }


    public function store(PostRequest $request) {

         Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' =>  Auth::user()->id
    ]);

        return redirect('/')->with('status', 'The post has been added');
    }

    public function destroy($id) {

        $post = Post::find($id);
        $post->delete();

        return redirect('/')->with('status', 'The post has been deleted');
    }

    public function edit($id) {

        $post = Post::find($id);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, $id) {

        $post = Post::find($id);
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->save();

        return redirect('/')->with('status', 'The post has been edited');
    }
}
