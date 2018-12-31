<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('destroy');
    }

    public function store(Post $post, CommentRequest $request) {

        $post->addComment($request->body);

        return back();
    }

    public function destroy($id) {

         $comment = Comment::where('id', $id)->firstOrFail();
         $comment->delete();

        return back();
    }

}
