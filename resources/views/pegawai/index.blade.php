<!doctype html>
<html class="no-js">
<head>
    <meta charset="UTF-8">
    <title>No left sidebar | Admire</title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/> -->
    <!-- Global styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jquery-validation-engine/css/validationEngine.jquery.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_validations.css')}}" />

    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}} " />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/buttons.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_validations.css')}}" />
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <!-- End of Global styles -->
</head>
<body>
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div id="wrap">
    
    <!-- /#top -->
    <div class="wrapper">
        <div id="content" class="bg-container">
            
            <div class="outer">
                <div class="inner bg-light lter bg-container">
                    <div class="card" id="menuDepan">
                        <div class="card-header bg-white">
                            Data Pegawai
                        </div>
                        <div class="card-block card_block_top_align ">
                            <div class="table-toolbar">
                                <div class="btn-group">
                                    <a id="btnAdd" class=" btn btn-default">
                                        Tambah <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group float-right users_grid_tools">
                                    <div class="tools"></div>
                                </div>
                            </div>
                            <div style="margin-top: 10px;">

                                <table id="tbl_karyawan" class="display table table-stripped table-bordered">
                                    <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >NIP</th>
                                        <th >Nama</th>
                                        <th >NaAlamat</th>
                                        <th >KTP</th>
                                        <th >Aksi</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody id="show_data">
                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        
                    </div>
                    <div class="card m-t-35" id="menuInput" style="display: none;">
                        <div class="card-header bg-white">
                            Input Data Pegawai
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="card-block">
                            <form class="form-horizontal login_validator" id="formSave">
                                {{ csrf_field() }}
                               <div class="form-group row m-t-35">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtNama" class="col-form-label">Nama</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                                <input type="text" id="txtNama" name="txtNama" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtAlamat" class="col-form-label">Alamat</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <textarea class="form-control form-control-sm" rows="3" name="txtAlamat" id="txtAlamat" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtKTP" class="col-form-label">No KTP</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                 <input type="text" id="txtKTP" name="txtKTP" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group-tab row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label class="col-form-label">Pendidikan</label>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <button id="btnRow_del" class="btn btn-secondary float-end btn-sm" type="button" style="display: none;">
                                            Hapus
                                        </button>
                                        <button id="btnRow_pend" class="btn btn-secondary float-end btn-sm" type="button">
                                            Tambah
                                        </button>
                                        <table class="table table-bordered" id="tbl_pend">
                                            <tr id="default-row">
                                                <td>Nama Sekolah / Universitas</td>
                                                <td>Jurusan</td>
                                                <td>Tahun Masuk</td>
                                                <td>Tahun Lulus</td>
                                            </tr> 
                                            <tr>
                                                <td><input type="text" id="asal[]" name="asal[]" class="form-control form-control-sm" required=""></td>
                                                <td><input type="text" id="jurusan[]" name="jurusan[]" class="form-control form-control-sm" required=""></td>
                                                <td><input type="text" id="thn_masuk[]" name="thn_masuk[]" class="form-control form-control-sm" required=""></td>
                                                <td><input type="text" id="thn_lulus[]" name="thn_lulus[]" class="form-control form-control-sm" required=""></td>
                                            </tr> 
                                        </table>
                                    </div>

                                    <div class="form-group-tab row">
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Pengalaman Kerja</label>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <button id="btnRow_delPra" class="btn btn-secondary float-end btn-sm" type="button" style="display: none;">
                                            Hapus
                                        </button>
                                        <button id="btnRow_Pra" class="btn btn-secondary float-end btn-sm" type="button">
                                            Tambah
                                        </button>
                                        <table class="table table-bordered" id="tbl_pra">
                                            <tr id="default-row">
                                                <td>Perusahaan</td>
                                                <td>Jabatan</td>
                                                <td>Tahun</td>
                                                <td>Keterangan</td>
                                            </tr> 
                                            <tr>
                                                <td><input type="text" id="perusahaan[]" name="perusahaan[]" class="form-control form-control-sm" required=""></td>
                                                <td><input type="text" id="jabatan[]" name="jabatan[]" class="form-control form-control-sm" required=""></td>
                                                <td><input type="text" id="tahun[]" name="tahun[]" class="form-control form-control-sm" required=""></td>
                                                <td><input type="text" id="ket[]" name="ket[]" class="form-control form-control-sm" required=""></td>
                                            </tr> 
                                        </table>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-2 col-xl-1 col-md-2 col-sm-2 col-xs-2 text-lg-right">
                                            <div class="col-lg-2 col-xl-1 col-md-2 col-sm-2 col-xs-2 text-lg-right">
                                                <div class="btn btn-primary layout_btn_prevent" id="btnSimpan" >Simpan</div>    
                                            </div>

                                            

                                    </div>
                                    </div>

                                
                            </form>
                        </div>
                    </div>
                    <div class="card m-t-35" id="menuView" style="display: none;">
                        <div class="card-header bg-white">
                            Data Pegawai
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeView">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="card-block">
                            <form class="form-horizontal" id="form_view">
                                
                               <div class="form-group row m-t-35">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtNamaView" class="col-form-label">Nama</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                                <input readonly type="text" id="txtNamaView" name="txtNamaView" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtAlamatView" class="col-form-label">Alamat</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <textarea readonly class="form-control form-control-sm" rows="3" name="txtAlamatView" id="txtAlamatView"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtKTPView" class="col-form-label">No KTP</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                 <input readonly type="text" id="txtKTPView" name="txtKTPView" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group-tab row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label class="col-form-label">Pendidikan</label>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tbl_view1">
                                            <tr id="default-row">
                                                <td>Nama Sekolah / Universitas</td>
                                                <td>Jurusan</td>
                                                <td>Tahun Masuk</td>
                                                <td>Tahun Lulus</td>
                                            </tr> 
                                            <tbody id="show_view1"> </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group-tab row">
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Pengalaman Kerja</label>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered" id="tbl_view2">
                                            <tr id="default-row">
                                                <td>Perusahaan</td>
                                                <td>Jabatan</td>
                                                <td>Tahun</td>
                                                <td>Keterangan</td>
                                            </tr> 
                                            <tbody id="show_view2"> </tbody>
                                        </table>
                                    </div>

                                
                            </form>
                        </div>
                    </div>

                    <div class="card m-t-35" id="menuEdit" style="display: none;">
                        <div class="card-header bg-white">
                            Update Data Pegawai
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeEdit">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="card-block">
                            <form class="form-horizontal login_validator" id="form_edit">
                                {{ csrf_field() }}
                               <div class="form-group row m-t-35">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtNamaEdit" class="col-form-label">Nama</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                                <input type="text" id="txtNamaEdit" name="txtNamaEdit" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtAlamatEdit" class="col-form-label">Alamat</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <textarea class="form-control form-control-sm" rows="3" name="txtAlamatEdit" id="txtAlamatEdit" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label for="txtKTPEdit" class="col-form-label">No KTP</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                 <input type="text" id="txtKTPEdit" name="txtKTPEdit" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group-tab row">
                                        <div class="col-lg-1 text-lg-right">
                                            <label class="col-form-label">Pendidikan</label>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tbl_view1">
                                            <tr id="default-row">
                                                <td>Nama Sekolah / Universitas</td>
                                                <td>Jurusan</td>
                                                <td>Tahun Masuk</td>
                                                <td>Tahun Lulus</td>
                                            </tr> 
                                            <tbody id="show_edit1"> </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group-tab row">
                                        <div class="col-lg-2">
                                            <label class="col-form-label">Pengalaman Kerja</label>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered" id="tbl_view2">
                                            <tr id="default-row">
                                                <td>Perusahaan</td>
                                                <td>Jabatan</td>
                                                <td>Tahun</td>
                                                <td>Keterangan</td>
                                            </tr> 
                                            <tbody id="show_edit2"> </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table style="display: none;" class="table table-bordered" id="tbl_dummy">
                                            <tbody id="show_dummy1"> </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table style="display: none;" class="table table-bordered" id="tbl_dummy2">
                                            <tbody id="show_dummy2"> </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-2 col-xl-1 col-md-2 col-sm-2 col-xs-2 text-lg-right">
                                            <div class="col-lg-2 col-xl-1 col-md-2 col-sm-2 col-xs-2 text-lg-right">
                                                <div class="btn btn-primary layout_btn_prevent" id="btnUpdate" >Update</div>    
                                            </div>

                                    </div>

                                
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal" tabindex="-1" id="modalLoader" role="dialog" aaria-labelledby="modalLabeldanger">
                <div style=" position: fixed; margin-left: 50%; margin-top: 20%; " > 
                        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 50px;" alt="loading..." />
                </div>    
            </div>
        </div>
        <!-- /#content -->
    </div>
    <!--wrapper-->
    
    <!-- # right side -->
