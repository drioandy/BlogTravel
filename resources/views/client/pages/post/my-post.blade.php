@extends('client.layouts.index')
@section('content')
    <div class="container">

        <div class="min-h-screen   py-20">
            <div class="container mx-auto px-12   rounded-xl">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('post.draft') ? 'active' : '' }}"
                           href="{{route('post.draft',Auth::user()->url_key)}}">My Draft Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('post.private') ? 'active' : '' }}"
                           href="{{route('post.private',Auth::user()->url_key)}}">My Private Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('post.publish') ? 'active' : '' }}"
                           href="{{route('post.publish',Auth::user()->url_key)}}">My Publish Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('post.isReject') ? 'active' : '' }}"
                           href="{{route('post.isReject',Auth::user()->url_key)}}">My Reject Posts</a>
                    </li>

                </ul>
                <h1 class="text-4xl uppercase font-bold from-current mb-8">My {{$title}}</h1>
                <!-- Box-1 -->
                <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-4 space-y-4 sm:space-y-0">
                    @if(count($posts) > 0 )
                        @foreach($posts as $post)
                            <div class="">
                                <div>
                                    <div
                                        class="shadow-lg hover:shadow-xl transform transition duration-500 hover:scale-105">
                                        <div>
                                            <a href="{{route('post.edit',$post->url_key)}}">
                                                <img class="w-full object-cover object-center rounded-lg  h-64"
                                                     src="{{asset($post->thumbnail)}}"/>
                                            </a>
                                            <div class="px-4 py-2">
                                                <a href="{{route('post.edit',$post->url_key)}}"
                                                   class="text-2xl text-gray-800 font-bold hover:no-underline hover:text-black tracking-tighter overflow-ellipsis overflow-hidden "
                                                   style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
                                                    {{$post->title}}
                                                </a>
                                                <div class="flex space-x-2 mt-2">

                                                    <div
                                                        class="text-lg text-gray-600 font-semibold mb-2">{{$post->category->name}}</div>
                                                </div>
                                                <p class="w-full mb-3 text-2xl leading-relaxed text-left text-blueGray-600 overflow-ellipsis overflow-hidden "
                                                   style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
                                                    {{$post->short_description}}</p>
                                                <div class="status">Status: <span
                                                        class="font-semibold">
                                                        @if($post->is_publish == 0 )
                                                            Draft
                                                        @elseif($post->is_publish == 1 )
                                                            Private
                                                        @elseif($post->is_publish == 2 && $post->status == 0 && !$post->deleted_at)
                                                            Waiting
                                                        @elseif($post->is_publish == 2 && $post->status == 1 && !$post->deleted_at)
                                                            Publish
                                                        @elseif($post->deleted_at)
                                                            Reject
                                                        @endif
                                                    </span>
                                                </div>
                                                <a href="{{route('post.edit',$post->url_key)}}"
                                                   class="block font-bold text-gray-100 mt-12 w-full no-underline hover:no-underline text-center bg-blue-500 py-2 rounded-lg">Read
                                                    more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div>
                            Not Found  Post! Do you want create now? <a href="{{route('post.new')}}">Create new post</a>
                        </div>
                    @endif
                </div>
                {{$posts->links('vendor.pagination.home-pagination')}}
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
@endsection
