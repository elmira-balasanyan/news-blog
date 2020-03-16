@extends('layouts.main')

@section('content')
    <div class='col-md-11'>
        <div id='colorlib-main'>
            <aside id='colorlib-hero' class='js-fullheight'>
                <div class='flexslider js-fullheight'>
                    <ul class='slides'>
                        @foreach($threeNews as $singleNews)
                            <li style='background-image: url({{ asset('images/' . $singleNews->image) }});'>
                                <div class='overlay'></div>
                                <div class='container-fluid'>
                                    <div class='row'>
                                        <div class='col-md-12 col-xs-12 js-fullheight slider-text'>
                                            <div class='slider-text-inner'>
                                                <div class='desc'>
                                                    <h1>
                                                        <a href="/news/{{ $singleNews->id }}">{{ $singleNews->title }}</a>
                                                    </h1>
                                                    <p>{{ $singleNews->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>


            <div class='colorlib-blog'>
                <div class='container-wrap'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class='blog-entry animate-box'>
                                <div class='blog-img'
                                     style='background-image: url({{ asset('images/' . $randomNews1->image) }});'>
                                    <div class='desc text-center'>
                                        <h2 class='head-article' style='color: white'>{{ $randomNews1->title }}</h2>
                                        <p>
                                            <a href="/news/{{ $singleNews->id }}" class='btn btn-primary btn-outline'
                                               style='color: white; border: 2px solid white'>Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='blog-entry animate-box'>
                                        <div class='blog-img blog-img2'
                                             style='background-image: url({{ asset('images/' . $randomNews2->image) }});'>
                                            <div class='desc text-center'>
                                                <h2 class='head-article'>{{ $randomNews2->title }}</h2>
                                                <p>
                                                    <a href='/news/{{ $singleNews->id }}'
                                                       class='btn btn-primary btn-outline'
                                                       style='color: white; border: 2px solid white'>Read more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='blog-entry animate-box'>
                                        <div class='blog-img blog-img2'
                                             style='background-image: url({{ asset('images/' . $randomNews3->image) }});'>
                                            <div class='desc text-center'>
                                                <h2 class='head-article'>{{ $randomNews3->title }}</h2>
                                                <p>
                                                    <a href='/news/{{ $singleNews->id }}'
                                                       class='btn btn-primary btn-outline'
                                                       style='color: white; border: 2px solid white'>Read more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='blog-entry animate-box'>
                                        <div class='blog-img blog-img2'
                                             style='background-image: url({{ asset('images/' . $randomNews4->image) }});'>
                                            <div class='desc text-center'>
                                                <h2 class='head-article'>{{ $randomNews4->title }}</h2>
                                                <p>
                                                    <a href='/news/{{ $singleNews->id }}'
                                                       class='btn btn-primary btn-outline'
                                                       style='color: white; border: 2px solid white'>Read more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach($threeNews as $singleNews)
                            <div class='col-md-4'>
                                <div class='blog-entry animate-box'>
                                    <div class='blog-img'
                                         style='background-image: url({{ asset('/images/' . $singleNews->image) }});'>
                                        <div class='desc text-center'>
                                            <p class='tag'><span>{{ $singleNews->title }}</span></p>
                                            <p>
                                                <a href='/news/{{ $singleNews->id }}'
                                                   class='btn btn-primary btn-outline'
                                                   style='color: white; border: 2px solid white'>
                                                    Read more
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

