<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    protected $guarded = ['id'];

    public function comments() {

        return $this->hasMany('App\Comment', 'post_id');
    }

    public function addComment($body) {

        Comment::create([
            'body' => $body,
            'post_id' => $this->id,
            'author_ip' => \Request::ip(),
        ]);
    }

    function preview($body, $amountOfWords) {

        if (str_word_count($body) > $amountOfWords) {
            $arr = explode(" ", $body);

            for($i = sizeof($arr); $i >= $amountOfWords; $i--) {
                unset($arr[$i]);
            }
            $body = array_values($arr);
            array_push($body, "...");
            $body = implode(" ", $body);
        }

        return $body;
    }
}
