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
                <form id="editmodal">
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
                                              <h3 id="hasilnya" name="hasilnya"></h3>
                                              <form action="" id="form_data">
                                                  {{method_field('POST')}}
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                                    <label class="my-1 mr-2" for="tipe_perusahaan">Pilih Perusahaan</label>
                                                                    <select class="custom-select my-1 mr-sm-2 action" id="tipe_perusahaan" name="tipe_perusahaan">
                                                                      <option value="Choose">Choose</option>
                                                                      <option value="BCA">BCA</option>
                                                                      <option value="BRI">BRI</option>
                                                                      <option value="Mandiri">Mandiri</option>

                                                                    </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <label class="my-1 mr-2" for="rasio">Pilih Rasio</label>
                                                                    <select class="custom-select my-1 mr-sm-2 action" id="rasio" name="rasio">
                                                                      <option value="rasio" selected>Choose...</option>
                                                                        @foreach($data as $data)
                                                                        <option value="{{$data['name']}}">{{$data['name']}}</option>

                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                            <div class="col-md-4">
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
<script src="{{asset('assets/js/rasio.js')}}"></script>
@endsection
