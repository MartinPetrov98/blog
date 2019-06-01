@extends('layouts.app')

@section('page-desc','example-desc')

@section('page-keywords','example-keywords')

@section('page-author','example-author')

@section('page-title','Home')



@section('content')

<div class="container w-75">

    @foreach($articles as $v)

       <div class="card text-center w-75 mt-1000">
           <div class="card-img">

               @if(!empty($v->image))
                   <img src="/storage/images/{{$v->image}}" width="200px" height="200px">
               @else
               <img src="{{asset('images/facebook-page.png')}}" width="200px" height="200px">

                   @endif
           </div>
           <div class="card-body">
               <h5 class="card-title">  {{$v->title}}</h5>
               <p class="card-text">{{$v->body}}</p>
               @if (Auth::check() && Auth::user()->role == 'admin')

                   <form method="POST" class="edit-article-form" enctype="multipart/form-data" action="/article/{{$v->article2_id}}">
                       {{ csrf_field() }}
                       {{ method_field('PUT') }}



                       <div class="form-group">
                           <input type="submit" class="btn btn-warning edit-article" value="Edit">
                       </div>




                       <div class="modal edit-modal" tabindex="-1" role="dialog">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <input type="text" value="{{$v->title}}" name="title" class="form-control">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span class="xmark" aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                           <input type="file" name="img" class="img-thumbnail">
                                           <img src="{{asset('images/facebook-page.png')}}" width="200px" height="200px">



                                       <textarea name="body" class="form-control">{{$v->body}}</textarea>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-primary">Edit</button>
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <input type="hidden" value="{{$v->article2_id}}" name="id">
                   </form>











                   <form method="POST" class="delete-article" action="/article/{{$v->article2_id}}">
                       {{ csrf_field() }}
                       {{ method_field('DELETE') }}

                       <div class="form-group">
                           <input type="submit" class="btn btn-danger del-article" value="Delete">
                       </div>
                   </form>


                   <div class="modal delete-modal" tabindex="-1" role="dialog">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title">Post</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span class="xmark" aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">
                                   <p>Are you sure that you want to delete ?</p>
                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-primary">Delete</button>
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               </div>
                           </div>
                       </div>
                   </div>


               @endif

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


@endsection