@extends('dashboard.master')
@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
    </div>
  </div>
  <div class="container-fluid mt--7">
    <div>
    </div>
    <div class="row mt-5">
            <div class="col">

              <div class="card bg-default shadow">

                <div class="card-header bg-transparent border-0">
                    @if(sizeof($cari)>0)
                    <div class="row">
                        <div class="col-md-2">
                                <h3 class="text-white mb-0">List Data</h3>
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
                    @foreach ($cari as $row )
                        <tr>
                        <td>{{$row->perusahaan}}</td>
                        <td>{{$row->rasio}}</td>
                        <td>{{$row->tipe_rasio}}</td>
                        <td>{{$row->hasil}}</td>
                        </tr>
                        @endforeach
                  </table>
                  @else
                 <div class="row" >
                    <h3 class="text-white mb-0" style="margin:auto">Maaf, data tidak ditemukan</h3>
                </div>
                  @endif
                </div>

              </div>

            </div>
          </div>
</div>
@endsection
