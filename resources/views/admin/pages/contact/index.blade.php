@extends('admin.layouts.index')
@section('title','Contact List')
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
                            <form action="{{route('contact.index')}}">

                                <div class="input-group input-group-sm ">
                                    <input type="text" name="keyword" class="form-control float-right"
                                           placeholder="Search By Contact Title">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        @if($contacts->total()	> $contacts->perPage())
                            {{$contacts->links()}}
                        @endif
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">

                    <table class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th class="text-center">
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($contacts->total() > 0)
                            @foreach($contacts as $key => $contact)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$contact->user_name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->title}}</td>
                                    <td>{{$contact->message}}</td>
                                    <td>
                                        <div
                                            class="text-center d-flex justify-content-center ">

                                            <form action="{{ route('contact.delete',$contact->id) }}"
                                                  method="POST">
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
                                <td class="text-center" colspan="5">List doesn't have comment</td>
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
                        'Contact has been deleted.',
                        'success'
                    ).then(() => {
                        form.submit();
                    })
                }
            })
        });

    </script>

@endsection
