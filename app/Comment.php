<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'article_users_comments';
    protected $primaryKey = 'comment_id';
    public $timestamps = false;



   public function getSingle(){
       $result = Comment::find(1)->with('article')->with('user')->get();
       return $result;
   }

    public function article(){
       return $this->belongsTo('App\Article','article_id');
    }

    public function user(){
       return $this->hasMany('App\User','id');
    }




}
