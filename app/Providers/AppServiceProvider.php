<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\View;
use App\Article;
use Illuminate\Database;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);



//        $commentsPerArticleSide = DB::select("
//         SELECT 'article2_id','body',COUNT('comment') FROM `articles` LEFT JOIN
//         `article_users_comments`
//          ON `articles`.`article2_id` = `article_users_comments`.`article_id`
//          GROUP BY `articles`.`article2_id`
//        ORDER BY `articles`.`article2_id`  DESC LIMIT 4
//        ");

        // we are gonna make one query for everything the below one to be fixed!!

//        $commentsPerArticleSide = DB::select("
//        SELECT title,article2_id,created_at,comment as comment_desc,COUNT('comment') as cnt FROM `articles` LEFT JOIN
//         `article_users_comments`
//          ON `articles`.`article2_id` = `article_users_comments`.`article_id`
//        GROUP BY `articles`.`article2_id`,`comment`,title,comment_desc,created_at
//        ORDER BY `articles`.`article2_id`  asc LIMIT 4
//
//        ");
//
        $commentsPerArticleSide = DB::select("
     SELECT    MAX(title) as title,MAX(article2_id) as article2_id,MAX(created_at) as created_at,MAX(comment) as comment_desc,COUNT('comment') as cnt FROM `articles` LEFT JOIN 
         `article_users_comments`
          ON `articles`.`article2_id` = `article_users_comments`.`article_id`
        GROUP BY `articles`.`article2_id`
        ORDER BY `articles`.`article2_id`  DESC LIMIT 4
        
        ");

        $sideBarArticle = Article::take(4)->orderBy('article2_id','DESC')->get();

        View::share(['sidebarArticles'=>$sideBarArticle,'commentsPerArticle'=>$commentsPerArticleSide]);



    }
}
