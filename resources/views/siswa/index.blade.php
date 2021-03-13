<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}">

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-6">
			<h1>Data Siswa</h1>
		</div>
		<div class="col-6">
			<button id="btnTest" class="btn btn-primary float-end btn-sm" type="button">
				Tambah Data Siswa
			</button>
		</div>
		<div class="alert alert-success" style="display: none;">

        </div>	

		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nama Depan</th>
					<th>Nama Belakang</th>
					<th>Jenis Kelamin</th>
					<th>Agama</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="show_data">
				
			</tbody>
		
		</table>

	</div>
</div>

<!-- Modal -->

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="formTambah">
        {{ csrf_field() }}
		  <div class="form-group">
		    <label for="namaDepan">Nama Depan</label>
		    <input type="text" class="form-control" id="namaDepan" name="namaDepan" aria-describedby="namaDepan" placeholder="Masukan Nama Depan">
		  </div>

		  <div class="form-group">
		    <label for="namaBelakang">Nama Belakang</label>
		    <input type="text" class="form-control" id="namaBelakang" name="namaBelakang" aria-describedby="namaBelakang" placeholder="Masukan Nama Belakang">
		  </div>

		  <div class="form-group">
		    <label for="jenisKelamin">Jenis Kelamin</label>
		    <select id="jenisKelamin" name="jenisKelamin" class="form-control">
		    	<option>-- Pilih --</option>
		    	<option value="Pria">Pria</option>
		    	<option value="Wanita">Wanita</option>
		    </select>
		  </div>

		  <div class="form-group">
		    <label for="agama">Agama</label>
		    <input type="text" class="form-control" id="agama" name="agama" aria-describedby="agama" placeholder="Masukan Agama">
		  </div>

		  <div class="form-group">
		    <label for="alamat">Alamat</label>
		    <textarea class="form-control" id="alamat" name="alamat" rows="3"> </textarea>
		  </div>
		  
		  
		

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCancel">Close</button>
        <button type="submit" class="btn btn-primary" id="btnSave">Save changes</button>
       	</form>
      </div>
    </div>
  </div>
</div>

<!-- End Modal -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.slim.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>


<script type="text/javascript">
	
tampilData();

$('#btnTest').click(function(){
	$('#modalTambah').modal('show');
	$('#formTambah').attr('action', '/siswa/create');
	$('#formTambah')[0].reset();
	// tampilData();
});


function tampilData(){
	$.ajax({
	    type  : 'get',
	    url   : '{{ route("dataSiswa") }}',
	    async : false,
	    dataType : 'json',
	    success : function(data){
	        var html = '';
	        var i;
	        for(i=0; i<data.length; i++){
	            html += '<tr>'+
	                    '<td>'+data[i].nama_depan+'</td>'+
	                    '<td>'+data[i].nama_belakang+'</td>'+
	                    '<td>'+data[i].jenis_kelamin+'</td>'+
	                    '<td>'+data[i].agama+'</td>'+
	                    '<td>'+data[i].alamat+'</td>'+
	                    '<td>' +
                        '<a href = "javascript:;" class="item-edit" data="' +
                        data[i].id +
                        '" style="margin-right: 15px"><i class="fa fa-pencil text-warning"></i></a>' +
                        '<a href = "javascript:;" class="item-delete danger_clr" data="' +
                        data[i].id +
                        '"><i class="fa fa-trash text-danger"></i></a>' +
                        '</td>' +
                        '</tr>';
	        }
	        $('#show_data').html(html);
	       // console.log(data);
	    }

	});
}


function tampilData(){
        $('#example1').DataTable( {
            destroy: true,
            "processing": true, 
            "serverSide": true, 
            "autoWidth": false,

            "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",

            "columnDefs": [
                            { "width": "150px", "targets": 2 }
                    ],

            "order": [],

            "ajax": {
                "url": "<?php echo base_url('Divisi/getDivisi'); ?>",
                "type": "POST"
            },
            // "columnDefs": [
            //         { 
            //             "targets": [ 0 ], 
            //             "orderable": false, 
            //         }],
            "searching": false,
            "lengthChange": false,
            "ordering": false
        });
    }


$('#btnSave').click(function(e){

	e.preventDefault();

	var data = $('#formTambah').serialize();
	var link = $('#formTambah').attr('action');

	

	$.ajax({
        type: 'ajax',
        method: 'post',
        url: link,
        data: data,
        async: false,
        dataType: 'json',
        success: function(response) {

            // alert(data);
            if (response.success) {
            	tampilData();
                $('#modalTambah').modal('hide');
                $('#formTambah')[0].reset();
                if (response.type == "Add") {
                    var type = "Tambah";
                } else if (response.type == "Update") {
                    var type = "Update";
                }

                $('.alert-success').html('' + type + ' Data Siswa Berhasil')
                    .fadeIn().delay(4000).fadeOut('slow');
            } else {
                $('#btnCancel').click();
                tampilData();
            }

        },
        error: function() {
            alert('Input data user gagal');
        }
    });
});

$('#show_data').on('click', '.item-edit', function(){
	var id = $(this).attr('data');
    // var table = 'siswa';
    $('#modalTambah').modal('show');
    $('#formTambah').attr('action', '/siswa/update/'+id);

    $.ajax({
            type: 'ajax',
            method: 'get',
            url: '/siswa/edit/'+id,
            async: false,
            dataType: 'json',
            success: function(data) {
            	// console.log(data[0].nama_depan);
                $('#namaDepan').val(data[0].nama_depan);
                $('#namaBelakang').val(data[0].nama_belakang);
                $('#jenisKelamin').val(data[0].jenis_kelamin);
                $('#agama').val(data[0].agama);
                $('#alamat').val(data[0].alamat);
                
                
            },
            error: function() {
                alert('Tidak Bisa Melakukan Edit Data!');
            }
        });
})

</script>

</body>
</html>