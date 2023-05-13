@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_member }}</h3>
                    <p>Total Member</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{ url('members') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_book }}</h3>
                    <p>Total Book</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <a href="{{ url('books') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_publisher }}</h3>
                    <p>Data Publisher</p>
                </div>
                <div class="icon">
                    <i class="fa fa-upload"></i>
                </div>
                <a href="{{ url('publishers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_transaction }}</h3>
                    <p>Data Transaction</p>
                </div>
                <div class="icon">
                    <i class="fa fa-dollar-sign"></i>
                </div>
                <a href="{{ url('transactions') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- DONUT CHART -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Grafik Publisher</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div><!-- /.card-body -->
    </div>

    <!-- BAR CHART -->
    <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Grafik Transaction</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
    </div>

    <!-- STACKED BAR CHART -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Stacked Bar Chart</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        var label_donut = '{!! json_encode($label_donut) !!}'
        var data_donut = '{!! json_encode($data_donut) !!}'
        var data_bar = '{!! json_encode($data_bar) !!}'
        var member = '{!! json_encode($member) !!}'
        $(function(){
            //- DONUT CHART -
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData        = {
            labels: JSON.parse(label_donut),
            datasets: [
                {
                data: JSON.parse(data_donut),
                backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56743','#f56945','#f56459','#e56777','#d56984','#c56974','#a57944','#ffffff'],
                }
            ]
            }
            var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
            })

            //- BAR CHART -
            //-------------
            var areaChartData = {
                labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: JSON.parse(data_bar)
            }
            
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)

            var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
            })

            //- STACKED BAR CHART -
            //---------------------
            var areaChartData = {
                labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: JSON.parse(member)
            }
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, areaChartData)

            var stackedBarChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
            })
        });
    </script>
@endsection
