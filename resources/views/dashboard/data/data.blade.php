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
