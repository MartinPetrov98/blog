@extends('layouts.app')

@section('page-desc','Search')

@section('page-keywords','example-keywords')

@section('page-author','example-author')

@section('page-title','Search')



@section('content')


    <div class="container w-75">
        @foreach($articles as $v)

            <div class="card text-center w-75 mt-1000">
                <div class="card-img">
                    <img src="{{asset('images/facebook-page.png')}}" width="200px" height="200px">
                </div>
                <div class="card-body">
                    <h5 class="card-title">  {{$v->title}}</h5>
                    <p class="card-text">{{$v->body}}</p>
                    <a href="{{url('article/'.str_replace(' ', '-', $v->title))}}" class="btn btn-primary">Read More...</a>
                </div>
                <div class="card-footer text-muted mb-5 h-50">
                    {{$v->created_at}}
                </div>
            </div>




        @endforeach

    </div>
    <br>
    <ul class="pagination justify-content-center">

        @if(!empty($articles[0]->title))


        @if($articles->currentPage() ==1)
            <li class="page-item disabled"><a class="page-link" href="{{$articles->previousPageUrl()}}">Previous</a></li>
        @else
            <li class="page-item active"><a class="page-link" href="{{$articles->previousPageUrl()}}">Previous</a></li>
        @endif
        @for($i=1;$i<=$articles->lastPage();$i++)

            @if($articles->currentPage() == $i)
                <li class="page-item"><a class="page-link bg-primary text-light" href="?page={{$i}}">{{$i}}</a></li>

            @else
                <li class="page-item"><a class="page-link " href="?page={{$i}}">{{$i}}</a></li>
            @endif




        @endfor

        @if($articles->currentPage() == $articles->lastPage())
            <li class="page-item disabled"><a class="page-link" href="{{$articles->nextPageUrl()}}">Next</a></li>
        @else
            <li class="page-item active"><a class="page-link" href="{{$articles->nextPageUrl()}}">Next</a></li>
        @endif



    </ul>

    <br>

    {{$articles->currentPage()}}

    @else

        <p class="text-danger font-weight-bold">Nothing found!</p>

    @endif


@endsection