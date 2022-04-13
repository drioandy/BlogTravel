@extends('client.layouts.index')
@section('content')


    <div class="container">
        <div class=" my-10 min-h-screen	 ">


            <div class="row ">
                <div class="col-md-4 mb-3">
                    <div class="card-body box-profile border border-gray-300 rounded">
                        <div class="text-center flex justify-content-center">
                            <img class="profile-user-img img-fluid img-circle w-50"
                                 src="{{asset('/storage/image/users/avatar/'.Auth::user()->avatar)}}"
                                 alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{Auth::user()->user_name}}</h3>

                        <p class="text-muted text-center">{{Auth::user()->email}}</p>

                    </div>

                </div>
                <div class="col-md-8">
                    @if(session()->has('message'))
                        <div class="  rounded text-success text-center mb-3 p-3 " role="alert" style="background-color: #d4edda">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>

                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->user_name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date Of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->dob}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{Auth::user()->gender == 'male' ? 'Male' : 'Female'}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " href="{{route('profile.edit',Auth::user()->url_key)}}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
