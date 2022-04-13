@extends('client.layouts.index')
@section('content')
<div class="container min-vh-100">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-secondary">@yield('title')</h3>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>

            @if(session()->has('message'))
            <div class="  rounded text-success text-center mb-3 p-3 " role="alert" style="background-color: #d4edda">
                {{ session()->get('message') }}
            </div>
            @endif
            <form method="POST" action="{{route('post-store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-sm">
                                <!-- text input -->
                                <div class="form-group">
                                    <label class="text-dark">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="form-control" name="short_description" rows="4" placeholder="Short Description"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="editor" class="form-control" name="content" rows="10" placeholder="Content"></textarea>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="col-4">


                        <div class="row">

                            <div class="col-sm">
                                <!-- radio -->
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <div class="row mb-3">
                                        <div class="col text-center ">

                                            <img src="" class=" w-50 img-thumbnail img-fluid" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <input type="file" class="form-control-file border p-1 rounded" name="thumbnail" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm">
                                <!-- radio -->

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($category as $cate)

                                        <option value="{{$cate -> id}}">
                                            {{$cate -> name}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mr-2">Create</button>
                    <a href="{{route('homee')}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
</div>
</div>




<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
