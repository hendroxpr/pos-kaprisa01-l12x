@extends('admin.layouts.main')

@section('contents')

@php
    $kunci1 = auth()->user()->kunci1;
    $kunci2 = auth()->user()->kunci2;    
    $level = auth()->user()->levels;
    foreach ($menu as $item) {
        $idaplikasi = $item->idaplikasi;
    }
@endphp

@if($kunci1==1)
    <div class="container-fluid px-0" style="display:block"> 
@else
    @if($idaplikasi<>$kunci1)
        <div>
            @include('admin.layouts.forbidden')
        </div>

        <div class="container-fluid px-0" style="display:none"> 
    @else
        <div class="container-fluid px-0" style="display:block">
    @endif
@endif


    <div class="box-header mb-3">  
        <div class="row">
            <div class="col-md-6">
                                
            </div>

            <div class="col-md-6">
                <div class="w3-row" align="right"><i class="fa fa-refresh" aria-hidden="true"></i>            
                    <a id="btn_refresh1" name="btn_refresh1" href="{{ url('/') }}{{ $link }}" class="btn bg-success rounded-0" style="text-decoration: none;"><i style="font-size:18px" class="fa">&#xf021;</i> Refresh</a>            
                    <button id="btn_tambah1" name="btn_tambah1" type="button" class="btn bg-primary rounded-0"><i class="fas fa-plus"></i> Tambah</button>
                </div> 
            </div>
        </div>

    </div>

    <!--awal tabel-->        
    <div class="box-body" id="headerjudul" style="display: block;">
        <div id="reload" class="table-responsive">
            <table id="data1" class="table table-bordered table-striped table-hover" style="width: 100%">
                <thead>
                    <tr>
                        <th style="width:10px;">#</th>                            
                        <th style="width:50px">Ecard</th>							
                        <th style="width:50px">NIA</th>
                        <th style="width:50px">KTP</th>
                        <th style="width:150px">Nama Lengkap</th>							
                        <th style="width:50px">Tgl Lahir</th>							
                        <th style="width:50px">Status Profesi</th>							
                        <th style="width:50px">Lembaga</th>							
                        <th style="width:50px">Tgl Daftar</th>							
                        <th style="width:50px">Tgl Keluar</th>							
                        <th style="width:200px">Alamat</th>							
                        <th style="width:50px">Telp</th>							                                    
                        <th style="width:50px">Aktif</th>							                                    
                        <th style="width:50px">Action</th>
                    </tr>
                </thead>
                <tfoot id="show_footer1">
                    
                </tfoot>
                <tbody id="show_data1">
                
                </tbody>
            </table>
            
        </div>
    </div>    
