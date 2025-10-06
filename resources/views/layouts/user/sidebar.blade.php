@if (session('lang') == 'en' || session('lang') == null)
    <div class="col-lg-4">

        <div class="sidebar">
            <!-- <h3 class="sidebar-title">Search</h3>
      <div class="sidebar-item search-form">
        <form action="">
          <input type="text">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div>
      -->
            <!-- End sidebar search formn-->

            <h3 class="sidebar-title">Provinces</h3>
            <div class="sidebar-item categories">
                <ul>
                    @foreach (App\Models\State::activeStates() as $stateItem)
                        <li><a href="{{route('guest.blog.index' , $stateItem->id)}}">{{$stateItem->name}} <span>({{strtoupper($stateItem->symbol)}})</span></a></li>
                    @endforeach
                    
                </ul>
            </div>
            <!-- End sidebar categories-->

            {{-- <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
                @foreach ($recentBlogs as $blogItem)
                    @if(empty($blogItem->body_en))
                        @continue
                    @endif
                <div class="post-item clearfix">
                    <img src="@php 
                            $doc = new DOMDocument();
                            @$doc->loadHTML($blogItem->body_en);
                            $xml=simplexml_import_dom($doc); // just to make xpath more simple
                            $images=$xml->xpath('//img');
                            foreach($images as $image){
                                echo $image['src'];
                                break;
                            }
                    @endphp" alt="">
                    <h4><a href="{{route('guest.blog.show' , $blogItem->slug)}}">{!! mb_substr($blogItem->title_en,0,80) !!}</a></h4>
                    <time datetime="2020-01-01">{{$blogItem->created_at->format('d/m/Y')}}</time>
                </div>
                @endforeach
            </div> --}}
            <!-- End sidebar recent posts-->

            {{-- <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
                <ul>
                    <li><a href="#">App</a></li>
                    <li><a href="#">IT</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Mac</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Office</a></li>
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Studio</a></li>
                    <li><a href="#">Smart</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                </ul>
            </div><!-- End sidebar tags--> --}}

        </div><!-- End sidebar -->

    </div><!-- End blog sidebar -->

@elseif(session('lang') == 'fa')

    <div class="col-lg-4">
        <div class="sidebar">
            <h3 class="sidebar-title">استان ها</h3>
            <!-- End sidebar search form-->

            <h3 class="sidebar-title"></h3>
            <div class="sidebar-item categories">
                <ul>
                    @foreach (App\Models\State::activeStates() as $stateItem)
                        <li><a href="{{route('guest.blog.index' , $stateItem->id)}}">{{$stateItem->name}} <span>({{strtoupper($stateItem->symbol)}})</span></a></li>
                    @endforeach
                </ul>
            </div>
            <!-- End sidebar categories-->

            {{-- <h3 class="sidebar-title"> پست های اخیر </h3>
            <div class="sidebar-item recent-posts">
                @foreach ($recentBlogs as $blogItem)
                @if(empty($blogItem->body_fa))
                        @continue
                    @endif
                <div class="post-item clearfix">
                    <img src="@php 
                                $doc = new DOMDocument();
                                @$doc->loadHTML($blogItem->body_fa);
                                $xml=simplexml_import_dom($doc); // just to make xpath more simple
                                $images=$xml->xpath('//img');
                                foreach($images as $image){
                                    echo $image['src'];
                                    break;
                                }
                        @endphp" alt="">
                    <h4><a href="{{route('guest.blog.show' , $blogItem->slug)}}">{!! mb_substr($blogItem->title_fa,0,80) !!}</a></h4>
                    <time datetime="2020-01-01">{{$blogItem->created_at->format('d/m/Y')}}</time>
                </div>
                @endforeach
            </div> --}}
            
            <!-- End sidebar recent posts-->

            {{-- <h3 class="sidebar-title">تگ ها</h3>
            <div class="sidebar-item tags">
                <ul>
                    <li><a href="#">App</a></li>
                    <li><a href="#">IT</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Mac</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Office</a></li>
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Studio</a></li>
                    <li><a href="#">Smart</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                </ul>
            </div> --}}
            <!-- End sidebar tags-->

        </div>
        <!-- End sidebar -->

    </div>
    <!-- End blog sidebar -->
@endif
