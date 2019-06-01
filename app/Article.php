<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database;
use Illuminate\Support\Facades\DB;

class Article extends Model


{

    protected $primaryKey = 'article2_id';


    public function getArticles(){
        $articles = Article::paginate(3);
        return $articles;
    }

    public function getSingleArticle($title){

        $data = DB::select("SELECT
            *
        FROM
            `articles`
            LEFT JOIN `article_users_comments` as `auc` ON `auc`.`article_id` = `articles`.`article2_id` 
            LEFT JOIN `users`ON `users`.`id` = `auc`.`user_id`
        WHERE
    `articles`.`title` LIKE  '%{$title}%'  ");
        return $data;


    }

//    public function comment(){
//        return $this->hasMany(Comment::class,'comment_id');
//    }












}
