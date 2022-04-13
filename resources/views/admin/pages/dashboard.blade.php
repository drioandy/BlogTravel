@extends('admin.layouts.index')
@section('title','Dashboard')
@section('content')


    <!-- Main content -->

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$postTotal}}</h3>

                    <p>New Post</p>
                </div>
                <div class="icon">

                    <i class="ion ion-compose"></i>
                </div>
                <a href="{{route('post.approve')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$contactTotal}}</h3>

                    <p>Contact</p>
                </div>
                <div class="icon">
                    <i class="ion ion-headphone "></i>
                </div>
                <a href="{{route('contact.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$userTotal}}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('account.user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$commentTotal}}</h3>

                    <p>Comments </p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-chat"></i>
                </div>
                <a href="{{route('comment.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Post By Week
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body" >
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        {{--                        <div class="chart tab-pane active" id="revenue-chart"--}}
                        {{--                             style="position: relative; height: 300px;">--}}

                        {{--                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>--}}
                        {{--                        </div>--}}
                        <div class="panel-body " >
                            <canvas id="line-chart" ></canvas>
                        </div>
                        {{--                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">--}}
                        {{--                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>--}}
                        {{--                        </div>--}}
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Donut Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" >

                    <div class="chart-pie ">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <!-- Calendar -->
{{--            <div class="card bg-gradient-info">--}}
{{--                <div class="card-header border-0">--}}

{{--                    <h3 class="card-title">--}}
{{--                        <i class="far fa-calendar-alt"></i>--}}
{{--                        Calendar--}}
{{--                    </h3>--}}
{{--                    <!-- tools card -->--}}

{{--                    <!-- /. tools -->--}}
{{--                </div>--}}
{{--                <!-- /.card-header -->--}}
{{--                <div class="card-body pt-0">--}}
{{--                    <!--The calendar -->--}}

{{--                    --}}{{--                    <div id="calendar" style="width: 100%"></div>--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--            </div>--}}
            <!-- /.card -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"
            integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        window.onload = function () {
            fetch(`${window.location.origin}/api/post-week`)

                .then(response => response.json())
                .then(data => {
                    // console.log(data.data);
                    // console.log(data.label);
                    let postData = [...data.data]
                    let postLabel = [...data.label]
                    Chart.defaults.global.defaultFontColor = '#000000';
                    Chart.defaults.global.defaultFontFamily = 'Arial';
                    var lineChart = document.getElementById('line-chart');
                    var myChart = new Chart(lineChart, {
                        type: 'line',
                        data: {
                            labels: postLabel,
                            datasets: [
                                {
                                    label: 'New Post By Week',
                                    data: postData,
                                    backgroundColor: 'rgba(0, 128, 128, 0.3)',
                                    borderColor: 'rgba(0, 128, 128, 0.7)',
                                    borderWidth: 1
                                },
                                // {
                                //     label: 'Ruby Activities',
                                //     data: [18, 72, 10, 39, 19, 75],
                                //     backgroundColor: 'rgba(0, 128, 128, 0.7)',
                                //     borderColor: 'rgba(0, 128, 128, 1)',
                                //     borderWidth: 1
                                // }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                        }
                    });

                });


            fetch(`${window.location.origin}/api/post-by-category`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Set new default font family and font color to mimic Bootstrap's default styling
                    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#858796';
                    // Pie Chart Example
                    var ctx = document.getElementById("myPieChart");
                    var myPieChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: data.label,
                            datasets: [{
                                data: data.data,
                                backgroundColor: ['#FFD371','#FF5900',  '#C2FFD9', '#9DDAC6', '#7C83FD', '#96BAFF', '#B2AB8C', '#DBE6FD', '#47597E', '#293B5F', '#DA7F8F', '#F2BB7B'],
                                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],

                        },

                        options: {
                            maintainAspectRatio: false,

                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },

                            legend: {
                                display: true,
                                labels: {
                                    // This more specific font property overrides the global property
                                    font: {
                                        size: 14
                                    }
                                }
                            },
                            cutoutPercentage: 50,

                        },
                    });
                })


        };
    </script>
    <!-- /.content -->
@endsection
