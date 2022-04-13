@extends('admin.layouts.index')
@section('title','Posts Approve')
@section('content')
    @if(session()->has('message'))
        <div class="  rounded text-success text-center mb-3 p-3 " role="alert" style="background-color: #d4edda">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  ">
                    <div class="d-flex justify-content-between">
                        <div class="card-tools">

                            <form action="{{route('post.approve')}}">

                                <div class="input-group input-group-sm ">
                                    <input type="text" name="keyword" class="form-control float-right"
                                           placeholder="Search By Title">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if($posts->total()	> $posts->perPage())
                            {{$posts->links()}}
                        @endif
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <div class="table-responsive p-0">

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>
                                    <div class="text-center">Status</div>
                                </th>
                                <th>
                                    <div class="text-center">User Name</div>
                                </th>
                                <th>
                                    <div class="text-center">Category</div>
                                </th>
                                <th class="text-center">
                                    Action
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(count($posts) > 0)
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td class="text-center" style=" width:100px"><img
                                                style="width: 70px; height: 70px; object-fit:cover;"
                                                src="{{asset($post -> thumbnail)}}" alt=""></td>
                                        <td style=" width:150px">
                                            <div style=" width:150px">{{$post->title}}</div>
                                        </td>
                                        <td style=" width:150px">
                                            <div style=" width:180px">
                                                {{$post->short_description}}
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="text-center">{{$post->status == 1 ?  'Approved' : 'Waiting'}}</div>
                                        </td>
                                        <td>
                                            <div class="text-center">{{$post->user->user_name}}</div>
                                        </td>
                                        <td>
                                            <div class="text-center">{{$post->category->name}}</div>
                                        </td>
                                        <td>
                                            <div class="text-center d-flex justify-content-center align-items-center">
                                                <button data-target="#modal-xl-{{$post->id}}" data-toggle="modal"
                                                   class="text-info mr-2 border-0 bg-transparent"><i class="far fa-dot-circle"></i></button>
                                                <div class="modal fade" id="modal-xl-{{$post->id}}" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{$post->title}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe src="{{route('post.view',$post->url_key)}}" width="100%" height="500px" title="{{$post->title}}"></iframe>
                                                            </div>
                                                            <div class="modal-footer justify-content-end">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <form action="{{ route('post.delete',$post->url_key) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="text-danger bg-transparent border-0 js-delete-button">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="8">List doesn't have posts</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
            integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>

        $('.js-delete-button').click(function (e) {
            var form = $(this).closest("form");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Post has been deleted.',
                        'success'
                    ).then(() => {
                        form.submit();
                    })
                }
            })
        });

    </script>

@endsection
