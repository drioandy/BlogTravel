@extends('admin.layouts.index')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  ">
                    <div class="d-flex justify-content-between">
                        <div class="card-tools">

                            <form action="{{$url == 'account' ? route('account.index'):route('account.user.index')}}">

                                <div class="input-group input-group-sm ">
                                    <input type="text" name="keyword" class="form-control float-right"
                                           placeholder="Search By Email">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if($accounts->total()	> $accounts->perPage())
                            {{$accounts->links()}}
                        @endif
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>
                                <div class="text-center">Avatar</div>
                            </th>
                            <th>
                                <div class="text-center">Gender</div>
                            </th>
                            <th>
                                <div class="text-center">Date Of Birth</div>
                            </th>
                            <th class="text-center">
                                <a href="{{$url == 'account' ? route('account.create'):route('account.user.create')}}"
                                   class="btn btn-primary">Add New</a>
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($accounts)>0)
                            @foreach($accounts as $key => $account)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$account->user_name}}</td>
                                    <td>{{$account->email}}</td>
                                    <td class="text-center" style=" width:100px">
                                        <img class="rounded-circle"
                                             style="width: 50px; height: 50px; object-fit:cover;"
                                             src="{{asset($account->avatar)}}" alt=""/>
                                    </td>
                                    <td class="text-center">
                                        @if($account->gender == 'male' )
                                            Male
                                        @elseif($account->gender  == 'female')
                                            Female
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            {{$account->dob}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center d-flex justify-content-center">
                                            <a href="{{$url == 'account' ? route('account.edit', $account->url_key): route('account.user.edit', $account->url_key)}}"
                                               class="text-primary"><i class="fas fa-edit"></i></a>
                                            @if(Auth::id() != $account->id)
                                                <form
                                                    action="{{$url == 'account' ? route('account.delete', $account->url_key): route('account.user.delete', $account->url_key)}}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                            class="text-danger bg-transparent border-0 js-delete-button">
                                                        <i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="7">List doesn't have account</td>
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
                        'Account has been deleted.',
                        'success'
                    ).then(() => {
                        form.submit();
                    })
                }
            })
        });

    </script>

@endsection
