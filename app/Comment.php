<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    //
    public $fillable = [
        'user_id',
        'from',
        'post_id',
        'content'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
