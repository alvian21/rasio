@extends('dashboard.master')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">

    </div>
  </div>
  <div class="container-fluid mt--7">
    <div>

    </div>


  <!-- add Modal -->
  <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="tambahdataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"  style="justify-content:center;">
          <h3 class="modal-title" id="tambahdataLabel" >Tambah Data</h3>
          </button>
        </div>
        <div class="modal-body">
            <form id="form_add">
                {{method_field('POST')}}
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Perusahaan</label>
                  <input type="text" id="perusahaan" name="perusahaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                    <label class="my-1 mr-2" for="rasio">Pilih Rasio</label>
                    <select class="custom-select my-1 mr-sm-2 pilihadd" id="rasioku" name="rasioku">
                      <option value="rasio" selected>Choose...</option>
                        @foreach($add as $addku)
                        <option value="{{$addku['name']}}">{{$addku['name']}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="my-1 mr-2" for="tipe">Tipe Rasio</label>
                    <select class="custom-select my-1 mr-sm-2 pilihadd" id="tipeku" name="tipeku">
                        <option value="tipe">Tipe</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Hasil</label>
                    <input type="text" id="hasil" name="hasil" class="form-control" id="exampleInputPassword1" >
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" name="saveadd" class="btn btn-primary" id="saveadd">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    <div class="row mt-5">
            <div class="col">
              <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <div class="row">
                        <div class="col-md-2">
                                <h3 class="text-white mb-0">List Data</h3>
                        </div>

                        <div class="col-md-10">

                                <div class="col text-right">
                                        <button class="btn btn-sm btn-primary addata" type="button" >Tambah data</button>
                                </div>
                        </div>
                    </div>


                </div>

                <div class="table-responsive">
                  <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Rasio</th>
                        <th scope="col">Tipe Rasio</th>
                        <th scope="col">Hasil</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <?= $new;?>

                  </table>
                </div>
              </div>
            </div>
          </div>


<!-- EDit Modal -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="editdataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"  style="justify-content:center;">
              <h3 class="modal-title" id="editdataLabel" >Edit Data</h3>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    {{method_field('POST')}}
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Perusahaan</label>
                      <input type="text" id="perusahaanedit" name="perusahaanedit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Hasil</label>
                        <input type="text" id="hasiledit" name="hasiledit" class="form-control" id="exampleInputPassword1" >
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" name="saveadd" class="btn btn-primary" id="saveadd">Save changes</button>
            </form>
            </div>
          </div>
        </div>
</div>
    <div class="row mt-5">
        <div class="col-xl-10 mb-5 mb-xl-0" style="margin: 0 auto; float: none; ">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data</h3>
                </div>
                <div class="col text-right">
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1">Cek data</button>
                </div>
              </div>
            </div>
            <div>
                 <div class="row">
                            <div class="col">
                              <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    <div class="row">
                                            <div class="col-md-4">
                                                    <label class="my-1 mr-2" for="data">Pilih Perusahaan</label>
                                                    <select class="custom-select my-1 mr-sm-2" id="data" name="data">
                                                      <option value="Choose" selected>Choose...</option>
                                                      <option value="BBCA">BCA</option>
                                                      <option value="BBRI">BRI</option>
                                                    </select>
                                            </div>
                                            <div class="col-md-4">
                                                    <label class="my-1 mr-2" for="tahun">Pilih Tahun</label>
                                                    <select class="custom-select my-1 mr-sm-2" id="tahun" name="tahun">
                                                      <option value="Tahun" selected>Tahun</option>
                                                      <option value="2019">2019</option>
                                                      <option value="2018">2018</option>
                                                      <option value="2017">2017</option>
                                                    </select>
                                            </div>
                                            <div class="col-md-4">
                                                    <label class="my-1 mr-2" for="periode">Pilih Periode</label>
                                                    <select class="custom-select my-1 mr-sm-2" id="periode" name="periode">
                                                      <option value="Periode" selected>Periode</option>
                                                      <option value="tw1">Triwulan 1</option>
                                                      <option value="tw2">Triwulan 2</option>
                                                      <option value="tw3">Triwulan 3</option>
                                                      <option value="audit">Tahunan</option>
                                                    </select>
                                            </div>
                                    </div>
                                        <br>
                                    <div style=" display: flex; align-items: center; justify-content: center;">
                                            <a id="getdata" href="#" target="" class="btn btn-primary">cek</a>
                                    </div>

                                </div>
                              </div>
                            </div>

                        </div>

            </div>
          </div>
        </div>
        {{-- <div class="col-xl-5">
                <div class="card shadow">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">Social traffic</h3>
                      </div>
                      <div class="col text-right">
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse-rasio" aria-expanded="false" aria-controls="multiCollapseRasio">Hitung Rasio</button>
                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                        <div class="col">
                          <div class="collapse multi-collapse-rasio" id="multiCollapseRasio">
                            <div class="card card-body">
                                <div class="row">
                                        <div class="table-responsive">
                                                <!-- Projects table -->
                                                <table class="table align-items-center table-flush">
                                                  <thead class="thead-light">
                                                    <tr>
                                                      <th scope="col">Referral</th>
                                                      <th scope="col">Visitors</th>
                                                      <th scope="col"></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>

                                                  </tbody>
                                                </table>
                                              </div>
                                </div>
                                    <br>

                                    <a id="getdata" href="#" target="" class="btn btn-primary">cek</a>
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
              </div> --}}
    </div>
    <div class="row mt-5">
            <div class="col-xl-10 mb-5 mb-xl-0" style="margin: 0 auto; float: none; ">
                    <div class="card shadow">
                      <div class="card-header border-0">
                        <div class="row align-items-center">
                          <div class="col">
                            <h3 class="mb-0">Rasio</h3>
                          </div>
                          <div class="col text-right">
                                  <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse-rasio" aria-expanded="false" aria-controls="multiCollapseRasio">Hitung Rasio</button>
                            {{-- <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample2" class="btn btn-sm btn-primary">See all</a> --}}
                          </div>
                        </div>
                      </div>
                      <div>
                           <div class="row">
                                      <div class="col">
                                        <div class="collapse multi-collapse-rasio" id="multiCollapseRasio">
                                          <div class="card card-body">
                                              <h3 id="hasil" name="hasil"></h3>
                                              <form action="" id="form_data">
                                                  {{method_field('POST')}}
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                    <label class="my-1 mr-2" for="rasio">Pilih Rasio</label>
                                                                    <select class="custom-select my-1 mr-sm-2 action" id="rasio" name="rasio">
                                                                      <option value="rasio" selected>Choose...</option>
                                                                        @foreach($data as $data)
                                                                        <option value="{{$data['name']}}">{{$data['name']}}</option>

                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                    <label class="my-1 mr-2" for="tipe">Tipe Rasio</label>
                                                                    <select class="custom-select my-1 mr-sm-2 action" id="tipe" name="tipe">
                                                                      <option value="tipe">Tipe</option>

                                                                    </select>
                                                            </div>

                                                    </div>

                                                <br>
                                              <div class="row" id="inputhitung">


                                            </div>
                                                  <br>
                                                <div  style=" display: flex; align-items: center; justify-content: center;">
                                                        <button id="hitung" name="submit" type="submit" class="btn btn-primary">Hitung</button>
                                                </div>

                                            </form>
                                          </div>
                                        </div>
                                      </div>

                                  </div>

                      </div>
                    </div>
                  </div>
      {{-- <div class="col-xl-4">
        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Social traffic</h3>
              </div>
              <div class="col text-right">
                <a href="#!" class="btn btn-sm btn-primary">See all</a>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Referral</th>
                  <th scope="col">Visitors</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">
                    Facebook
                  </th>
                  <td>
                    1,480
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mr-2">60%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    Facebook
                  </th>
                  <td>
                    5,480
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mr-2">70%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    Google
                  </th>
                  <td>
                    4,807
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mr-2">80%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    Instagram
                  </th>
                  <td>
                    3,678
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mr-2">75%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    twitter
                  </th>
                  <td>
                    2,645
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mr-2">30%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div> --}}
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('assets/js/jquery.lwMultiSelect.js')}}"></script>
<script>
$(document).ready(function(){
    $('.addata').on('click', function(){
    $('#tambahdata').modal('show');
});

$('#saveadd').on('click', function(){
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var perusahaan = $('#perusahaan').val();
        var rasio = $('#rasioku').val();
        var tipe = $('#tipeku').val();
        var hasil = $('#hasil').val();
    var formadd = $('#form_add').serialize();
    $.ajax({
        url: '{{Route("addnew")}}',
        type: 'POST',
        data: {
                'save':1,
                'perusahaan':perusahaan,
                'rasio':rasio,
                'tipe':tipe,
                'hasil':hasil
        },
        success:function(data){

            $('#form_add')[0].reset();
            $('#display_area').append(data);
            $('#tambahdata').modal('hide');
            alert('data saved');
        }
    });
});

$(document).on('click', '.delete', function(){
        var id = $(this).data('id');
        $clicked_btn = $(this);
        $.ajax({
          url: '{{Route("delete")}}',
          type: 'GET',
          data: {
          'delete': 1,
          'id': id,
        },
        success: function(response){
          // remove the deleted comment
          fetch_data();
            $clicked_btn.parent().remove();
        }
        });
    });


    function fetch_data(){


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url:"{{Route('fetch')}}",
        method:"POST",
        success:function(data)
        {
            $('#display_area').html(data);
        }
    });
    }

});


</script>

<script>
$(document).on('click','#getdata', function(){

    var $this = $(this);
    var data = $('#data').val();
    var tahun = $('#tahun').val();
    var periode = $('#periode').val();
    if(data == 'Choose' || tahun == 'Tahun' || periode == 'Periode'){
        swal("Fail", "Please select the option", "error", {
        button: "Ok",
    });
    }else{
        $.ajax({
            url: '/admin/datavalid',
            type: 'GET',
            async: false,
            data: {
                'data': data,
                'tahun': tahun,
                'periode': periode
            },
            success: function (url) {
                $('#data').val('Choose');
                $('#tahun').val('Tahun');
                $('#periode').val('Periode');
                $this.attr("href", url);
                $this.attr("target", "_blank");
                window.setTimeout(function(){window.location.reload()}, 2000);

            },
            error: function () {
                e.preventDefault();
            }
        });
    }

    });
</script>


<script>
$(document).ready(function(){
    $('.action').change(function(){
		if($(this).val() != '')
		{
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var action = $(this).attr("id");
			var query = $(this).val();
            var result = '';

           if($('#tipe').val() == 'Rasio Lancar'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Aset Lancar</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Aset Lancar" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Hutang Lancar</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Hutang Lancar" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Rasio Cepat'){
            $('#inputhitung').html('<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Aset Lancar</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Aset Lancar" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data3">Persediaan</label>'+
                                                '<input type="number" name="data3" id="data3" class="form-control form-control-alternative" placeholder="Persediaan" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Hutang Lancar</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Hutang Lancar" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Cakupan Bunga'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Laba sebelum bunga dan laba</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Laba sebelum bunga dan laba" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Beban Bunga</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Beban Bunga" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Utang Terhadap Ekuitas'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Total Hutang</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Total Hutang" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Ekuitas</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Ekuitas" >'+
                                        '</div>'+
                                    '</div>');
           }
           else if($('#tipe').val() == 'Utang Terhadap Total Aset'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Total Hutang</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Total Hutang" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Total Aset</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Total Aset" >'+
                                        '</div>'+
                                    '</div>');
           }
            else{
            $('#inputhitung').html('');
           }


			if(action == 'rasio')
			{
				result = 'tipe';
			}

			$.ajax({
				url:'{{Route("fetchRasio")}}',
				method:"POST",
				data:{action:action, query:query},

				success:function(data)
				{

					$('#'+result).html(data);
				}
			})
		}
	});


    $('#hitung').on('click', function(event){
    event.preventDefault();
        var tipe = $('#tipe').val();
        var rasio = $('#rasio').val();
        var data1 = $('#data1').val();
        var data2 = $('#data2').val();
        var data3 = $('#data3').val();
        var form_data = $('#form_data').serialize();
        if(tipe == 'tipe' || rasio == 'rasio'){
            swal("Fail", "Please select the option", "error");
        }else if(data1 == '' || data2 == '' || data3 == ''){
            swal("Fail", "Please input the data", "error");
        }
        // console.log(form_data);
        else{
            $.ajax({
            url:"{{Route('hitung')}}",
            method:"POST",
            data:form_data,
            success:function(data)
            {

                $('#form_data')[0].reset();
                $('#hasil').html('Hasilnya : '+data);
                swal("Berhasil", "Hasilnya :"+data, "success");
                $('#inputhitung').html('');
            }
        });
        }



});
});
</script>

<script>
        $(document).ready(function(){
            $('.pilihadd').change(function(){
                if($(this).val() != '')
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var action = $(this).attr("id");
                    var query = $(this).val();
                    var result = '';
                    if(action == 'rasioku')
                    {
                        result = 'tipeku';
                    }

                    $.ajax({
                        url:'{{Route("fetchRasio")}}',
                        method:"POST",
                        data:{action:action, query:query},

                        success:function(data)
                        {

                            $('#'+result).html(data);
                        }
                    })
                }
            });
        });
</script>


<script>

$(document).on('click','.editdataku', function(){
    $('#editdata').modal('show');


    $tr = $(this).closest('tr');

var data = $tr.children('td').map(function(){
    return $(this).text();
}).get();
        console.log(data);
        $('#perusahaanedit').val(data[0]);
        $('#hasiledit').val(data[3]);

});
</script>
@endsection
