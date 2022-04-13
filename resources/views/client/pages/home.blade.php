@extends('client.layouts.index')
@section('content')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5 pt-5">
                <h1 class="fw-bolder">Welcome to Camping review website</h1>
                <p class="lead mb-0">Immersed in nature</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">

            <!-- Blog entries-->
            <div class="col-lg-9">

                <!-- Featured blog post-->
                <div id="carouselExampleControls" class="carousel slide mb-20" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                 src="https://images.unsplash.com/photo-1529385101576-4e03aae38ffc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                                 alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                 src="https://images.unsplash.com/photo-1598661106961-2aa02fa47979?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                 alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                 src="https://images.unsplash.com/photo-1529385101576-4e03aae38ffc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                                 alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @if(count($latestPost) > 0)
                <!-- Nested row for non-featured blog posts-->
                    <div class="border-b border-gray-300 mt-16 ">
                        <div class=" border-l-4 py-1 px-8 text-5xl uppercase my-8 font-semibold border-blue-500 ">
                            Lastest Post
                        </div>

                        <div class="row">
                            @foreach ($latestPost as $post )

                                <div class="col-lg-6 mt-10 pb-12">

                                    <!-- Blog post-->
                                    <div class="card border border-gray-300 rounded">
                                        <a href="{{ route('post.detail',$post->url_key) }}"><img
                                                style="width:100%; height:280px; object-fit: cover" class="card-img-top"
                                                src="{{asset($post -> thumbnail)}}" alt="..."/></a>
                                        <div class="card-body">
                                            <div
                                                class="text-5xl font-bold mt-2 mb-3 whitespace-nowrap overflow-hidden overflow-ellipsis">
                                                <a href="{{ route('post.detail',$post->url_key) }}"
                                                   class="text-gray-800 font-bold hover:no-underline hover:text-black tracking-tighter">{{$post->title}}</a>
                                            </div>
                                            <div
                                                class="small text-muted mb-3">{{Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}
                                                by {{$post->user->user_name}}</div>

                                            <div class="mb-3"
                                                 style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical; overflow: hidden;">{{$post->short_description}}</div>
                                            <div class="flex justify-between items-center">
                                                <a class="btn btn-primary "
                                                   href="{{ route('post.detail',$post->url_key) }}">Read more</a>
                                                @if(Auth::check())
                                                    @if(($post->bookmark))
                                                        <a href="{{ route('post.mark',$post->url_key) }}"
                                                           class="text-3xl"><i
                                                                class="fas fa-bookmark"></i></a>
                                                    @else
                                                        <a href="{{ route('post.mark',$post->url_key) }}"
                                                           class="text-3xl"><i
                                                                class="far fa-bookmark"></i></a>
                                                    @endif
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
            @endif

            <!-- <div class="col-lg-6">
                        </div> -->

                <div class="text-gray-700 bg-white   rounded ">
                    @foreach ($posts as $post )



                        <div class=" flex flex-row  items-start gap-8  mx-auto py-4 border-b border-gray-300">
                            <div class="  w-64 flex-shrink-0	">
                                <a href="{{route('post.detail',$post->url_key)}}"><img
                                        class="object-cover object-center rounded-lg w-64 h-64 "
                                        alt="blog-thumbnail"
                                        src="{{asset($post->thumbnail)}}" style="width:160px;height:160px"></a>
                            </div>
                            <div class="flex flex-col mt-0 items-start  text-left w-9/12">
                                <div
                                    class="w-full mb-2  mt-0 title-font whitespace-nowrap overflow-hidden overflow-ellipsis">
                                    <a href="{{route('post.detail',$post->url_key)}}"
                                       class="text-4xl text-gray-800 font-bold hover:no-underline hover:text-black tracking-tighter  ">
                                        {{$post->title}}
                                    </a>
                                </div>
                                <p class=" w-full mb-3 text-2xl leading-relaxed text-left text-blueGray-600 overflow-ellipsis overflow-hidden "
                                   style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
                                    {{$post->short_description}}
                                </p>
                                <div class="mb-3 flex gap-4 items-center">
                                    <div>
                                        <a href=""><img
                                                src="{{$post->user->avatar}}"
                                                class="rounded-full w-12 h-12"
                                                alt=""></a>
                                    </div>
                                    <div>
                                        <a href="" class="text-3xl">{{$post->user->user_name}}</a>
                                    </div>
                                </div>
                                <div class="flex w-full items-center justify-between ">
                                    <a href="{{route('post.detail',$post->url_key)}}"
                                       class="flex items-center px-6 py-2 mt-auto font-semibold text-white transition hover:no-underline duration-500 ease-in-out transform bg-blue-500 rounded-lg hover:bg-blue-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                        Read More
                                    </a>
                                    @if(Auth::check())
                                        @if(($post->bookmark))
                                            <a href="{{ route('post.mark',$post->url_key) }}"
                                               class="text-3xl"><i
                                                    class="fas fa-bookmark"></i></a>
                                        @else
                                            <a href="{{ route('post.mark',$post->url_key) }}"
                                               class="text-3xl"><i
                                                    class="far fa-bookmark"></i></a>
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>
                @endforeach
                <!--
                <div class=" flex flex-row  items-start gap-8  mx-auto py-4">
                    <div class="w-full lg:w-1/3 lg:max-w-lg md:w-1/2">
                        <img class="object-cover object-center rounded-lg " alt="hero" src="https://dummyimage.com/720x600/F3F4F7/8693ac">
                    </div>
                    <div class="flex flex-col items-start  text-left ">
                        <h1 class="mb-8 text-4xl font-black tracking-tighter text-black mt-0 title-font"> Medium length display headline. </h1>
                        <p class="mb-8 text-2xl leading-relaxed text-left text-blueGray-600 "> Deploy your mvp in minutes, not days. WT offers you a a wide selection swapable sections for your landing page. </p>
                        <div class="flex flex-col justify-end ">
                            <button class="flex items-center px-6 py-2 mt-auto font-semibold text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-lg hover:bg-blue-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"> Show me </button>

                        </div>
                    </div>

                </div> -->
                </div>
                <!-- Pagination-->
                {{$posts->links('vendor.pagination.home-pagination')}}
                {{--                <nav aria-label="Pagination">--}}
                {{--                    <hr class="my-0"/>--}}
                {{--                    <ul class="pagination justify-content-center my-4">--}}
                {{--                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>--}}
                {{--                        </li>--}}
                {{--                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#!">2</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#!">3</a></li>--}}
                {{--                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#!">15</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>--}}
                {{--                    </ul>--}}
                {{--                </nav>--}}

            </div>
            <!-- Side widgets-->
            @include('client.layouts.right_aside')
        </div>

    </div>
    </div>
@endsection
