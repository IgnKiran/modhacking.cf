<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [
        'comment_id',
        'author',
        'photo',
        'email',
        'body',
        'is_active',
    ];

//    //function for counting replies
//    public function replyCount($commentId) {
//        return $this->comment_id->where('comment_id', $commentId)->count();
//    }

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
