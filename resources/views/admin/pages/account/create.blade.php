@extends('admin.layouts.index')
@section('title',$title)
@section('content')

    @if(session()->has('message'))
        <div class="  rounded text-success text-center mb-3 p-3 " role="alert" style="background-color: #d4edda">
            {{ session()->get('message') }}
        </div>
    @endif



    <div class="row flex-lg-nowrap ">
        <div class="col mb-3 ">
            <div class="card rounded border-0 shadow">
                <div class="card-body">
                    <form action="{{$url == 'account' ? route('account.store') : route('account.user.store')}}"
                          class="form" method="post" enctype="multipart/form-data">

                        <div class="e-profile">
                            <div class="row">

                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <div class="mt-2">
                                            <label for="upload-photo" class="btn btn-primary btn-sm" type="file">
                                                <i class="fa fa-fw fa-camera"></i>
                                                <span>Upload Photo</span>
                                            </label>
                                            <input type="file" name="avatar" id="upload-photo"
                                                   style="opacity: 0;position: absolute;z-index: -1;"/>

                                        </div>
                                    </div>
                                    <div class="text-center text-sm-right">
                                        <span class="badge badge-secondary"></span>
                                        {{--                                    <div class="text-muted"><small>Created At: {{Carbon\Carbon::parse(Auth::user()->created_at)->format('d/m/Y')}}</small>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content pt-2">
                            <div class="tab-pane active">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input class="form-control @error('user_name') is-invalid @enderror"
                                                   type="text" name="user_name"
                                                   placeholder="User Name" value="{{ old('user_name') }}"
                                                   autocomplete="name">
                                            @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                                   name="email"
                                                   placeholder="Enter Email" value="{{ old('email') }}"
                                                   autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control @error('password') is-invalid
                                                   @enderror" type="password" name="password"
                                                   placeholder="Enter Password" autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" id="password-confirm"
                                                   placeholder="Enter Confirm Password" name="password_confirmation"
                                                   autocomplete="new-password">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col ">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="form-control ">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="male" value="male">
                                                    <label class="form-check-label" for="male">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="female" value="female">
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <input class="form-control" type="date" name="dob"
                                            >
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-primary btn-sm" type="submit">Create</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
