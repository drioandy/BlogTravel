@extends('admin.layouts.index')
@section('title','Posts')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header  ">
                <div class="d-flex justify-content-between">
                    <div class="card-tools">

                        <div class="input-group input-group-sm ">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <ul class="pagination pagination-sm float-left">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
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
                            <th>Short Decscription</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>User</th>
                            <th class="text-center">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($post) > 0)
                        @foreach($post as $key => $posts)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td class="text-center"><img style="width: 170px; height: 100px; object-fit:cover;" src="{{asset($posts -> thumbnail)}}" alt=""></td>
                            <td>{{$posts->title}}</td>
                            <td>{{$posts->short_description}}</td>
                            <td>{!!$posts->content!!}</td>
                            <td>{{$posts->status == 0 ?  'Approved' : 'Waiting'}}</td>
                            <td>{{$posts->user}}</td>
                            <td class="text-center">
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
                                                <iframe src="{{route('post.detail',$post->url_key)}}" width="100%" height="500px" title="W3Schools Free Online Web Tutorials"></iframe>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <a href="{{route('post.changeStatus', $posts->id)}}"  class="text-primary"><i class="far fa-check-circle"></i></a>
                                <form action="{{ route('post.destroy',$posts->url_key) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-danger bg-transparent border-0"><i class="fas fa-ban"></i></i></button>
                                </form>
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


@endsection