<!--akhir tabel-->

    <!-- ModalAdd modal fade-->
    <div class="modal fade" id="ModalAdd" data-backdrop="static">
        <div class="modal-dialog modal-default">  <!-- modal-(sm, lg, xl) ukuran lebar modal -->
            <div id="modalx" nama="modalx"  class="modal-content bg-primary w3-animate-zoom">
            
                <div class="modal-header">
                    <h3 class="modal-title"><i id="iconx" name="iconx" class="fas fa-plus-square"></i><b><span id="judulx" name="judulx">Tambah Data</span></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="form-group">
                    <form class="form-horizontal" id="formSimpan" nama="formSimpan" action="" method="">
                        @csrf	
                        <div class="modal-body" id="bodyAdd" name="bodyAdd">                        

                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Nama *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="nama1" id="nama1" class="w3-input w3-border" maxlength="200" type="search" placeholder="Nama" autofocus value="{{ old('nama1') }}" required>
                                    <input name="cek1" id="cek1" class="" type="hidden">                                
                                    <input name="id1" id="id1" class="" type="hidden">
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Ecard *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="ecard1" id="ecard1" class="w3-input w3-border" maxlength="25" type="search" placeholder="Ecard" value="{{ old('ecard1') }}" required>
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">NIA *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="nia1" id="nia1" class="w3-input w3-border" maxlength="25" type="search" placeholder="NIA" value="{{ old('nia1') }}" required>
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">KTP *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="ktp1" id="ktp1" class="w3-input w3-border" maxlength="25" type="search" placeholder="KTP" value="{{ old('ktp1') }}" required>
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Status Profesi</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="statusprofesi1" id="statusprofesi1" class="w3-input w3-border" maxlength="10" type="search" placeholder="Status Profesi" value="{{ old('statusprofesi1') }}">
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Lembaga *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <select name="idlembaga1" id="idlembaga1" class="js-select-auto__select form-control" style="border-radius:0px; height:40px;" autocomplete="false">     
                                    </select>
                                </div>								  
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Tgl. Lahir</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="tgllahir1" id="tgllahir1" class="w3-input w3-border" type="search" placeholder="Tanggal Lahir">
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Tgl. Daftar *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="tgldaftar1" id="tgldaftar1" class="w3-input w3-border" type="search" placeholder="Tanggal Daftar">
                                </div>								  
                            </div> 
                            <div class="row" id="div-tglkeluar" name="div-tglkeluar">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Tgl. Keluar</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="tglkeluar1" id="tglkeluar1" class="w3-input w3-border" type="search" placeholder="Tanggal Keluar">
                                </div>								  
                            </div>                           
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">
                                    <h6 class="mt-2">Alamat</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="alamat1" id="alamat1" maxlength="50" class="w3-input w3-border" type="search" placeholder="Alamat">                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">
                                    <h6 class="mt-2">Telp/HP</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="telp1" id="telp1" maxlength="50" class="w3-input w3-border" type="search" placeholder="Telp/HP">                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" align="right">									
                                    <h6 class="mt-2">Aktif</h6>
                                </div>            
                                <div class="col-md-8 mt-1" style="padding-left: 20px;">
                                    <div class="icheck-primary-white d-inline">
                                      <input type="radio" value='Y' id="aktif1xy" name="aktif1x" checked>
                                      <label for="aktif1xy">
                                        <span class="text" style="padding-left: 2px; padding-right: 15px;">Y</span>
                                      </label>
                                    </div>
                                    <div class="icheck-primary-white d-inline text-white">
                                      <input type="radio" value='N' id="aktif1xn" name="aktif1x">
                                      <label for="aktif1xn">
                                        <span class="text" style="padding-left: 2px; padding-right: 15px;">N</span>
                                      </label>
                                    </div>
                                    <input name="aktif1" id="aktif1" type="hidden" value="Y">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4" align="left" style="color: yellow;">									
                                    <h6 class="mt-2"><b>*) Wajib diisi</b></h6>
                                </div>                                                        
                            </div>
                            
                        </div>
                        <div class="modal-footer justify-content-between" style="padding-bottom: 0px">
                            <button type="button" class="w3-button w3-border w3-border-white" data-dismiss="modal">Tutup</button>
                            <button id="btn_simpan" name="btn_simpan" type="button" class="w3-button w3-border w3-border-white"><i style="font-size:18px" class="fa">&#xf0c7;</i> Simpan</button>
                            <button id="btn_baru" name="btn_baru" type="button" class="w3-button w3-border w3-border-white"><i style="font-size:18px" class="fas fa-plus"></i> Baru</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->      
    </div>  
    <!-- end ModalAdd -->

    <!-- khusus menyimpan data yang akan dihapus -->
    <input name="id3" id="id3"type="hidden">	
    <input name="data3a" id="data3a"type="hidden">	
    <input name="data3b" id="data3b"type="hidden">	
    <input name="data3c" id="data3c"type="hidden">	

</div>


<script type="text/javascript">
    var data1Datatable;