</div>

<!--Global scripts-->
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.slim.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>


<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.responsive.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/jquery-validation-engine/js/jquery.validationEngine.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/jquery-validation-engine/js/jquery.validationEngine-en.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/jquery-validation/js/jquery.validate.js')}}"></script>


<!--End of global scripts-->

<script type="text/javascript">
    var arrHead = new Array();
    arrHead = ['Nama', 'Jurusan', 'TahunMasuk', 'TahunLulus']; // table headers.
   
    $('#btnRow_pend').click(function(){
        addRow();
    });

    $('#btnRow_Pra').click(function(){
        addRow_pra();
    });

    $('#btnRow_del').click(function(){
        // removeRow(this);
        removeRow();
    });

    $('#btnRow_delPra').click(function(){
        // removeRow(this);
        removeRow_pra();
    });

    
    function removeRow() {
        // var empTab = document.getElementById('tbl_pend');
        // empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
        var lenRow = $('#tbl_pend tbody tr').length;
    //alert(lenRow);
        if (lenRow == 2 || lenRow <= 2) {
            alert("Sudah tidak bisa mengurangi baris");
            $('#btnRow_del').attr("style", "display:none;");
        } else {
            $('#tbl_pend tbody tr:last').remove();
        }
        // console.log(lenRow);
    }

    function removeRow_pra() {
        // var empTab = document.getElementById('tbl_pend');
        // empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
        var lenRow = $('#tbl_pra tbody tr').length;
    //alert(lenRow);
        if (lenRow == 2 || lenRow <= 2) {
            alert("Sudah tidak bisa mengurangi baris");
            $('#btnRow_delPra').attr("style", "display:none;");
        } else {
            $('#tbl_pra tbody tr:last').remove();
        }
        // console.log(lenRow);
    }

    function addRow() {
        var empTab = document.getElementById('tbl_pend');

        var rowCnt = empTab.rows.length;    // get the number of rows.
        var tr = empTab.insertRow(rowCnt); // table row.
        tr = empTab.insertRow(rowCnt);

        $('#btnRow_del').removeAttr("style");

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);


            var ele = document.createElement('input');
                

            if (c==0) {
                ele.setAttribute('type', 'text');
                ele.setAttribute('id', 'asal[]');
                ele.setAttribute('name', 'asal[]');
                ele.setAttribute('class', 'form-control form-control-sm');
                ele.setAttribute('required', '');
                

                td.appendChild(ele);
            }else if (c==1) {
                ele.setAttribute('type', 'text');
                ele.setAttribute('id', 'jurusan[]');
                ele.setAttribute('name', 'jurusan[]');
                ele.setAttribute('class', 'form-control form-control-sm');
                ele.setAttribute('required', '');
                

                td.appendChild(ele);
            }else if (c==2) {
                ele.setAttribute('type', 'text');
                ele.setAttribute('id', 'thn_masuk[]');
                ele.setAttribute('name', 'thn_masuk[]');
                ele.setAttribute('class', 'form-control form-control-sm');
                ele.setAttribute('required', '');
                

                td.appendChild(ele);
            }else{
                ele.setAttribute('type', 'text');
                ele.setAttribute('id', 'thn_lulus[]');
                ele.setAttribute('name', 'thn_lulus[]');
                ele.setAttribute('class', 'form-control form-control-sm');
                ele.setAttribute('required', '');
                

                td.appendChild(ele);
            }

                



            // if (c == 0) {   // if its the first column of the table.
            //     // add a button control.
            //     var button = document.createElement('input');

            //     // set the attributes.
            //     button.setAttribute('type', 'button');
            //     button.setAttribute('value', 'Remove');

            //     // add button's "onclick" event.
            //     button.setAttribute('onclick', 'removeRow(this)');

            //     td.appendChild(button);
            // }
            // else {
            //     // the 2nd, 3rd and 4th column, will have textbox.
            //     var ele = document.createElement('input');
            //     ele.setAttribute('type', 'text');
            //     ele.setAttribute('value', '');

            //     td.appendChild(ele);
            // }
        }
    }

    function addRow_pra() {
        var empTab = document.getElementById('tbl_pra');

        var rowCnt = empTab.rows.length;    // get the number of rows.
        var tr = empTab.insertRow(rowCnt); // table row.
        tr = empTab.insertRow(rowCnt);

        $('#btnRow_delPra').removeAttr("style");

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);


            var ele = document.createElement('input');
                
            if (c==0) {
                ele.setAttribute('type', 'text');
                ele.setAttribute('id', 'perusahaan[]');
                ele.setAttribute('name', 'perusahaan[]');
                ele.setAttribute('class', 'form-control form-control-sm');
                ele.setAttribute('required', '');
                
                

                td.appendChild(ele);
            }else if (c==1) {
                ele.setAttribute('type', 'text');
                ele.setAttribute('id', 'jabatan[]');
                ele.setAttribute('name', 'jabatan[]');
                ele.setAttribute('class', 'form-control form-control-sm');
                ele.setAttribute('required', '');
                
                

                td.appendChild(ele);
            }else if (c==2) {
                ele.setAttribute('type', 'text');
                ele.setAttribute('id', 'tahun[]');
                ele.setAttribute('name', 'tahun[]');
                ele.setAttribute('class', 'form-control form-control-sm');
                ele.setAttribute('required', '');
                
                

                td.appendChild(ele);
            }else{
                ele.setAttribute('type', 'text');
                ele.setAttribute('id', 'ket[]');
                ele.setAttribute('name', 'ket[]');
                ele.setAttribute('class', 'form-control form-control-sm');
                ele.setAttribute('required', '');
                
                

                td.appendChild(ele);
            }
                



            // if (c == 0) {   // if its the first column of the table.
            //     // add a button control.
            //     var button = document.createElement('input');

            //     // set the attributes.
            //     button.setAttribute('type', 'button');
            //     button.setAttribute('value', 'Remove');

            //     // add button's "onclick" event.
            //     button.setAttribute('onclick', 'removeRow(this)');

            //     td.appendChild(button);
            // }
            // else {
            //     // the 2nd, 3rd and 4th column, will have textbox.
            //     var ele = document.createElement('input');
            //     ele.setAttribute('type', 'text');
            //     ele.setAttribute('value', '');

            //     td.appendChild(ele);
            // }
        }
    }

    $('#btnAdd').click(function(){
        $('#modalLoader').modal('show');
        $('#formSave').attr('action', '/pegawai/post_id');
        $('#menuInput').removeAttr("style");
        $('#menuDepan').attr("style", "display: none;");
        $('#modalLoader').modal('hide');
        $('#formSave').trigger('reset');
    });

    $('#btnSimpan').click(function(){
        // tambahData();
        $("#formSave").valid();
        cek_kodeKaryawan();
    });

    $('#btnUpdate').click(function(){
        // tambahData();
        update_karyawan();
    });





    function update_karyawan(){
        var data = $('#form_edit').serialize();
        var link = $('#form_edit').attr('action');

        $.ajax({
            type: 'ajax',
            method: 'POST',
            async: false,
            dataType: 'json',
            url: link,
            data: data,
            success: function(response) {
                $('#menuEdit').attr('style', 'display: none;');
                $('#menuDepan').removeAttr('style');
                tampilData();

            }
        });
    }

     function cek_kodeKaryawan(){
        var data = $('#formSave').serialize();
        var link = $('#formSave').attr('action');

        $.ajax({
            type: 'ajax',
            method: 'POST',
            async: false,
            dataType: 'json',
            url: link,
            data: data,
            success: function(data) {
                $('#menuInput').attr('style', 'display: none;');
                $('#menuDepan').removeAttr('style');
                tampilData();

            }
        });
        

    }

    function tambahData(){
        var data = $('#formSave').serialize();

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '/pegawai/add',
            data: data,
            async: false,
            dataType: 'json',
            success: function(response) {

                // alert(data);
                console.log(response);

            },
            error: function() {
                alert('Input data user gagal');
            }
        });


    }

    tampilData();

    $('#close').click(function(){
        $('#menuDepan').removeAttr('style');
        $('#menuInput').attr('style', 'display: none;');
        $('#formSave').trigger('reset');
        tampilData();
    });

    function tampilData(){
    $.ajax({
        type  : 'get',
        url   : '/pegawai/get',
        async : false,
        dataType : 'json',
        success : function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html += '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].id_karyawan+'</td>'+
                        '<td>'+data[i].nama+'</td>'+
                        '<td>'+data[i].alamat+'</td>'+
                        '<td>'+data[i].KTP+'</td>'+
                        '<td>' +
                        '<a href = "javascript:;" class="item-view" data="' +
                        data[i].id_karyawan +
                        '" style="margin-right: 15px"><i class="fa fa-eye text-success"></i></a>' +
                        '<a href = "javascript:;" class="item-edit" data="' +
                        data[i].id_karyawan +
                        '"  style="margin-right: 15px"><i class="fa fa-pencil text-warning"></i></a>' +
                        '<a href = "javascript:;" class="item-delete danger_clr" data="' +
                        data[i].id_karyawan +
                        '"><i class="fa fa-trash text-danger"></i></a>' +
                        '</td>' +
                        '</tr>';
            }
            $('#show_data').html(html);
           // console.log(data);
        }

    });
}

