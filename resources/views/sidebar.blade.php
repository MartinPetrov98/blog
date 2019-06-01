<aside class="sidebar-content">
    <div class="row float-right w-25">
        {{--<div class="col-md-4"></div><!-- .Col ends here -->--}}
        <div class="col-md-12 float-right">
            <div class="sidebar widget">
                <h3>Recent Post</h3>



                @foreach($commentsPerArticle as $v)

                    <ul>
                        <li>
                            <div class="sidebar-thumb">
                                <img class="animated rollIn" src="{{asset('images/facebook-page.png')}}" alt="" />
                            </div><!-- .Sidebar-thumb -->
                            <div class="sidebar-content">
                                <h5 class="animated bounceInRight"><a href="{{url('article/'.str_replace(' ','-',$v->title))}}">{{$v->title}}</a></h5>
                            </div><!-- .Sidebar-thumb -->
                            <div class="sidebar-meta">
                                <span class="time" ><i class="fa fa-clock-o"></i>{{$v->created_at}}</span>
                                <span class="comment"><i class="fa fa-comment"></i>
                                    <?php
                                      if(empty($v->comment_desc))
                                          echo 0 ;
                                      else{
                                          echo $v->cnt;
                                      }

                                    ?> comments</span>
                            </div><!-- .Sidebar-meta ends here -->
                        </li><!-- .Li ends here -->

                    </ul><!-- .Ul ends here -->




                @endforeach

                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<div class="sidebar-thumb">--}}
                            {{--<img class="animated rollIn" src="{{asset('images/facebook-page.png')}}" alt="" />--}}
                        {{--</div><!-- .Sidebar-thumb -->--}}
                        {{--<div class="sidebar-content">--}}
                            {{--<h5 class="animated bounceInRight"><a href="#">The Complete Guide to Medium for Marketers</a></h5>--}}
                        {{--</div><!-- .Sidebar-thumb -->--}}
                        {{--<div class="sidebar-meta">--}}
                            {{--<span class="time" ><i class="fa fa-clock-o"></i> Aug 27, 2015</span>--}}
                            {{--<span class="comment"><i class="fa fa-comment"></i> 10 comments</span>--}}
                        {{--</div><!-- .Sidebar-meta ends here -->--}}
                    {{--</li><!-- .Li ends here -->--}}

                {{--</ul><!-- .Ul ends here -->--}}
                {{--<ul>--}}
                    {{--<li>--}}
                        {{--<div class="sidebar-thumb">--}}
                            {{--<img class="animated rollIn" src="{{asset('images/facebook-page.png')}}" alt="" />--}}
                        {{--</div><!-- .Sidebar-thumb -->--}}
                        {{--<div class="sidebar-content">--}}
                            {{--<h5 class="animated bounceInRight"><a href="#">The Complete Guide to Medium for Marketers</a></h5>--}}
                        {{--</div><!-- .Sidebar-thumb -->--}}
                        {{--<div class="sidebar-meta">--}}
                            {{--<span class="time" ><i class="fa fa-clock-o"></i> Aug 27, 2015</span>--}}
                            {{--<span class="comment"><i class="fa fa-comment"></i> 10 comments</span>--}}
                        {{--</div><!-- .Sidebar-meta ends here -->--}}
                    {{--</li><!-- .Li ends here -->--}}

                {{--</ul><!-- .Ul ends here -->--}}

                {{--{{print_r($sidebarArticles)}}--}}
            </div><!-- .Widget ends here -->


        </div><!-- .Col ends here -->

        {{--<div class="col-md-4"></div><!-- .Col ends here -->--}}
    </div><!-- .Row ends here -->



<!-- .Container ends here -->
</aside>