<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function globalSearch($q){
           $articles = new Search();
           $data=$articles->getSearchedArticles(strip_tags($q));
           return view('globalsearch',['articles'=>$data]);

    }
}
