@extends('admin.layouts.index')
@section('title','Create Category')
@section('content')
<div class="row">
    <div class="col-12">
        @if(session()->has('message'))
            <div class="  rounded text-success text-center mb-3 p-3 " role="alert" style="background-color: #d4edda">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card ">

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="text-dark">Category Name</label>
                                <input type="text" name="name" autocomplete="name" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror" placeholder="Enter Category Name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control @error('name') is-invalid @enderror" name="description" autocomplete="description"  rows="3" placeholder="Enter Description">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Add New</button>
                    <a href="{{route('category.index')}}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
