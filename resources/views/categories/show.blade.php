@extends('layouts.main')

@section('content')
    <div id='colorlib-main'>
        <div class='colorlib-blog'>
            <div class='container-wrap'>
                <div class='col-md-9'>
                    <div class='content-wrap'>
                        <div class='row'>
                            <div class='col-md-12'>
                                @foreach($category->news as $someNews)
                                    <article class='blog-entry-travel animate-box fadeInUp animated' style='margin-top: 20px'>
                                        <div class='blog-img' style='background-image: url({{ asset('images/' . $someNews->image) }}); height: 300px'></div>
                                        <div class='desc' style='height: 300px;'>
                                            <p class='meta' style='width: 117px'>
                                                <span class='cat'>{{ ucfirst($category->field) }}</span>
                                                <span class='date'>{{ $someNews->updated_at }}</span>
                                            </p>
                                            <h2><a href="/news/{{ $someNews->id }}">{{ $someNews->title }}</a></h2>
                                            <p>{{ $someNews->description }}</p>
                                            <p><a href="/news/{{ $someNews->id }}" class='btn btn-primary with-arrow'>Read
                                                    More <i class='icon-arrow-right22'></i></a></p>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class='col-md-3'>
                    {{--  Recent news--}}
                    <div class='side animate-box' style='margin-top: 20px'>
                        @foreach($recentNews as $news)
                            <div class='f-blog'>
                                <a href="{{ asset('news/' . $news->id) }}" class='blog-img'
                                   style='background-image: url({{ asset('images/' . $news->image) }});'>
                                </a>
                                <div class='desc'>
                                    <h3>
                                        <a href="{{ asset('news/' . $news->id) }}">Recent news</a>
                                    </h3>
                                    <p class='admin'><span>25 March 2018</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{--Images--}}
                    <div class='side animate-box'>
                        <h2 class='sidebar-heading'>Images</h2>
                        <div class='instagram-entry'>
                            @foreach($tenNews as $one)
                                <a href="{{ asset('news/' . $one->id) }}" class='instagram text-center' style='background-image: url({{ asset('images/' . $one->image) }}); width: 90px;
                                       height: 90px'></a>
                            @endforeach
                        </div>
                    </div>
                </div>

{{--                <div class="container">--}}
{{--                    @foreach ($news as $user)--}}
{{--                        {{ $user->title }}--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--                <div class='row'>--}}
{{--                    <div class='col-md-2 mt-5 m-auto text-center'>--}}

{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        {{ $tenNews->links() }}
    </div>
@endsection

