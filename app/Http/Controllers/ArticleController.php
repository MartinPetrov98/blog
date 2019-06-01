<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleComments;
use App\Comment;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Validation;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


           $am = new Article();
           $data = $am->getArticles();
           return view('index')->with('articles',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'body'=> 'required',
            'img' => 'image|nullable|max:1999'

        ]);

        if($request->hasFile('img')){
            $fileNameWithExt = $request->file('img')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('img')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('img')->storeAs('public/images',$fileNameToStore);
        }

        $ac = new Article();
        $ac->title = $request->title;
        $ac->body = $request->body;
        $ac->image = $fileNameToStore;
        // using htmlentitles to convert tags
        //then we can use   htmlspecialchars_decode() to display the styled comment


        $ac->save();


        return Redirect::to('/');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $removeDashesFromUrl = str_replace('-',' ',$title);
         $em = new Article();
         $data = $em->getSingleArticle($removeDashesFromUrl);


         return view('article',['article'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        $previousImage = Article::find($id)->image;
        Storage::delete('images/'.$previousImage);
        unlink(public_path('storage/images/'.$previousImage));

        if($request->hasFile('img')){



            $fileNameWithExt = $request->file('img')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('img')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('img')->storeAs('public/images',$fileNameToStore);
        }


        $article =   Article::find($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->image = $fileNameToStore;

        $article->save();

        return Redirect::to('/');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $previousImage = Article::find($id)->image;
        Storage::delete('images/'.$previousImage);
        unlink(public_path('storage/images/'.$previousImage));

        $article=Article::where('article2_id',$id)->delete();
        if($article){
            return Redirect::to('/');
        }


    }

   public function test(){
        $test = new Comment();
        $data =  $test->getSingle();
        return $data;
   }
}
