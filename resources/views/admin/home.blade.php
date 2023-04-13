@extends('admin.index')
@section('content')
<link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/shared/iconly.css">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- heading status --}}
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2">
                                <i class="iconly-boldShow"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">jumlah Users</h6>
                            <h6 class="font-extrabold mb-0">
                                @php echo $jml; @endphp
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">User Aktif</h6>
                            <h6 class="font-extrabold mb-0"> @php echo $ar_status @endphp</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon green mb-2">
                                <i class="iconly-boldAdd-User"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">User Non-aktif</h6>
                            <h6 class="font-extrabold mb-0">
                                @php echo $ar_status1 @endphp
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon red mb-2">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Saved Post</h6>
                            <h6 class="font-extrabold mb-0">112</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pendaftar User</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="bar"></canvas>
                    </div>
                </div>
            </div>     
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Presentase User</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://jambroong.github.io/assets/mazer/extensions/apexcharts/apexcharts.min.js"></script>
{{-- <script src="{{ asset('assets/apexcharts.min.js') }}"></script> --}}
<script>
var lbl = [@foreach($ar_role as $g) '{{ $g->role }}', @endforeach];
var gend = [@foreach($ar_role as $g) {{ $g->jumlah }}, @endforeach];


let optionsVisitorsProfile = {
  series:gend,
  labels: lbl,
  colors: ["#435ebe", "#55c6e8","#41B1F9"],
  chart: {
    type: "donut",
    width: "100%",
    height: "350px",
  },
  legend: {
    position: "bottom",
  },
  plotOptions: {
    pie: {
      donut: {
        size: "30%",
      },
    },
  },
}
var chartVisitorsProfile = new ApexCharts(
  document.getElementById("chart-visitors-profile"),
  optionsVisitorsProfile
)
chartVisitorsProfile.render()


</script>

<script src="https://jambroong.github.io/assets/mazer/extensions/chart.js/chart.min.js"></script>
{{-- <script src="{{ asset('assets/chart.min.js') }}"></script> --}}
 {{-- <script src="{{ asset('assets/ui-chartjs.js') }}"></script>  --}}
<script>
   

  var chartColors = {
  red: "rgb(255, 99, 132)",
  orange: "rgb(255, 159, 64)",
  yellow: "rgb(255, 205, 86)",
  green: "rgb(75, 192, 192)",
  info: "#41B1F9",
  blue: "#3245D1",
  purple: "rgb(153, 102, 255)",
  grey: "#EBEFF6",
}
var ctxBar = document.getElementById("bar").getContext("2d")
var myBar = new Chart(ctxBar, {
  type: "bar",
  data: {
    labels: ['Januari','February','Maret','April','Mei','Juni','juli','agustus','september','Oktober','November','Desember'],
    datasets: [
      {
        label: "Users",
        backgroundColor: [
          chartColors.grey,
          chartColors.orange,
          chartColors.yellow,
          chartColors.green,
          chartColors.info,
          chartColors.blue,
          chartColors.purple,
        ],
        data:[ {{ $user_jan }},{{ $user_feb }},{{ $user_mar }},{{ $user_apr }},{{ $user_mei }},{{ $user_jun }},
        {{ $user_jul }},{{ $user_agus }},{{ $user_sep }}, {{ $user_okt }}, {{ $user_nov }}, {{ $user_des }} ],
      },
    ],
  },
  options: {
    responsive: true,
    barRoundness: 1,
    title: {
      display: true,
      text: "Students in 2020",
    },
    legend: {
      display: false,
    },
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
            suggestedMax: 40 + 20,
            padding: 10,
          },
          gridLines: {
            drawBorder: false,
          },
        },
      ],
      xAxes: [
        {
          gridLines: {
            display: false,
            drawBorder: false,
          },
        },
      ],
    },
  },
})
// 
</script>
@endsection
{{-- // var lbl1 = [@foreach($data as $jl) '{{ $jl->tanggal }}', @endforeach];
// var jml1 = [@foreach($data as $jl) {{ $jl->jumlah }}, @endforeach]; --}}

{{-- // var lbl = [@foreach($data1 as $j) '{{ $j->tanggal1 }}', @endforeach];
// var jml = [@foreach($data1 as $j) {{ $j->jumlah1 }}, @endforeach];

// var lbl1 = [@foreach($data as $jl) '{{ $jl->tanggal }}', @endforeach];
// var jml1 = [@foreach($data as $jl) {{ $jl->jumlah }}, @endforeach]; --}}