$('#show_data').on('click', '.item-view', function(){
    var id = $(this).attr('data');

    $.ajax({
            type: 'ajax',
            method: 'get',
            url: '/pegawai/view/'+id,
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var html2 = '';
                var i;      
                // console.log(data[0].nama_depan);
                console.log(data);
                $('#menuDepan').attr("style", "display: none;");
                $('#menuView').removeAttr('style');
                $('#txtNamaView').val(data.pend[0].nama);
                $('#txtAlamatView').val(data.pend[0].alamat);
                $('#txtKTPView').val(data.pend[0].KTP);
                for(i=0; i<data.pend.length; i++){
                    html += '<tr>'+
                            '<td>'+data.pend[i].sekolah_asal+'</td>'+
                            '<td>'+data.pend[i].jurusan+'</td>'+
                            '<td>'+data.pend[i].tahun_masuk+'</td>'+
                            '<td>'+data.pend[i].tahun_lulus+'</td>'+
                            '</tr>';
                }

                for(i=0; i<data.pra.length; i++){

                    html2 += '<tr>'+
                            '<td>'+data.pra[i].perusahaan+'</td>'+
                            '<td>'+data.pra[i].jabatan+'</td>'+
                            '<td>'+data.pra[i].tahun+'</td>'+
                            '<td>'+data.pra[i].keterangan+'</td>'+
                            '</tr>';
                }


                $('#show_view1').html(html);
                $('#show_view2').html(html2);

                
                
            },
            error: function() {
                alert('Tidak Bisa Melakukan Edit Data!');
            }
        });

});

