@extends('admin.layouts.index')
@section('title','Edit Role')
@section('content')
    <div class="row">
        <div class="col-12">
            @if(session()->has('message'))
                <div class="  rounded text-success text-center mb-3 p-3 " role="alert" style="background-color: #d4edda">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="  rounded text-danger text-center mb-3 p-3 " role="alert" style="background-color: #d4edda">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="card ">

                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{route('role.update',$role->id)}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <!-- text input -->
                                <div class="form-group">
                                    <label class="text-dark">Role Name</label>
                                    <input type="text" name="name" value="{{$role->name}}" class="form-control" placeholder="Enter Role Name">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3"
                                              placeholder="Enter Role Description">{{$role->description}}</textarea>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Add New</button>
                        <a href="{{route('role.index')}}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
