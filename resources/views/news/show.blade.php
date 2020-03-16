@extends('layouts.main')

@section('content')
    <div id='colorlib-main'>
        <div class='colorlib-blog'>
            <div class='container-wrap'>
                <div class='col-md-9'>
                    <div class='content-wrap'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='blog-entry-style'>
                                    @foreach($singleNews->categories as $category)
                                        <p style='display: inline-block'>| {{ ucfirst($category->field) }} |</p>
                                    @endforeach

                                    <div class='image' style='background-image: url({{ asset('images/' . $singleNews->image) }});background-repeat: no-repeat; min-height: 400px;'></div>

                                    <div class='desc' style='padding: 0'>
                                        <p class='meta'>
                                            <span class='date'>{{ $singleNews->updated_at }}</span>
                                        </p>
                                        <h2>{{ $singleNews->title }}</h2>
                                        <p>{{ $singleNews->text }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class='col-md-3'>
                    {{--  Recent news--}}
                    <div class='side animate-box' style='margin-top: 48px'>
                        @foreach($recentNews as $news)
                            <div class='f-blog'>
                                <a href="{{ asset('news/' . $news->id) }}" class='blog-img'
                                   style='background-image: url({{ asset('images/' . $news->image) }});'>
                                </a>
                                <div class='desc'>
                                    <h3>
                                        <a href="{{ asset('news/' . $news->id) }}' class='blog-img">Recent news</a>
                                    </h3>
                                    <p class='admin'><span>25 March 2018</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{--Images--}}
                    <div class='side animate-box' style='margin-top: 47px'>
                        <h2 class='sidebar-heading'>Images</h2>
                        <div class='instagram-entry'>
                            @foreach($tenNews as $one)
                                <a href="{{ asset('news/' . $one->id) }}" class='instagram text-center'
                                   style="background-image: url({{ asset('images/' . $one->image) }}); width: 90px;
                                       height: 90px">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
