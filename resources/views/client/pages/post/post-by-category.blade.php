@extends('client.layouts.index')
@section('content')
    <div class="overflow-x-hidden bg-gray-100">


        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            @if(isset($category))
                                {{$category->name}}
                            @else
                                Posts
                            @endif
                        </h1>
                        {{--                        <div>--}}
                        {{--                            <select--}}
                        {{--                                class="border border-white bg-white px-4 py-3 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">--}}
                        {{--                                <option>Latest</option>--}}
                        {{--                                <option>Last Week</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}
                    </div>
                    @if($posts->total() != 0  )
                        @foreach($posts as $key=> $post)
                            <div class="@if($key != 0) mt-6 @endif ">
                                <div class=" px-10 py-6  mx-auto bg-white rounded-lg shadow-md">
                                    <div class="flex gap-4">
                                        <div class="  w-64 flex-shrink-0	">
                                            <a href="{{route('post.detail',$post->url_key)}}"><img
                                                    class="object-cover object-center rounded-lg w-64 h-64 "
                                                    alt="blog-thumbnail"
                                                    src="{{asset($post->thumbnail)}}"
                                                    style="width:160px;height:160px"></a>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex items-center justify-between">
                                                <div
                                                    class="font-light text-gray-600">{{$post->updated_at}}</div>
                                                <div>
                                                    <a href="{{route('post.category',$post->category->url_key)}}"
                                                       class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:text-white hover:no-underline hover:bg-gray-500">
                                                        {{$post->category->name}}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <a href="{{route('post.detail',$post->url_key)}}"
                                                   class="text-3xl font-bold text-gray-700 hover:text-gray-800 hover:no-underline overflow-ellipsis overflow-hidden "
                                                   style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
                                                    {{$post->title}}
                                                </a>
                                                <p class="mt-2 text-gray-600 overflow-ellipsis overflow-hidden "
                                                   style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$post->short_description}}</p>
                                            </div>
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
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-8">
                            {{$posts->links('vendor.pagination.category-posts')}}
                        </div>
                    @else
                        <div>
                            @if(isset($category))
                                Doesn't Have Any Post In {{$category->name}}
                            @else
                                Doesn't Have Any Post
                            @endif
                        </div>
                    @endif
                </div>
                <div class=" w-4/12 -mx-8 lg:block px-8">
                    <div class="px-8 ">
                        <h1 class="mb-4 text-xl font-bold text-gray-700 md:text-2xl">Categories</h1>
                        <div class="flex flex-col max-w-sm px-4 py-6  bg-white rounded-lg shadow-md">
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('post.category',$category->url_key)}}"
                                           class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                            {{$category->name}}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
