@extends('admin.layouts.index')
@section('title','Category List')
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
                            <form action="{{route('category.index')}}">

                                <div class="input-group input-group-sm ">
                                    <input type="text" name="keyword" class="form-control float-right"
                                           placeholder="Search By Name">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        @if($categories->total()	> $categories->perPage())
                            {{$categories->links()}}
                        @endif
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">

                    <table class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">
                                <a href="{{route('category.create')}}" class="btn btn-primary">Add New</a>
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($categories)>0)
                            @foreach($categories as $key => $cates)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$cates->name}}</td>
                                    <td>{{$cates->description}}</td>
                                    <td>
                                        <div
                                            class="text-center d-flex justify-content-center ">
                                            <a href="{{route('category.edit', $cates->url_key)}}"
                                               class="text-primary"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('category.delete',$cates->url_key) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                        class="text-danger bg-transparent border-0 js-delete-button"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>

                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="4">List doesn't have category</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
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
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Category has been deleted.',
                        'success'
                    ).then(() => {
                        form.submit();
                    })
                }
            })
        });

    </script>

@endsection
