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
                    <form action="{{$url == 'account' ? route('account.update',$account->url_key): route('account.user.update',$account->url_key) }}" class="form" method="post" enctype="multipart/form-data">

                        <div class="e-profile">
                            <div class="row">
                                <div class="col-12 col-sm-auto mb-3 ">
                                    <div class="mx-auto border rounded" style="width: 140px;height: 140px">
                                        <img src="{{asset($account->avatar)}}" alt=""
                                             style="width:100%;height: 100%">
                                    </div>
                                </div>
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        {{--                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{Auth::user()->name}}</h4>--}}
                                        {{--                                    <p class="mb-0">{{Auth::user()->email}}</p>--}}
                                        {{--                                    <div class="text-muted"><small>Last seen 2 hours ago</small></div>--}}
                                        <div class="mt-2">
                                            <label for="upload-photo" class="btn btn-primary btn-sm" type="file">
                                                <i class="fa fa-fw fa-camera"></i>
                                                <span>Change Photo</span>
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
                                            <input class="form-control  @error('user_name') is-invalid @enderror" value="{{$account->user_name}}" type="text"
                                                   name="user_name"
                                                   placeholder="User Name" autocomplete="name">
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
                                            <input class="form-control @error('email') is-invalid @enderror"  autocomplete="email" value="{{$account->email}}" type="text"
                                                   name="email"
                                                   placeholder="Enter Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
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
                                                           id="man"
                                                           value="male" {{$account->gender == 'male' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="man">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="woman"
                                                           value="female" {{$account->gender == 'female' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="woman">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <input class="form-control" value="{{$account->dob}}" type="date" name="dob"
                                            >
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
