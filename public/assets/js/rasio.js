

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
           }else if($('#tipe').val() == 'Rasio Kas atas Aktiva Lancar'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Kas</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Kas" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Aktiva Lancar</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Aktiva Lancar" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Rasio Kas atas Hutang Lancar'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Kas</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Kas" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Hutang Lancar</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Hutang Lancar" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Rasio Aktiva Lancar dan Total Aktiva'){
            $('#inputhitung').html('<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Aktiva Lancar</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Aktiva Lancar" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Total Aktiva</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Total Aktiva" >'+
                                        '</div>'+
                                    '</div>');
           }else if($('#tipe').val() == 'Aktiva Lancar atas Total Hutang'){
            $('#inputhitung').html('<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data1">Aktiva Lancar</label>'+
                                                '<input type="number" name="data1" id="data1" class="form-control form-control-alternative" placeholder="Aktiva Lancar" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data3">Total Hutang</label>'+
                                                '<input type="number" name="data3" id="data3" class="form-control form-control-alternative" placeholder="Total Hutang" >'+
                                        '</div>'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                        '<div class="form-group focused">'+
                                                '<label class="form-control-label" for="data2">Hutang Jangka Panjang</label>'+
                                                '<input type="number" name="data2" id="data2" class="form-control form-control-alternative" placeholder="Hutang Jangka Panjang" >'+
                                        '</div>'+
                                    '</div>');
           }
           else if($('#tipe').val() == 'Cakupan Bunga'){
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
           }else if($('#tipe').val() == 'Utang Terhadap Total Aset'){
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
            url:"/admin/hitung",
            method:"POST",
            data:form_data,
            success:function(data)
            {

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
