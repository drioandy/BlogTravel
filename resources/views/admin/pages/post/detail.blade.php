<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post Detail</title>
    <link rel="icon" href="{{asset('image/logo.png')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('image/logo.png')}}"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/app.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <section class="content">
            <div class="container-fluid">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Post content-->
                            <article class="border rounded mb-3">
                                <figure class="mb-4 w-full"><img class="img-fluid  w-full object-cover  "
                                                                 style="height: 350px"
                                                                 src="{{asset($post -> thumbnail)}}" alt="..."/>
                                </figure>

                                <!-- Post header-->
                                <header class="mb-4 px-10">

                                    <!-- Post title-->
                                    <h1 class="text-5xl font-semibold mb-8">{{$post -> title}}</h1>
                                    <!-- Post meta content-->
                                    <div class="flex justify-between">
                                        <div class="text-muted fst-italic mb-2">Posted
                                            on {{Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}
                                            by {{$post -> user->user_name}}</div>

                                    </div>

                                    <!-- Post categories-->
                                    Category: <a href="">{{$post -> category -> name}} </a>

                                </header>
                                <!-- Preview image figure-->
                                <!-- Post content-->
                                <section class="mb-5 px-10">
                                    {!! $post -> content !!}

                                </section>
                            </article>

                            <!-- Comments section-->
                            <section class="mb-5">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <!-- Comment form-->


                                        @include('admin.pages.comment.display',['comments' => $post->comments, 'post_id' => $post->id])

                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Side widgets-->

                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>