$(document).ready(function(){
    
    tglhariini();
    function tglhariini(){
			var tgl=new Date();
			var hari=tgl.getDate();
			if(hari<10){
				var hari='0'+hari;
			}
			
			var bulan=tgl.getMonth()+1;
			if(bulan<10){
				var bulan='0'+bulan;
			}
			var tahun=tgl.getFullYear();
            var tahun2=parseInt(tahun)-17;
			var tglsekarang=tahun+'-'+bulan+'-'+hari;
			var tglsekarang2=tahun2+'-'+bulan+'-'+hari;
			$('#tgldaftarx').val(tglsekarang);
			$('#tgllahirx').val(tglsekarang2);
			$('#tgldaftar1').val(tglsekarang);
			$('#tgllahir1').val(tglsekarang2);
		}
    
    setTimeout(() => {
         data1Datatable = tampil_data1();    
    }, 1000);
    
    setTimeout(() => {
        tampil_listlembaga();
    }, 1000);
    //menampilkan combo lembaga
    function tampil_listlembaga(){				
        $.ajax({
            type: 'get',
            url   : '{{route('pos01.master.anggota_listlembaga')}}',
            
            success: function(data){				    
                $("#idlembaga1").html(data);
            }
        })                    
    }

     function tampil_data1(){
        let i = 1;	
        return $('#data1').DataTable({
            responsive : true,
            retrieve: true,
            autoWidth : true,
            buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],        
            dom: 'lBfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 5000, -1 ],
                [ '10', '25', '50', '100', '500','1000','5000', 'All' ]
            ],
            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.master.anggota_show')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'ecard', name: 'ecard' },
                { data: 'nia', name: 'nia'},
                { data: 'ktp', name: 'ktp'},
                { data: 'nama', name: 'nama'},                
                { data: 'tgllahir', name: 'tgllahir'},                
                { data: 'statusprofesi', name: 'statusprofesi'},                
                { data: 'lembaga', name: 'anggota.lembaga'},                
                { data: 'tgldaftar', name: 'tgldaftar'},                
                { data: 'tglkeluar', name: 'tglkeluar'},                
                { data: 'alamat', name: 'alamat'},                
                { data: 'telp', name: 'telp'},                
                { data: 'aktif', name: 'aktif'},                
                { data: 'action', name: 'action', className: 'dt-center'},
            ]
        });
    }

       function tampil_dataTable(){        
        data1Datatable.draw(null, false);        
    }

    $("#tgldaftarx").datepicker({
			dateFormat  : "yy-mm-dd",
			changeMonth : true,
			changeYear  : true         
    });

    $("#tgllahir1").datepicker({
			dateFormat  : "yy-mm-dd",
			changeMonth : true,
			changeYear  : true         
    });
    $("#tgldaftar1").datepicker({
			dateFormat  : "yy-mm-dd",
			changeMonth : true,
			changeYear  : true         
    });
    $("#tglkeluar1").datepicker({
			dateFormat  : "yy-mm-dd",
			changeMonth : true,
			changeYear  : true         
    });

   
    $('#aktif1xy').on('change',function(){
        $('#aktif1').val("Y");
    });

    $('#aktif1xn').on('change',function(){
        $('#aktif1').val("N");
    });

    function btn_baru_click(){      
        $('#bodyAdd :input').prop('disabled', false);
        document.getElementById("btn_simpan").style.display='block';        
        document.getElementById("btn_baru").style.display='none';
    }
    
    function btn_simpan_click(){      
        $('#bodyAdd :input').prop('disabled', true);
        document.getElementById("btn_simpan").style.display='none';        
        document.getElementById("btn_baru").style.display='block';

        swaltambah();
    }

    function btn_edit_click(){      
        $('#bodyAdd :input').prop('disabled', false);
        document.getElementById("btn_simpan").style.display='block';        
        document.getElementById("btn_baru").style.display='none';
    }
    
    //tambah data -> ok
    $('#btn_baru').on('click',function(){
        btn_baru_click();            
    });

    $('#btn_tambah1').on('click',function(){
        $('[name="aktif1"]').val("Y");
        if ($('[name="aktif1"]').val()=='Y'){
            document.getElementById("aktif1xy").checked = true
        }else{
            document.getElementById("aktif1xn").checked = true
        }

        $('#tglkeluar1').val('');

        btn_baru_click();

        $("#iconx").removeClass("fas fa-edit");
        $("#iconx").addClass("fas fa-plus-square");
        $("#modalx").removeClass("modal-content bg-success w3-animate-zoom");
        $("#modalx").addClass("modal-content bg-primary w3-animate-zoom");
        document.getElementById("btn_simpan").disabled = false;
        $('#ModalAdd').modal('show');
        $('#id1').val('0');
        $('#judulx').html(' Tambah Data');
       
    }); 

    function data_simpan(){
        var id1=$('#id1').val();			
        var nama1=$('#nama1').val();
        var ecard1=$('#ecard1').val();
        var nia1=$('#nia1').val();
        var ktp1=$('#ktp1').val();
        var statusprofesi1=$('#statusprofesi1').val();
        var idlembaga1=$('#idlembaga1').val();
        var tgllahir1=$('#tgllahir1').val();
        var tgldaftar1=$('#tgldaftar1').val();
        var tglkeluar1=$('#tglkeluar1').val();
        var alamat1=$('#alamat1').val();
        var telp1=$('#telp1').val();
        var aktif1=$('#aktif1').val();
        
        let formData = new FormData();
            formData.append('id1', id1);
            formData.append('nama1', nama1);
            formData.append('ecard1', ecard1);
            formData.append('nia1', nia1);
            formData.append('ktp1', ktp1);
            formData.append('tgllahir1', tgllahir1);
            formData.append('tgldaftar1', tgldaftar1);
            formData.append('tglkeluar1', tglkeluar1);
            formData.append('statusprofesi1', statusprofesi1);
            formData.append('idlembaga1', idlembaga1);
            formData.append('alamat1', alamat1);
            formData.append('telp1', telp1);
            formData.append('aktif1', aktif1);
          
        $.ajax({
            enctype: 'multipart/form-data',
            type   : 'post',
            url    : '{{route('pos01.master.anggota_create')}}',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },				 				
            success : function(formData){                                         
                    tampil_dataTable();
                    btn_simpan_click();
                    if(id1>0){
                        $('#ModalAdd').modal('hide'); 
                    }
                },
            error : function(formData){                    
                swalgagaltambah(nama1);                 
                }
        });
        
    }   

    $("#btn_simpan").on('click',function(){
        data_simpan();	
    });


    $('#show_data1').on('click','.item_edit',function(){
        var id1 = $(this).attr('data');
        item_edit_click(id1);       
    });

    function item_edit_click(id1){
        $("#iconx").removeClass("fas fa-plus-square");
        $("#iconx").addClass("fas fa-edit");
        $("#modalx").removeClass("modal-content bg-primary w3-animate-zoom");
        $("#modalx").addClass("modal-content bg-success w3-animate-zoom");
        $('#judulx').html(' Edit Data');
        btn_edit_click();

        // var id1=$(this).attr('data');

        $('#id1').val(id1);
        data_edit(id1);

        $('#ModalAdd').modal('show'); 
    }
    
    function data_edit(idx){
        var id1=idx;			
            $.ajax({
		        type  : 'get',
		        url   : `{{ url('pos01/master/anggotaedit')}}/${id1}`,
		        async : false,
		        dataType : 'json',	
				
		        success : function(data){
                    var i;                
                    var resultData = data.data;	                			
                    for(i=0; i<resultData.length; i++){

                        $('#id1').val(resultData[i].id);
                        $('#nama1').val(resultData[i].nama);
                        $('#ecard1').val(resultData[i].ecard);
                        $('#nia1').val(resultData[i].nia);
                        $('#ktp1').val(resultData[i].ktp);
                        $('#statusprofesi1').val(resultData[i].statusprofesi);
                        $('#idlembaga1').val(resultData[i].idlembaga);
                        $('#tgldaftar1').val(resultData[i].tgldaftar);
                        $('#tgllahir1').val(resultData[i].tgllahir);
                        $('#alamat1').val(resultData[i].alamat);
                        $('#telp1').val(resultData[i].telp);
                        $('#aktif1').val(resultData[i].aktif);
                        
                        if ($('[name="aktif1"]').val()=='Y'){
							document.getElementById("aktif1xy").checked = true
						}else{
							document.getElementById("aktif1xn").checked = true
						}
                    }
                    
		        },
                error : function(data){
                    alert(id1);
                }
		    }); 
    }

    $('#show_data1').on('click','.item_hapus',function(){
        var id3=$(this).attr('data');
        var data3b=$(this).attr('data2');
        var data3c=$(this).attr('data3');
        var data3d=$(this).attr('data4');
        item_hapus_click(id3,data3b,data3c,data3d);
    });

    function item_hapus_click(id3,data3b,data3c,data3d){
        $('#id3').val(id3);
        $('#data3a').val(data3b);
        $('#data3b').val(data3c);
        $('#data3c').val(data3d);
        modal_hapus();
    }

    //modal sweet art hapus		
    function modal_hapus(){
        Swal.fire({
        title: 'Are you sure delete?',
        text: $('#data3b').val(),
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Yes, delete !",
		cancelButtonText: "No, cancel !",
        }).then((result) => {
            if (result.isConfirmed) {
                data_hapus();            
            }
        })
    } 

    function data_hapus(){			
        var id3=$('#id3').val();       
        var data3b=$('#data3b').val();
        $.ajax({
            type  : 'get',
            url   : '{{url('pos01/master/anggotadestroy')}}/'+id3,
            async : false,
            dataType : 'json',					
            success : function(data){
                tampil_dataTable();
                swalhapus(data3b); 
            },
            error : function(data){
                swalgagalhapus(data3b); 
            }
        });
    }

    function swaltambah(x){
        Swal.fire({
            icon: 'success',
            title: 'Save successfully',
            text: x,
            timer:1000
        })
    }

    function swalgagaltambah(x){
        Swal.fire({
            icon: 'error',
            title: 'Oops...failed to add/update record',
            text: x,
            timer:1000
        })
    }

    function swalupdate(x){
        Swal.fire({
            icon: 'success',
            title: 'Update successfully',
            text: x,
            timer:1000
        })
    }

    function swalgagalupdate(x){
        Swal.fire({
            icon: 'error',
            title: 'Oops...failed to update',
            text: x,
            timer:1000
        })
    }

    function swalhapus(x){
        Swal.fire({
            icon: 'success',
            title: 'Delete successfully',
            text: x,
            timer:1000
        })
    }

    function swalgagalhapus(x){
        Swal.fire({
            icon: 'error',
            title: 'Oops...failed to delete',
            text: x,
            timer:1000
        })
    }

    function swalsukseskirim(){
        Swal.fire({
            icon: 'success',
            title: 'Send successfully',
            text: '',
            timer:1000
        })
    }

    function swalgagalkirim(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...failed to send',
            text: '',
            timer:1000
        })
    }

});

</script>	



@endsection