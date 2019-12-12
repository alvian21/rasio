@extends('dashboard.master')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">

    </div>
  </div>

  <div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
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
                        <span class="mb-0 text-sm">Aset Lancar</span>
                      </div>
                    </div>
                  </th>
                  <td>
                    $2,500 USD
                  </td>


                  <td>
                    <div class="d-flex align-items-center">

                    </div>
                  </td>

                </tr>
                <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm">Hutang Lancar</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $2,500 USD
                    </td>


                    <td>
                      <div class="d-flex align-items-center">

                      </div>
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
    </div>
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
                    Tanggal
                    </th>
                    <th class="text-right">
                    12/12/2019
                    </th>
                <th></th>

                </tr>
            </thead>
            <tbody>
            <tr>
            <td class="report-header report-subheader-noindent" colspan="4">
            Pendapatan dari Penjualan
            </td>
            </tr>
            <tr>
            <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
            Total Pendapatan dari Penjualan
            </td>
            <td class="report-subtotal text-right" id="assets-type-1-total-data">
             0,00
            </td>
            <td class="border-top-thin" style="padding-left:0;">

            </td>

            </tr>


            <tr>
            <td class="report-header report-subheader-noindent" colspan="4">
            Harga Pokok Penjualan
            </td>
            </tr>
            <tr>
            <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
            Total Harga Pokok Penjualan
            </td>
            <td class="report-subtotal text-right" id="assets-type-1-total-data">
             0,00
            </td>
            <td class="border-top-thin" style="padding-left:0;">

            </td>

            </tr>


            <tr>
            <td class="grand-total text-left no-indent" colspan="2">
            Laba Kotor
            </td>
            <td class="report-subtotal text-right subtotal1">
             0,00
            </td>
            <td class="grand-total no-border-bottom text-left subtotal1 no-indent" style="padding-left:0;">

            </td>

            </tr>
            <tr>
            <td class="w-border-bottom" colspan="4" height="28px"></td>
            </tr>
            <tr>
            <td class="report-header report-subheader-noindent" colspan="4">
            Biaya Operasional
            </td>
            </tr>


            <tr>
            <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
            Total Biaya
            </td>
            <td class="report-subtotal text-right" id="assets-type-1-total-data">
             0,00
            </td>
            <td class="border-top-thin" style="padding-left:0;">

            </td>

            </tr>


            <tr>
            <td class="grand-total no-border-bottom text-left no-indent subtotal1" colspan="2">
            Pendapatan Bersih Operasional
            </td>
            <td class="grand-total no-border-bottom text-right subtotal1">
             0,00
            </td>
            <td class="grand-total text-right subtotal1 no-border-bottom no-indent" style="padding-left:0;">

            </td>

            </tr>
            <tr>
            <td class="w-border-bottom" colspan="4" height="28px"></td>
            </tr>
            <tr>
            <td class="report-header report-subheader-noindent" colspan="4">
            Pendapatan Lainnya
            </td>
            </tr>
            <tr>
            <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
            Total Pendapatan Lainnya
            </td>
            <td class="report-subtotal text-right" id="assets-type-1-total-data">
             0,00
            </td>
            <td class="border-top-thin" style="padding-left:0;">

            </td>

            </tr>


            <tr>
            <td class="report-header report-subheader-noindent" colspan="4">
            Biaya Lainnya
            </td>
            </tr>
            <tr>
            <td class="report-subtotal text-left regular-text data-col-half" colspan="2">
            Total Biaya Lainnya
            </td>
            <td class="report-subtotal text-right" id="assets-type-1-total-data">
             0,00
            </td>
            <td class="border-top-thin" style="padding-left:0;">

            </td>

            </tr>


            <tr>
            <td class="grand-total text-left no-indent no-border-bottom subtotal1" colspan="2">
            Pendapatan Bersih
            </td>
            <td class="grand-total no-border-bottom text-right subtotal1">
             0,00
            </td>
            <td class="grand-total no-border-bottom text-right subtotal1 no-indent" style="padding-left:0;">

            </td>

            </tr>
            </tbody>
            </table>
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
            © 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>

      </div>
    </footer>




  </div>




@endsection
