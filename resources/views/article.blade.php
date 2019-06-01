@extends('layouts.app')




<?php $page_title = $article[0]->title ?>
@section('page-title',$page_title)

@section('content')





<div class="container w-75">
    <div class="card w-75" style="width: 18rem;">

        @if(!empty($article[0]->image))
            <img class="card-img-top" src="/storage/images/{{$article[0]->image}}" width="200px" height="200px">
        @else
            <img class="card-img-top" src="{{asset('images/facebook-page.png')}}" alt="Card image cap" width="150px" height="150px"  >

        @endif

        <div class="card-body">
            <h5 class="card-title">{{$article[0]->title}}</h5>
            <p class="card-text">{{$article[0]->body}}</p>
        </div>
        {{--<ul class="list-group list-group-flush">--}}
            {{--<li class="list-group-item">Cras justo odio</li>--}}
            {{--<li class="list-group-item">Dapibus ac facilisis in</li>--}}
            {{--<li class="list-group-item">Vestibulum at eros</li>--}}
        {{--</ul>--}}
        {{--<div class="card-body">--}}
            {{--<a href="#" class="card-link">Card link</a>--}}
            {{--<a href="#" class="card-link">Another link</a>--}}
        {{--</div>--}}
    </div>
</div>
@if(Auth::id())


<br>


    <div class="form-group w-50">
        <form class="form-group" method="POST" action="{{url('post')}}">
        @csrf <!-- {{ csrf_field() }} -->
        <br>
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <input type="hidden" name="article_id" value="{{$article[0]->article2_id}}">


        <label for="comment">Comment:</label>
        <textarea name="article-ckeditor"  class="form-control w-50" rows="5" ></textarea>
        <script>
        CKEDITOR.replace( 'article-ckeditor' );
        </script>

        <button type="submit" class="btn btn-success text-center">Post</button>
        </form>
    </div>






    @else
    In order to comment you must be logged!

@endif

  @if($article[0]->comment)
    <div class="container">


        <div class="card">
            @foreach($article as $v2)
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                        <p class="text-secondary text-center">{{$v2->posted_at}}</p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$v2->name}}</strong></a>


                        </p>
                        <div class="clearfix"></div>
                        <p>{!! htmlspecialchars_decode($v2->comment)!!}</p>
                        {{--<p>--}}
                            {{--<a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>--}}
                            {{--<a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>--}}
                        {{--</p>--}}
                    </div>
                </div>
                @endforeach
                {{--<div class="card card-inner">--}}

                    {{--<div class="card-body">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-2">--}}
                                {{--<img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>--}}
                                {{--<p class="text-secondary text-center">Any Date</p>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-10">--}}
                                {{--<p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Otgovarqsht na komentar</strong></a></p>--}}
                                {{--<p>This is a reply to a comment!</p>--}}
                                {{--<p>--}}
                                    {{--<a class="float-right btn btn-outline-primary ml-2">  <i class="fa fa-reply"></i> Reply</a>--}}
                                    {{--<a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                {{--</div>--}}

            </div>
        </div>
    </div>
    @endif

    @endsection








