@extends('client.layouts.index')
@section('content')

    <div class="container min-vh-100 mt-12">

        <div class="row">
            <div class="col-12">


                @if(session()->has('message'))
                    <div class="  rounded text-success text-center mb-3 p-3 " role="alert"
                         style="background-color: #d4edda">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form method="POST" action="{{route('post.update',$post->url_key)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">

                                    <!-- radio -->
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <div class="form-group">
                                            <input type="file"
                                                   class="form-control-file border p-1 rounded"
                                                   name="thumbnail"
                                                   id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Publish</label>
                                        <select class="form-control" name="is_publish" >
                                            <option value="0" {{$post->is_publish == 0 ? 'selected' : ''}}>Draft</option>
                                            <option value="1" {{$post->is_publish == 1 ? 'selected' : ''}}>Private</option>
                                            <option value="2" {{$post->is_publish == 2 ? 'selected' : ''}}>Publish</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label class="text-dark ">Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror""  value="{{$post->title}}" placeholder="Post Title">
                                        @error('title')
                                        <span class="text-danger " role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"{{$post->category->id == $category->id ? 'selected' : ''}} >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" rows="4"
                                                  placeholder="Short Description">{{$post->short_description}}</textarea>
                                        @error('short_description')
                                        <span class="text-danger " role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea id="content" class="form-control @error('content') is-invalid  @enderror" name="content" rows="10"
                                                  placeholder="Content">{{$post->content}}</textarea>
                                        @error('content')
                                        <span class="text-danger " role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id"
                                               class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-24">
                        <button type="submit" class="btn btn-primary mr-2">Create</button>
                        <a href="{{route('home')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>




    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
