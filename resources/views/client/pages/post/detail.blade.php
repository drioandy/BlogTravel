@extends('client.layouts.index')
@section('content')

    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article class="border rounded mb-3">
                    <figure class="mb-4 w-full"><img class="img-fluid  w-full object-cover  " style="height: 350px"
                                                     src="{{asset($post -> thumbnail)}}" alt="..."/></figure>

                    <!-- Post header-->
                    <header class="mb-4 px-10">

                        <!-- Post title-->
                        <h1 class="text-5xl font-semibold mb-8">{{$post -> title}}</h1>
                        <!-- Post meta content-->
                        <div class="flex justify-between">
                            <div class="text-muted fst-italic mb-2">Posted
                                on {{Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}
                                by {{$post -> user->user_name}}</div>
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

                        <!-- Post categories-->
                        Category: <a href="">{{$post -> category -> name}} </a>

                    </header>
                    <!-- Preview image figure-->
                    <!-- Post content-->
                    <section class="mb-5 px-10">
                        {!! $post -> content !!}

                    </section>
                </article>

                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4" action="{{route('comment.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <textarea class="form-control" rows="3" name="content"
                                          placeholder="Join the discussion and leave a comment!"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Comment</button>
                            </form>

                        @include('client.pages.comment.display',['comments' => $post->comments, 'post_id' => $post->id])
                        <!-- Comment with nested comments-->
{{--                            <div class="d-flex gap-4 mb-4">--}}
{{--                                <!-- Parent comment-->--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <img class="rounded-circle"--}}
{{--                                         src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"--}}
{{--                                         alt="..."/></div>--}}
{{--                                <div class="ms-3">--}}
{{--                                    <div class="fw-bold">Commenter Name</div>--}}
{{--                                    If you're going to lead a space frontier, it has to be government; it'll never be--}}
{{--                                    private enterprise. Because the space frontier is dangerous, and it's expensive, and--}}
{{--                                    it has unquantified risks.--}}
{{--                                    <form method="post" class="mt-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" name="content" class="form-control"/>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="submit" class="btn btn-primary btn-sm" value="Reply"/>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                    <!-- Child comment 1-->--}}
{{--                                    <div class="d-flex gap-4 mt-4">--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <img class="rounded-circle"--}}
{{--                                                 src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"--}}
{{--                                                 alt="..."/></div>--}}
{{--                                        <div class="ms-3">--}}
{{--                                            <div class="fw-bold">Commenter Name</div>--}}
{{--                                            And under those conditions, you cannot establish a capital-market evaluation--}}
{{--                                            of that enterprise. You can't get investors.--}}
{{--                                            <form method="post" class="mt-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="text" name="content" class="form-control"/>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="submit" class="btn btn-primary btn-sm" value="Reply"/>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <!-- Child comment 2-->--}}
{{--                                    <div class="d-flex gap-4 mt-4">--}}
{{--                                        <div class="flex-shrink-0"><img class="rounded-circle"--}}
{{--                                                                        src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"--}}
{{--                                                                        alt="..."/></div>--}}
{{--                                        <div class="ms-3">--}}
{{--                                            <div class="fw-bold">Commenter Name</div>--}}
{{--                                            When you put money directly to a problem, it makes a good headline.--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- Single comment-->
{{--                            <div class="d-flex">--}}
{{--                                <div class="flex-shrink-0"><img class="rounded-circle"--}}
{{--                                                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"--}}
{{--                                                                alt="..."/></div>--}}
{{--                                <div class="ms-3">--}}
{{--                                    <div class="fw-bold">Commenter Name</div>--}}
{{--                                    When I look at the universe and all the ways the universe wants to kill us, I find--}}
{{--                                    it hard to reconcile that with statements of beneficence.--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active font-weight-bold  disabled">
                        Category
                    </a>
                    @foreach($categories as $category)
                        <a href="{{route('post.category',$category->url_key)}}"
                           class="list-group-item list-group-item-action">{{$category->name}}</a>


                    @endforeach
                </div>
                <!-- Side widget-->
                @if(count($relatedPost) > 0 )
                    <div class="card mb-4 border border-gray-300 rounded">
                        <div class="card-header">Related Posts
                            <a href="{{route('post.category',$post->category->url_key)}}" class="float-right ">Read
                                More</a>
                        </div>
                        <div class="card-body">
                            @foreach($relatedPost as $post)
                                <div class="card mb-4">
                                    <a href="{{route('post.detail',$post->url_key)}}"><img class="card-img-top"
                                                                                           src="{{asset($post->thumbnail)}}"
                                                                                           alt="..."/></a>
                                    <div class="card-body">
                                        <div
                                            class="small text-muted">{{Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</div>
                                        <h2 class="card-title h4">{{$post->title}}</h2>
                                        <p class="card-text overflow-ellipsis overflow-hidden "
                                           style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$post->short_description}}</p>

                                        <div class="flex items-center justify-between mt-4">
                                            <a href="{{route('post.detail',$post->url_key)}}"
                                               class="flex items-center px-6 py-2 mt-auto font-semibold text-white transition hover:no-underline duration-500 ease-in-out transform bg-blue-500 rounded-lg hover:bg-blue-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                                Read more
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
                            {{--                        <div class="card mb-4">--}}
                            {{--                            <a href="#!"><img class="card-img-top"--}}
                            {{--                                              src="https://images.unsplash.com/photo-1611465577672-8fc7be1dc826?ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDQ4fDZzTVZqVExTa2VRfHxlbnwwfHx8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"--}}
                            {{--                                              alt="..."/></a>--}}
                            {{--                            <div class="card-body">--}}
                            {{--                                <div class="small text-muted">January 1, 2021</div>--}}
                            {{--                                <h2 class="card-title h4">Post Title</h2>--}}
                            {{--                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
                            {{--                                    Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>--}}
                            {{--                                <a class="btn btn-primary" href="#!">Read more →</a>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}


                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- Footer-->
@endsection
