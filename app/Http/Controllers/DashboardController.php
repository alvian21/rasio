<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rasio;
use App\CustomClass\calculator;
use App\CustomClass\rasiocal;
use App\Data;
use App\Piechart;
use DateTime;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rasio = Rasio::all();
        $coba = Data::select('tipe_rasio')->groupBy('tipe_rasio')->get();

        $a = [];
        $b = [];
        $rasiocepat = [];
        $tipe = Data::all();
            $x = [];
            $json = [];

            $aku = [];
        foreach ($tipe as $key => $value) {
            $item = $value->tipe_rasio;
            $json[] = [$item=>$value->hasil];
            $aku[] = $value->tipe_rasio;
            $x[$value->tipe_rasio][] = array('hasil' => $value->hasil,'perusahaan'=>$value->perusahaan,'tipe'=>$value->tipe_rasio);

        }

        return view('dashboard.dashboard',['rasio'=>$rasio,'coba'=>$coba,'x'=>$x]);
    }

    public function indexdata(Request $request)
    {

        $new = $this->showdata();
        $data = Rasio::select('name')->groupBy('name')->get();
        $add =  Rasio::select('name')->groupBy('name')->get();
        return view('dashboard.data.data',['data'=>$data,'new'=>$new,'add'=>$add]);
    }



    public function api($url)
    {
        $curl = curl_init();
        // curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($curl, CURLOPT_HEADER, 1);
    //   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    //   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    //         "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0",
    //         "Accept: */*",
    //         "Accept-Language: en-US,en;q=0.5",
    //         "accept-encoding: gzip, deflate, br",
    //         "referer: https://www.bareksa.com/id/reksadana/online?refcode=adwords&campaign=google&gclid=CjwKCAiAob3vBRAUEiwAIbs5TizPsrq89yTnC_G3DAhRGyV6hmrlFq7-zahRhidd64kPr_b5wEENjBoCKJEQAvD_BwE",
    //         "sec-fetch-mode: cors",
    //         "x-ajax-token: 50f32c83ede0ee439739a05f273ecd42",
    //         "x-requested-with: XMLHttpRequest"

    //   ));
        // curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result,true);
    }

    public function mandiri()
    {
        // $url = file_get_contents('https://www.bareksa.com/id/reksadana/online');
        $url = 'https://www.bca.co.id/api/sitecore/Marketplace/GetReksadanaKinerjaGridJsonByParam?manajerInvestasiList=N/A,PT%20Ashmore%20Asset%20Management%20Indonesia,PT%20Bahana%20TCW%20Investment%20Management,PT%20Batavia%20Prosperindo%20Aset%20Manajemen,PT%20BNP%20Paribas%20Asset%20Management,PT%20Danareksa%20Investment%20Management,PT%20Eastspring%20Investments%20Indonesia%20,PT%20First%20State%20Investments%20Indonesia,PT%20Nikko%20Securities%20Indonesia,PT%20Panin%20Asset%20Management,PT%20Schroder%20Investment%20Management%20Indonesia&reksadanaTypeList=PU&_=1575973589797';
        $url = $this->api($url);
       dd($url);
    }

    public function getValid(Request $request)
    {
        $data = 'BMRI';
        $tahun = '2018';
        $periode = 'audit';
        $url = 'https://www.idx.co.id/umbraco/Surface/ListedCompany/GetFinancialReport?indexFrom=0&pageSize=10&year='.$tahun.'&reportType=rdf&periode='.$periode.'&kodeEmiten='.$data.'';
        $url = $this->api($url);
        if($data == 'BBCA'){
            if($tahun == '2019'){
                $url = $url['Results'][0]['Attachments'][1]['File_Path'];
            }elseif($tahun == '2018'){
                if($periode == 'tw1'){
                    $url = $url['Results'][0]['Attachments'][4]['File_Path'];
                }else{
                    $url = $url['Results'][0]['Attachments'][2]['File_Path'];
                }

            }elseif($tahun == '2017'){
                if($periode != 'audit'){
                    $url = $url['Results'][0]['Attachments'][3]['File_Path'];
                }else{
                    $url = $url['Results'][0]['Attachments'][2]['File_Path'];
                }


            }

        }elseif ($data == 'BBRI') {
            if($tahun == '2019'){
                $url = $url['Results'][0]['Attachments'][1]['File_Path'];
            }elseif ($tahun == '2018') {
                $url = $url['Results'][0]['Attachments'][3]['File_Path'];

            }elseif($tahun == '2017'){
                if($periode =='audit' || $periode== 'tw1')
                $url = $url['Results'][0]['Attachments'][1]['File_Path'];
               else{
                $url = $url['Results'][0]['Attachments'][2]['File_Path'];
               }

            }
        }elseif($data == 'BMRI'){
            if($tahun == '2019'){
                if($periode == 'tw1'){
                    $url = $url['Results'][0]['Attachments'][0]['File_Path'];
                }elseif($periode == 'tw2'){
                    $url = $url['Results'][0]['Attachments'][3]['File_Path'];
                }elseif($periode == 'tw3'){
                    $url = $url['Results'][0]['Attachments'][2]['File_Path'];
                }
            }elseif($tahun == '2018'){
                $url = $url['Results'][0]['Attachments'][0]['File_Path'];
            }
        }

        return $url;
    }

    public function getTest()
    {
        return view('cal');
    }


    public function test(Request $request)
    {
        $result = '';
        $data = new calculator;

        if($request->get('submit'))
        {
            $result = $data->getresult($request->get('n1'),$request->get('n2'),$request->get('op'));
        }

        return view('cal',['result'=>$result]);

    }


    public function fetchRasio(Request $request)
    {
        $output = '';
        $rasio = $request->get('action');
        if($rasio == 'rasio' || $rasio == 'rasioku'){
            $data = $request->get('query');
            $query = Rasio::select('tipe_rasio')->where('name',$data)->get();
            // $data = array($request->get('query'));
            $output .= '<option value="tipe">Tipe</option>';
            foreach($query as $row)
            {
                $output .= '<option value="'.$row["tipe_rasio"].'">'.$row["tipe_rasio"].'</option>';
            }
        }
        echo $output;
    }


    public function fetchRasioku(Request $request)
    {
        $output = '';
        $rasio = $request->get('action');
        if($rasio == 'rasio'){
            $data = $request->get('query');
            $query = Rasio::select('tipe_rasio')->where('name',$data)->get();
            // $data = array($request->get('query'));
            $output .= '<option value="tipe">Tipe</option>';
            foreach($query as $row)
            {
                $output .= '<option value="'.$row["tipe_rasio"].'">'.$row["tipe_rasio"].'</option>';
            }
        }
        echo $output;
    }


    public function rasio(Request $request)
    {
        $result = '';
        $data = new rasiocal;
        $tipe = $request->get('tipe');
        if($tipe == 'Rasio Lancar' || $tipe == 'Cakupan Bunga' || $tipe == 'Utang Terhadap Ekuitas' || $tipe == 'Utang Terhadap Total Aset' ||
            $tipe == 'Rasio Kas atas Aktiva Lancar' || $tipe == 'Rasio Kas atas Hutang Lancar' ||
            $tipe == 'Rasio Aktiva Lancar dan Total Aktiva' || $tipe == 'Margin Laba' || $tipe == 'Return on Asset' || $tipe == 'Return On Investment' ||
            $tipe == 'Return on Total Asset' || $tipe == 'Basic Earning Power' || $tipe == 'Earning Per Share' || $tipe == 'Contribution Margin' ||
            $tipe == 'Rasio Rentabilitas' || $tipe == 'Inventori Turn Over' || $tipe == 'Receivable Turn Over' || $tipe == 'Fixed Asset Turn Over' || $tipe == 'Total Asset Turn Over' || $tipe == 'Periode Penagihan Piutang')
            {
                    if($tipe == 'Rasio Lancar'){
                        $desc = 'Semakin tinggi angka rasio lancar, maka semakin besar kemampuan perusahaan untuk membayar liabilitas jangka pendeknya. Namun, rasio ini tidak memperhitungkan likuiditas setiap komponen aset sehingga bisa dianggap sebagai ukuran kasar dari likuiditas perusahaan';
                    }elseif($tipe == 'Rasio Cepat'){
                        $desc = 'Semakin Tinggi angka rasio cepat, maka semakin besar kemampuan perusahaan untuk membayar liabilitas jangka pendeknya. Rasio ini memberikan ukuran likuiditas yang lebih konservatif dibandingkan dengan rasio lancar karena mengeluarkan aset lancar yang paling tidak likuid yaitu persediaan';
                    }elseif($tipe == 'Utang Terhadap Ekuitas'){
                        $desc = 'Semakin Rendah rasio utang terhadapa ekuitas, semakin tinggi tingkat pendanaan perusahaan yang disediakan oleh pemegang saham. Rasio ini akan bergantung pada sifat bisnis dan arus kas. perusahaan dengan kas stabil biasanya memiliki rasio utang terhadap ekuitas yang lebih besar.';
                    }elseif($tipe == 'Utang Terhadap Total Aset'){
                        $desc = 'Semakin rendah rasio utang terhadap total asset, maka semakin rendah resiko keuangan yang dimiliki perusahaan. hal ini karena aset lebih banyak dibiayai dengan ekuitas jika dibandingkan dengan utang.
                        ';
                    }else{
                        $desc = '';
                    }
            $result = $data->getresult($request->get('data1'),$request->get('data2'),$request->get('tipe'));

            $save = new Data;
            $save->perusahaan = $request->get('perusahaan');
            $save->rasio = $request->get('rasio');
            $save->tipe_rasio = $request->get('tipe');
            $save->hasil = $result;
            $save->data1 = json_encode($request->get('label1'));
            $save->data2 = json_encode($request->get('label2'));
            $save->description = $desc;
            $save->save();


        }elseif($request->get('tipe') == 'Rasio Cepat' || $tipe == 'Aktiva Lancar atas Total Hutang'){
            $result = $data->rasiocepat($request->get('data1'),$request->get('data2'),$request->get('tipe'),$request->get('data3'));
            $save = new Data;
            $save->perusahaan = $request->get('perusahaan');
            $save->rasio = $request->get('rasio');
            $save->tipe_rasio = $request->get('tipe');
            $save->hasil = $result;
            $save->data1 = json_encode($request->get('label1'));
            $save->data2 = json_encode($request->get('label2'));
            $save->data3 = json_encode($request->get('label3'));
            $save->save();
        }

        $data = Data::where('tipe_rasio',$tipe)->get();
        $pie = Piechart::where('type',$tipe)->first();
        $arr = [];
            foreach($data as $row){
                $arr[] = array('name'=>$row->perusahaan,'y'=>$row->hasil);
            }

        $hasil = json_encode($arr);

        if(empty($pie)){
            $new = new Piechart;
            $new->type = $tipe;
            $new->data = $hasil;
            $new->save();
        }else{
            $old = Piechart::where('type',$tipe)->first();
            $old->data = $hasil;
            $old->save();
        }

        echo $result;
    }


    public function insertdata(Request $request)
    {
        if($request->get('save')){
            $data = new Data;
            $data->perusahaan = $request->get('perusahaan');
            $data->rasio = $request->get('rasio');
            $data->tipe_rasio = $request->get('tipe');
            $data->hasil = $request->get('hasil');
            $data->save();

            $saved = '
            <tr>
                    <td class="display_perusahaan">'.$data->perusahaan.'</td>
                        <td class="display_rasio">'.$data->rasio.'</td>
                        <td class="display_tipe">'.$data->tipe_rasio.'</td>
                        <td class="display_hasil">'.$data->hasil.'</td>
                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <button class="dropdown-item editdataku"  data-id="'.$data->id.'">Edit</button>
                              <button class="dropdown-item delete"  data-id="'.$data->id.'">Delete</button>
                              <button class="dropdown-item laporan"  data-id="'.$data->id.'" >Laporan</button>
                            </div>
                          </div>
                        </td>
            </tr>';

            echo $saved;
        }

    }


    public function showdata()
    {

        $data = Data::all();

        $new = '<tbody id="display_area">';

        foreach($data as $row){
                $new .= '<tr>
                <td class="display_perusahaan">'.$row->perusahaan.'</td>
            <td class="display_rasio">'.$row->rasio.'</td>
            <td class="display_tipe">'.$row->tipe_rasio.'</td>
            <td class="display_hasil">'.$row->hasil.'</td>
            <td class="text-right">
              <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <button class="dropdown-item editdataku"  data-id="'.$row->id.'">Edit</button>
                  <button class="dropdown-item delete"  data-id="'.$row->id.'">Delete</button>
                  <button class="dropdown-item laporan"  data-id="'.$row->id.'" >Laporan</button>
                </div>
              </div>
            </td>
            </tr>';
        }

         $new .= '</tbody>';

         return $new;


    }


    public function deletedata(Request $request)
    {
        if($request->get('delete')){
            $data = Data::find($request->get('id'));
            $all = Data::where('tipe_rasio',$data->tipe_rasio)->get();
            $data->delete();
            $arr = [];

            foreach($all as $row){
                $arr[] = array('name'=>$row->perusahaan,'y'=>$row->hasil);
            }

            $hasil = json_encode($arr);
            $pie = Piechart::where('type',$data->tipe_rasio)->first();
            $pie->data = $hasil;
            $pie->save();

        }

    }

    public function fetchdata()
    {

        $data = Data::paginate(10);
        $new ='';
        foreach($data as $row){
                $new .= '<tr>
                <td class="display_perusahaan">'.$row->perusahaan.'</td>
            <td class="display_rasio">'.$row->rasio.'</td>
            <td class="display_tipe">'.$row->tipe_rasio.'</td>
            <td class="display_hasil">'.$row->hasil.'</td>
            <td class="text-right">
              <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <button class="dropdown-item editdataku"  data-id="'.$row->id.'">Edit</button>
                  <button class="dropdown-item delete"  data-id="'.$row->id.'">Delete</button>
                  <button class="dropdown-item laporan"  data-id="'.$row->id.'" >Laporan</button>
                </div>
              </div>
            </td>
            </tr>';
        }
         echo $new;
    }



    public function editdata(Request $request)
    {
        $html = '';

            $data = Data::find(18);
            $html .= '<div class="form-group">
            <label for="exampleInputEmail1">Perusahaan</label>
            <input type="text" id="perusahaanedit" name="perusahaanedit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$data->perusahaan.'">
          </div>
          <div class="form-group">
          <label for="exampleInputPassword1">Rasio</label>
          <select class="custom-select my-1 mr-sm-2" id="tahun" name="tahun">
              <option value="Tahun">Tahun</option>
              <option value="Rasio Solvabilitas">'.$data->rasio.'</option>
            </select>
      </div>
      <div class="form-group">
              <label for="exampleInputPassword1">Tipe Rasio</label>
              <select class="custom-select my-1 mr-sm-2" id="tahun" name="tahun">
              <option value="Tahun">Tahun</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
            </select>
          </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Hasil</label>
              <input type="text" id="hasiledit" name="hasiledit" class="form-control" id="exampleInputPassword1" value="'.$data->hasil.'" >
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" name="saveadd" class="btn btn-primary" id="saveadd">Save changes</button>';

        echo $html;
    }


    public function postanggal(Request $request)
    {
        $date1 = $request->get('tanggal');

        $ts1 = strtotime($date1);
        $year1 = date('Y', $ts1);
        $year2 = date('Y');
        $month1 = date('m', $ts1);
        $month2 = date('m');
        $diff = (($year1 - $year2) * 12) + ($month1 - $month2);
        // $data = new DateTime($data);
        $date1 = new DateTime($date1);
        $data2 = new DateTime(Date('Y-m-d'));
        $tahun =$data2->diff($date1)->y;

        $hitung = new rasiocal;
        $tipe = $request->get('hitung');

        if($tipe){
            $result = $hitung->hitungfv($tahun,$request->get('future'),$diff, $tipe);
            echo $result;
        }

    }


    public function getData()
    {
        $data = Data::all();
        foreach($data as $row ){
            $row = $row->data1;
            $data = json_decode($row)->tipe;
            echo $data;
        }
    }

    public function laporan($id)
    {
        $data = Data::find($id);

        return view('dashboard.laporan.index',['data'=>$data]);
    }


    public function indexperhitungan(Request $request)
    {

        $new = $this->showdata();
        $data = Rasio::select('name')->groupBy('name')->get();
        $add =  Rasio::select('name')->groupBy('name')->get();
        return view('dashboard.perhitungan.data',['data'=>$data,'new'=>$new,'add'=>$add]);
    }

    public function piechart()
    {
        $rasio = Rasio::all();
        $coba = Data::select('tipe_rasio')->groupBy('tipe_rasio')->get();
        $tipe = Data::all();

        $x = Piechart::all();
        return view('dashboard.grafik.index',['rasio'=>$rasio,'coba'=>$coba,'x'=>$x]);
    }

    public function piejson()
    {
        $rasio = Rasio::all();
        $coba = Data::select('tipe_rasio')->groupBy('tipe_rasio')->get();

        $a = [];
        $b = [];
        $rasiocepat = [];
        $tipe = Data::all();
            $x = [];
            $json = [];

            $aku = [];
        foreach ($tipe as $key => $value) {
            $item = $value->tipe_rasio;
            $json[] = [$item=>$value->hasil];
            $aku[] = $value->tipe_rasio;
            $x[$value->tipe_rasio][] = array('hasil' => $value->hasil,'perusahaan'=>$value->perusahaan,'tipe'=>$value->tipe_rasio);

        }
        return response()->json(['coba'=>$coba,'x'=>$x]);
    }

    public function testarray()
    {
        $tipe = Data::all();
        $x = [];
        $json = [];

        $aku = [];
    // foreach ($tipe as $key => $value) {
    //     $category = Data::select('tipe_rasio')->where('tipe_rasio',$tipe[$key])->groupBy('tipe_rasio')->get();
    //     $y[$category] = $value;

    //     array_push($x,$y);
    // }


    $coba = Data::select('tipe_rasio')->groupBy('tipe_rasio')->get();

    foreach($coba as $key => $value){
        $hasil = Data::where('tipe_rasio',$coba[$key]->tipe_rasio)->get();

        $y[$value->tipe_rasio] = $hasil;
        array_push($x,$y);
    }

    foreach($x as $saya){
        dd($saya);
    }





    }


    public function pie()
    {
        $data = Data::where('tipe_rasio','Utang Terhadap Ekuitas')->get();
        $pie = Piechart::where('type','Utang Terhadap Ekuitas')->first();
        $arr = [];
      foreach($data as $row){
        $arr[] = array('name'=>$row->perusahaan,'y'=>$row->hasil);
      }

      $hasil = json_encode($arr);

    }
}
