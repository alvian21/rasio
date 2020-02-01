
@extends('dashboard.master')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

  </div>
  <div class="container-fluid mt--7">

    <div class="row">
        @foreach ($coba as $row)
        <?php $data = str_replace(' ','_',$row->tipe_rasio); ?>
        <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0">{{ $row->tipe_rasio }}</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div id="{{ $data }}" ></div>
              </div>
            </div>
        </div>
        @if($loop->iteration % 2 == 0)
            </div>
            <br>
            <div class="row">
        @endif
        @endforeach


    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">Rasio</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Rasio</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
</div>
@endsection

@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>

@php
    $arr = array();
@endphp
@foreach($x as $row)
@php
$z = [];
foreach($row as $y){
    $z[] = $y['tipe'];
}
$array = array_unique($z,SORT_REGULAR);
$array = str_replace(' ','_',$array);
@endphp
$(function() {
  $(@php print_r($array[0]); @endphp).highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Grafik Persentase'
    },
    tooltip: {
      pointFormat: '{series.name}: <br>{point.percentage:.1f} %<br>value: {point.y}'
    },
    plotOptions: {
      pie: {
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>:<br>{point.percentage:.1f} %<br>value: {point.y}',
        }
      }
    },

    series: [{
      colorByPoint: true,
      data: @foreach($row as $key => $hasil) @php $arr[] = array('name'=>$hasil['perusahaan'],'y'=>$hasil['hasil']); @endphp @endforeach @php echo(json_encode($arr)); @endphp
    }]
  });
});

@endforeach

</script>
@endsection
