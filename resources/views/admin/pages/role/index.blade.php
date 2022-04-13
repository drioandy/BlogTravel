@extends('admin.layouts.index')
@section('title','Role List')
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
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">
                                <a href="{{route('role.create')}}" class="btn btn-primary">Add New</a>
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($roles)>0)
                            @foreach($roles as $key => $role)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->description}}</td>
                                    <td>
                                        <div class="text-center d-flex justify-content-center">
                                            <a href="{{route('role.edit',$role->id)}}"  class="text-primary"><i class="fas fa-edit"></i></a>
                                            <form action="{{route('role.delete',$role->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="text-danger bg-transparent border-0"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="4">List doesn't have role</td>
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
