<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-light" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-light" href="{{url('/')}}">Articles <span class="sr-only">(current)</span></a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link text-light" href="#">Link</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--Dropdown--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                    {{--<a class="dropdown-item" href="#">Another action</a>--}}

                {{--</div>--}}
            {{--</li>--}}




        </ul>

        <ul class="navbar-nav ml-auto ">
            @if (Auth::check() && Auth::user()->role == 'admin')
                <button type="button" class="btn btn-secondary add-article-btn" >Add Article</button>
                <form method="POST" class="create-article-form"  action="/article" enctype="multipart/form-data">


                    {{ csrf_field() }}


                    <div class="modal create-modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <input type="text" value="" name="title" class="form-control">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="xmark" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="file" name="img" class="img-thumbnail">
                                    <textarea name="body" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            @endif
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">


                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>



        

        <form class="form-inline my-2 my-lg-0" method="GET" action="{{url('search/')}}/"  onsubmit="return false";>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input class="form-control mr-sm-2" name="q" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="window.location.href=this.form.action + this.form.q.value;">Search</button>
        </form>
    </div>
</nav>