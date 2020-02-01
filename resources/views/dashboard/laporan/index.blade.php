@extends('dashboard.master')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">

    </div>
  </div>

  <div class="container-fluid mt--7">
    <!-- Table -->
    {{-- <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-0">
            <h3 class="mb-0">Laporan Perhitungan Rasio</h3>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-borderless">

              <tbody>


                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div class="media-body">
                        <span class="mb-0 text-sm">Hello</span>
                      </div>
                    </div>
                  </th>
                  <td>
                    $2,500 USD
                  </td>

                </tr>



              </tbody>

            </table>
          </div>
          <div class="table-responsive">

            <table class="table table-borderless">
                <tbody>
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                        <div class="media-body">
                            <span class="mb-0 text-sm">Hasilnya</span>
                        </div>
                        </div>
                    </th>
                    <td>
                        $2,500 USD
                    </td>

                    </tr>
                </tbody>
            </table>


          </div>
        </div>
      </div>
    </div> --}}
    <br>
    <section class="card shadow page-content reports new-design">
        <div class="col-lg-12 content-wrapper">
            <div class="table-container list-table">
            <div class="report-title">
            <div class="table-responsive dragscroll">
            <table class="profit-loss report-table table" id="date-profit-lost">
            <thead class="report-header">
                <tr>
                    <th colspan="2">
                  Laporan Perhitungan Rasio
                    </th>
                <th></th>

                </tr>
            </thead>
            <tbody>
            <tr>
                <td class="report-header report-subheader-noindent" colspan="4">
                <b>Tipe Rasio : {{$data->tipe_rasio}}</b>
                </td>
            </tr>
            <tr>
                            <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
                           {{json_decode($data->data1)->tipe}}
                            </td>
                            <td class="report-subtotal text-right" id="assets-type-1-total-data">
                            {{json_decode($data->data1)->data}}
                            </td>
                        <td class="border-top-thin" style="padding-left:0;">

                        </td>

                        </tr>
                <tr>
                    <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
                            {{json_decode($data->data2)->tipe}}
                    </td>
                    <td class="report-subtotal text-right" id="assets-type-1-total-data">
                            {{json_decode($data->data2)->data}}
                    </td>
                    <td class="border-top-thin" style="padding-left:0;">
                    </td>
                </tr>

            </tr>
            @if($data->data3 != null)
            <tr>
                <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
                        {{json_decode($data->data3)->tipe}}
                </td>
                <td class="report-subtotal text-right" id="assets-type-1-total-data">
                        {{json_decode($data->data3)->data}}
                </td>
                <td class="border-top-thin" style="padding-left:0;">
                </td>
            </tr>
            @else
            @endif

            <tr>
                    <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
                          Hasil dari Perhitungan rasio
                    </td>
                    <td class="report-subtotal text-right" id="assets-type-1-total-data">
                            {{$data->hasil}}
                    </td>
                    <td class="border-top-thin" style="padding-left:0;">
                    </td>
            </tr>
            {{-- <tr>
                <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
                    <h3><p style="font: italic;">{{$data->description}}</p>
                    </h3>
              </td> --}}
            </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="container break-text">
                <div class="row">
                  <div class="col-xs-4">

                    <h3><i style="font: italic; color:#404040">{{$data->description}}</i> </h3>
                  </div>
                </div>
              </div>
            </div>


            </div>
    </section>
    <!-- Footer -->
    <footer class="footer">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            © 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">Rasio</a>
          </div>
        </div>

      </div>
    </footer>




  </div>




@endsection
