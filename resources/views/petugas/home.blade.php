@extends('petugas.index')
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
                            <li class="breadcrumb-item"><a href="{{ route('petugasDashboard') }}">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">jumlah Seluruh Buku</h6>
                                    <h6 class="font-extrabold mb-0">
                                        @php echo $totalbuku @endphp
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
                                        <i class="iconly-boldCalendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kategori</h6>
                                    <h6 class="font-extrabold mb-0">
                                        @php echo $totalkategori @endphp
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
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pengarang</h6>
                                    <h6 class="font-extrabold mb-0">
                                        @php echo $totalpengarang @endphp
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
                                    <h6 class="text-muted font-semibold">Penerbit</h6>
                                    <h6 class="font-extrabold mb-0">
                                      @php echo $totalpenerbit @endphp
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <section class="section">
              
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pengembalian</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="bar"></canvas>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Peminjaman  </h4>
                            </div>
                            <div class="card-body">
                                <canvas id="line"></canvas>
                            </div>
                        </div>
                    </div>  
                    
                </div>
            </section>
        </section>
    </div>
    <script src="https://jambroong.github.io/assets/mazer/extensions/apexcharts/apexcharts.min.js"></script>
{{-- <script src="{{ asset('assets/apexcharts.min.js') }}"></script> --}}
<script>
  
let optionsVisitorsProfile = {
  series:[30,70],
  labels: ['laki','p'],
  colors: ["#435ebe", "#55c6e8"],
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
        label: "pengembali",
        backgroundColor: [
          chartColors.grey,
          chartColors.orange,
          chartColors.green,
          chartColors.purple,
          chartColors.info,
          chartColors.blue,
          chartColors.grey,
        ],
        data: [ {{ $pengem_jan }},{{ $pengem_feb }},{{ $pengem_mar }},{{ $pengem_apr }},{{ $pengem_mei }},{{ $pengem_jun }},
        {{ $pengem_jul }},{{ $pengem_agus }},{{ $pengem_sep }}, {{ $pengem_okt }}, {{ $pengem_nov }}, {{ $pengem_des }} ],
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


var line = document.getElementById("line").getContext("2d")
var gradient = line.createLinearGradient(0, 0, 0, 400)
gradient.addColorStop(0, "rgba(50, 69, 209,1)")
gradient.addColorStop(1, "rgba(265, 177, 249,0)")

var gradient2 = line.createLinearGradient(0, 0, 0, 400)
gradient2.addColorStop(0, "rgba(255, 91, 92,1)")
gradient2.addColorStop(1, "rgba(265, 177, 249,0)")

var myline = new Chart(line, {
  type: "line",
  data: {
    {{-- labels: [
      "16-07-2018",
      "17-07-2018",
      "18-07-2018",
      "19-07-2018",
      "20-07-2018",
      "21-07-2018",
      "22-07-2018",
      "23-07-2018",
      "24-07-2018",
      "25-07-2018",
    ], --}}
    labels:  ['Januari','February','Maret','April','Mei','Juni','juli','agustus','september','Oktober','November','Desember'],
    datasets: [
      {
        label: "Peminjam",
        data:  [ {{ $pemin_jan }},{{ $pemin_feb }},{{ $pemin_mar }},{{ $pemin_apr }},{{ $pemin_mei }},{{ $pemin_jun }},
        {{ $pemin_jul }},{{ $pemin_agus }},{{ $pemin_sep }}, {{ $pemin_okt }}, {{ $pemin_nov }}, {{ $pemin_des }} ] ,
        backgroundColor: "rgba(50, 69, 209,.6)",
        borderWidth: 3,
        borderColor: "rgba(63,82,227,1)",
        pointBorderWidth: 0,
        pointBorderColor: "transparent",
        pointRadius: 3,
        pointBackgroundColor: "transparent",
        pointHoverBackgroundColor: "rgba(63,82,227,1)",
      },
      // {
      //   label: "pengembali",
      //   data: jml2,
      //   backgroundColor: "rgba(253, 183, 90,.6)",
      //   borderWidth: 3,
      //   borderColor: "rgba(253, 183, 90,.6)",
      //   pointBorderWidth: 0,
      //   pointBorderColor: "transparent",
      //   pointRadius: 3,
      //   pointBackgroundColor: "transparent",
      //   pointHoverBackgroundColor: "rgba(63,82,227,1)",
      // },
    ],
  },
  options: {
    responsive: true,
    layout: {
      padding: {
        top: 10,
      },
    },
    tooltips: {
      intersect: false,
      titleFontFamily: "Helvetica",
      titleMarginBottom: 10,
      xPadding: 10,
      yPadding: 10,
      cornerRadius: 3,
    },
    legend: {
      display: true,
    },
    scales: {
      yAxes: [
        {
          gridLines: {
            display: true,
            drawBorder: true,
          },
          ticks: {
            display: true,
          },
        },
      ],
      xAxes: [
        {
          gridLines: {
            drawBorder: false,
            display: false,
          },
          ticks: {
            display: false,
          },
        },
      ],
    },
  },
})  
</script>
@endsection
