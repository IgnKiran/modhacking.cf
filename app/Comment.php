<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'post_id',
        'author',
        'photo',
        'email',
        'body',
        'is_active',
    ];

    //function for counting comments
//    public function commentCount($postId) {
//        return $this->post_id->where('post_id', $postId)->count();
//    }
    public function replyCount($replies,$comment_id){
        $count = 0;
        foreach($replies as $reply){
            if ($reply->comment_id == $comment_id){
                $count++;
            }
        }
        return $count;
    }

    public function replies() {
        return $this->hasMany('App\CommentReply');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
