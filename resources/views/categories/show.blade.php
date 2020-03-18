@extends('layouts.main')

@section('content')
    <div id='colorlib-main'>
        <div class='colorlib-blog'>
            <div class='container-wrap'>
                <div class='col-md-9'>
                    <div class='content-wrap'>
                        <div class='row'>
                            <div class='col-md-12'>
                                @foreach($news as $one)
                                    <article class='blog-entry-travel animate-box fadeInUp animated'
                                             style='margin-top: 20px'>
                                        <div class='blog-img'
                                             style='background-image: url({{ asset('images/' . $one->image) }}); height: 300px'></div>
                                        <div class='desc' style='height: 300px;'>
                                            <p class='meta' style='width: 117px'>
                                                <span class='cat'>
{{--                                                    <i class='far fa-heart favorite-icon' style='font-size:24px'></i>--}}
                                                    <i onclick="myFunction(this)" class="far fa-heart favorite" style="color: #F65A41"></i>
                                                    {{ ucfirst($category->field) }}
                                                </span>
                                                <span class='date'>{{ $one->updated_at }}</span>
                                            </p>
                                            <h2><a href="/news/{{ $one->id }}">{{ $one->title }}</a></h2>
                                            <p>{{ $one->description }}</p>
                                            <p><a href="/news/{{ $one->id }}" class='btn btn-primary with-arrow'>Read
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
                        @foreach($recentNews as $one)
                            <div class='f-blog'>
                                <a href="{{ asset('news/' . $one->id) }}" class='blog-img'
                                   style='background-image: url({{ asset('images/' . $one->image) }});'>
                                </a>
                                <div class='desc'>
                                    <h3>
                                        <a href="{{ asset('news/' . $one->id) }}">Recent news</a>
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
                                <a href="{{ asset('news/' . $one->id) }}" class='instagram text-center'
                                   style='background-image: url({{ asset('images/' . $one->image) }}); width: 90px;
                                       height: 90px'></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $news ->links() }}
    </div>
@endsection


@section('script')
{{--    <script>--}}
{{--        $(".favorite-icon").click(function () {--}}
{{--            // alert(555);--}}
{{--            $(this).find(".favorite-icon").toggleClass("far fa-heart fas fa-heart");--}}
{{--        });--}}
{{--    </script>--}}

<script>
    function myFunction(x) {
        x.classList.toggle("fas");
    }

    $('.favorite').on('click', function () {
        setCookie('id', 5);
    });
</script>
@endsection

