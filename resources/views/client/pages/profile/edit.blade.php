@extends('client.layouts.index')
@section('content')
    <div class="container">
        <div class=" mt-10 my-10 min-h-screen">
            <form action="{{route('profile.update',Auth::user()->url_key)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card-body box-profile border border-gray-300 rounded">
                            <div class="text-center flex justify-content-center">
                                <img class="profile-user-img img-fluid img-circle w-50"
                                     src="{{asset('/storage/image/users/avatar/'.Auth::user()->avatar)}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{Auth::user()->user_name}}</h3>

                            <p class="text-muted text-center">{{Auth::user()->email}}</p>

                            {{--                        <ul class="list-group list-group-unbordered mb-3">--}}
                            {{--                            <li class="list-group-item">--}}
                            {{--                                <b>Followers</b> <a class="float-right">1,322</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="list-group-item">--}}
                            {{--                                <b>Following</b> <a class="float-right">543</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="list-group-item">--}}
                            {{--                                <b>Friends</b> <a class="float-right">13,287</a>--}}
                            {{--                            </li>--}}
                            {{--                        </ul>--}}
                            <label
                                class="w-full flex flex-col items-center px-4 py-3 bg-blue-500 rounded-md shadow-md tracking-wide uppercase border border-blue
                                cursor-pointer hover:bg-blue-600 font-bold hover:text-white text-gray-100 ease-linear transition-all duration-150 ">
                                <span class="mt-2 text-base leading-normal">Select a file</span>
                                <input type="file" name="avatar" class="hidden"/>
                            </label>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="user_name" class="form-control @error('user_name') is-valid @enderror"
                                               value="{{Auth::user()->user_name}}">
                                        @error('user_name')
                                        <span class="text-danger " role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control"
                                               value="{{Auth::user()->email}}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date Of Birth</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="date" name="dob" class="form-control"
                                               value="{{Auth::user()->dob}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="custom-select form-control" name="gender">
                                            <option>Choose...</option>
                                            <option value="1" {{Auth::user()->gender == 'male' ? 'selected': ''}}>Male
                                            </option>
                                            <option value="2" {{Auth::user()->gender == 'female' ? 'selected': ''}}>
                                                Female
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary ">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                        <a href="{{route('profile',Auth::user()->url_key)}}"
                                           class="btn btn-danger px-4">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <br><br><br><br><br>
@endsection