$('#closeView').click(function(){
    $('#menuDepan').removeAttr('style');
    $('#menuView').attr('style', 'display: none;');
    $('#form_view').trigger('reset');
    tampilData();
});

$('#closeEdit').click(function(){
    $('#menuDepan').removeAttr('style');
    $('#menuEdit').attr('style', 'display: none;');
    $('#form_edit').trigger('reset');
    tampilData();
});


$('#show_data').on('click', '.item-edit', function(){
    var id = $(this).attr('data');

    // var table = 'siswa';
    $('#form_edit').attr('action', '/pegawai/update/'+id);

    $.ajax({
            type: 'ajax',
            method: 'get',
            url: '/pegawai/edit/'+id,
            async: false,
            dataType: 'json',
            success: function(data) {
                var html='';
                var html2='';
                var html3='';
                var html4='';
                var i;
                console.log(data);
                $('#menuDepan').attr("style", "display: none;");
                $('#menuEdit').removeAttr('style');
                $('#txtNamaEdit').val(data.pend[0].nama);
                $('#txtAlamatEdit').val(data.pend[0].alamat);
                $('#txtKTPEdit').val(data.pend[0].KTP);



                for(i=0; i<data.pend.length; i++){
                    html += '<tr>'+
                            '<td><input type="text" id="asal[]" name="asal[]" class="form-control form-control-sm" required="" value="'+data.pend[i].sekolah_asal+'"></td>'+
                            '<td><input type="text" id="jurusan[]" name="jurusan[]" class="form-control form-control-sm" required="" value="'+data.pend[i].jurusan+'"></td>'+
                            '<td><input type="text" id="thn_masuk[]" name="thn_masuk[]" class="form-control form-control-sm" required="" value="'+data.pend[i].tahun_masuk+'"></td>'+
                            '<td><input type="text" id="thn_lulus[]" name="thn_lulus[]" class="form-control form-control-sm" required="" value="'+data.pend[i].tahun_lulus+'"></td>'+
                            '</tr>';

                }



                for(i=0; i<data.pra.length; i++){
                    html2 += '<tr>'+
                            '<td><input type="text" id="perusahaan[]" name="perusahaan[]" class="form-control form-control-sm" required="" value="'+data.pra[i].perusahaan+'"></td>'+
                            '<td><input type="text" id="jabatan[]" name="jabatan[]" class="form-control form-control-sm" required="" value="'+data.pra[i].jabatan+'"></td>'+
                            '<td><input type="text" id="tahun[]" name="tahun[]" class="form-control form-control-sm" required="" value="'+data.pra[i].tahun+'"></td>'+
                            '<td><input type="text" id="ket[]" name="ket[]" class="form-control form-control-sm" required="" value="'+data.pra[i].keterangan+'"></td>'+
                            '<input type="text" id="id_pra[]" name="id_pra[]" class="form-control form-control-sm" required="" value="'+data.pra[i].id+'" style:"display: none;">'+
                            '</tr>';
                }

                for(i=0; i<data.pend.length; i++){
                    html3 += '<tr>'+
                            '<td><input type="text" id="txtid1[]" name="txtid1[]" class="form-control form-control-sm" required="" value="'+data.pend[i].id+'"></td>'+
                            
                            '</tr>';

                }

                for(i=0; i<data.pra.length; i++){
                    html4 += '<tr>'+
                            '<td><input type="text" id="txtid2[]" name="txtid2[]" class="form-control form-control-sm" required="" value="'+data.pra[i].id+'"></td>'+
                            
                            '</tr>';

                }

                $('#show_edit1').html(html);
                $('#show_edit2').html(html2);
                $('#show_dummy1').html(html3);
                $('#show_dummy2').html(html4);

            },
            error: function() {
                alert('Tidak Bisa Melakukan Edit Data!');
            }
        });

});



$('#show_data').on('click', '.item-delete', function(){
    var id=$(this).attr('data');

        $.ajax({
            type: 'ajax',
            method: 'GET',
            async: false,
            dataType: 'json',
            url: '/pegawai/hapus/'+id,
            success: function(response) {
                tampilData();

            }
        });

});

$("#formSave").validate({
        rules: {
            txtNama: "required"
        },
        messages: {
            txtNama: "Please specify your name"
        },
        rules: {
            txtAlamat: "required"
        },
        messages: {
            txtAlamat: "Please specify your name"
        },
        rules: {
            txtKTP: "required"
        },
        messages: {
            txtKTP: "Please specify your name"
        }
    })

$("#form_edit").validate({
        rules: {
            txtNamaEdit: "required"
        },
        messages: {
            txtNamaEdit: "Please specify your name"
        },
        rules: {
            txtAlamatEdit: "required"
        },
        messages: {
            txtAlamatEdit: "Please specify your name"
        },
        rules: {
            txtKTPEdit: "required"
        },
        messages: {
            txtKTPEdit: "Please specify your name"
        }
    })


</script>
</body>

</html>