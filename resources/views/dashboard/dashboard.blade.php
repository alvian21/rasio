@extends('dashboard.master')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Perusahaan</h5>
                    <span class="h2 font-weight-bold mb-0">3</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <i class="fas fa-chart-bar"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Tipe Rasio</h5>
                    <span class="h2 font-weight-bold mb-0">{{$rasio->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <i class="fas fa-chart-pie"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--7">
    <div class="row">

      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0">Grafik Rasio Lancar</h2>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Chart -->
            <div id="chartRasio">

            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0">Grafik Rasio Cepat</h2>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Chart -->
            <div id="chartRasioCepat">

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
@endsection

@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>

Highcharts.chart('chartRasio', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perusahaan'
    },
    xAxis: {
        categories: {!!json_encode($array)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Hasil'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: {!!json_encode($row->tipe_rasio)!!},
        data: {!!json_encode($hasil)!!}

    }, ]
});



Highcharts.chart('chartRasioCepat', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perusahaan'
    },
    xAxis: {
        categories: {!!json_encode($a)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Hasil'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: {!!json_encode($cepat->tipe_rasio)!!},
        data: {!!json_encode($b)!!}

    }, ]
});
</script>
@endsection
