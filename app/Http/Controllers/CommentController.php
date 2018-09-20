<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;

class CommentController extends Controller
{
    public function store(Post $post) {

        $this->validate(request(), [
           'body' => 'required'
        ]);

        $post->addComment(request('body'));

        return back();
    }

    public function destroy($id) {

         $comment = Comment::where('id', $id)->firstOrFail();
         $comment->delete();


        return back();
    }

}
