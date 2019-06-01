<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function getSearchedArticles($query){
          $data = Article::where('title','like','%'.strip_tags($query).'%')->paginate(3);
          return $data;
    }
}
