

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
        url: '/admin/newdata',
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
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '/admin/delete',
                    type: 'GET',
                    data: {
                    'delete': 1,
                    'id': id,
                  },
                  success: function(response){
                    // remove the deleted comment
                    fetch_data();
                    console.log(response);
                    $clicked_btn.parent().remove();
                  }
                  });
            }
          })

    });


    function fetch_data(){


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url:"/admin/fetchdata",
        method:"POST",
        success:function(data)
        {
            $('#display_area').html(data);
        }
    });
    }

});

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


$(document).ready(function(){


    function fetch_data(){


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                url:"/admin/fetchdata",
                method:"POST",
                success:function(data)
                {
                    $('#display_area').html(data);
                }
            });
            }


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
                                                '<label class="form-control-label" for="data1" id="label1">Aset Lancar</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Aset Lancar" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Hutang Lancar</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Hutang Lancar" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Rasio Cepat'){
            $('#inputhitung').html('<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Aset Lancar</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Aset Lancar" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data3" id="label3">Persediaan</label>'+
                                                '<input type="number" name="data3" id="data3" class="form-control form-control-alternative" placeholder="Persediaan" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Hutang Lancar</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Hutang Lancar" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Rasio Kas atas Aktiva Lancar'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Kas</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Kas" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Aktiva Lancar</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Aktiva Lancar" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Rasio Kas atas Hutang Lancar'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Kas</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Kas" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Hutang Lancar</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Hutang Lancar" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Rasio Aktiva Lancar dan Total Aktiva'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Aktiva Lancar</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Aktiva Lancar" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Total Aktiva</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Total Aktiva" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Aktiva Lancar atas Total Hutang'){
            $('#inputhitung').html('<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Aktiva Lancar</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Aktiva Lancar" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data3" id="label3">Total Hutang</label>'+
                                                '<input type="number" name="data3" id="data3" class="form-control form-control-alternative" placeholder="Total Hutang" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Hutang Jangka Panjang</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Hutang Jangka Panjang" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Cakupan Bunga'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Laba sebelum bunga dan laba</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Laba sebelum bunga dan laba" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Beban Bunga</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Beban Bunga" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Utang Terhadap Ekuitas'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Total Hutang</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Total Hutang" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Ekuitas</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Ekuitas" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Utang Terhadap Total Aset'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Total Hutang</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Total Hutang" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Total Aset</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Total Aset" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Margin Laba'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Pendapatan Bersih</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Pendapatan Bersih" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Penjualan</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Penjualan" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Return on Asset'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Penjualan Bersih</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Penjualan Bersih" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Total Aktiva</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Total Aktiva" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Return On Investment'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Laba Bersih</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Laba Bersih" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Rata-rata Modal</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Rata-rata Modal" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Return on Total Asset'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Laba Bersih</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Laba Bersih" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Rata-rata Total Aset</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Rata-rata Total Aset" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Basic Earning Power'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Laba sebelum bunga dan Pajak</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Laba sebelum bunga dan Pajak" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Total Aktiva</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Total Aktiva" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Earning Per Share'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Laba sebagian saham bersangkutan</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Laba sebagian saham bersangkutan" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Jumlah Saham</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Jumlah Saham" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Contribution Margin'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Laba Kotor</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Laba Kotor" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Penjualan</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Penjualan" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Rasio Rentabilitas'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Jumlah Laba</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Jumlah Laba" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Jumlah Karyawan</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Jumlah Karyawan" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Inventori Turn Over'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Harga Pokok Penjualan</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Harga Pokok Penjualan" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Rata-rata Persediaan Barang</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Rata-rata Persediaan Barang" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Receivable Turn Over'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Penjualan Kredit Bersih</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Penjualan Kredit Bersih" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Rata-rata Piutang</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Rata-rata Piutang" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Fixed Asset Turn Over'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Penjualan</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Penjualan" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Aktiva Tetap Bersih</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Aktiva Tetap Bersih" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Total Asset Turn Over'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Penjualan</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Penjualan" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Total Asset</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Total Asset" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Periode Penagihan Piutang'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1" id="label1">Piutang (Rata-rata)</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Piutang (Rata-rata)" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2" id="label2">Penjualan Perhari</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Penjualan Perhari" >'+
                                        '</div>'+
                                    '</div>');
           }else{
            $('#inputhitung').html('');
           }


			if(action == 'rasio')
			{
				result = 'tipe';
			}

			$.ajax({
				url:'/admin/fetch',
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
        var label1 = $('#label1').text();
        var label2 = $('#label2').text();
        var label3 = $('#label3').text();
        var data2 = $('#data2').val();
        var data3 = $('#data3').val();
        var perusahaan = $('#tipe_perusahaan').val();
        var form_data = $('#form_data').serialize();
        var dataku = {'tipe':tipe,
                    'rasio':rasio,
                    'data1':data1,
                    'data2':data2,
                    'data3':data3,
                    'perusahaan':perusahaan,
                    'label1':{"data":data1, "tipe":label1},
                    'label2':{"data":data2, "tipe":label2},
                    'label3':{"data":data3, "tipe":label3},
            };
            console.log(dataku);
        if(tipe == 'tipe' || rasio == 'rasio'){
            swal("Fail", "Please select the option", "error");
        }else if(data1 == '' || data2 == '' || data3 == ''){
            swal("Fail", "Please input the data", "error");
        }
        // console.log(form_data, label1);
        else{
            $.ajax({
            url:"/admin/hitung",
            method:"POST",
            data:dataku,
            success:function(data)
            {
                fetch_data();
                $('#form_data')[0].reset();
                $('#hasilnya').html('Hasilnya : '+data);
                swal("Berhasil", "Hasilnya :"+data, "success");
                $('#inputhitung').html('');
            }
        });
        }



});
});


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
                url:'/admin/fetch',
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


$(document).on('click','.laporan', function(){
    var id = $(this).data('id');
        window.location.href = '/admin/'+id+'/laporan';
});
