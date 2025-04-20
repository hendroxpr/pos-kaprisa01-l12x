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
                        <th style="width:50px">Kode</th>							
                        <th style="width:100px">Supplier</th>
                        <th style="width:200px">Alamat</th>
                        <th style="width:50px">Desa</th>
                        <th style="width:50px">Kecamatan</th>
                        <th style="width:50px">Kabupaten</th>
                        <th style="width:50px">Provinsi</th>
                        <th style="width:30px">Telp</th>
                        <th style="width:30px">WA</th>
                        <th style="width:100px">Email</th>
                        <th style="width:100px">Web</th>
                        <th style="width:200px">Keterangan</th>
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
                                    <h6 class="mt-2">Kode *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="kode1" id="kode1" class="w3-input w3-border" maxlength="20" type="search" placeholder="Kode" autofocus value="{{ old('kode1') }}" required>
                                    <input name="cek1" id="cek1" class="" type="hidden">                                
                                    <input name="id1" id="id1" class="" type="hidden">
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Supplier *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="supplier1" id="supplier1" class="w3-input w3-border" maxlength="50" type="search" placeholder="Supplier" value="{{ old('supplier1') }}" required>
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Alamat</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="alamat1" id="alamat1" class="w3-input w3-border" maxlength="100" type="search" placeholder="alamat" value="{{ old('alamat1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Kel./Desa</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="desa1" id="desa1" class="w3-input w3-border" maxlength="50" type="search" placeholder="desa" value="{{ old('desa1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Kecamatan</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="kecamatan1" id="kecamatan1" class="w3-input w3-border" maxlength="50" type="search" placeholder="kecamatan" value="{{ old('kecamatan1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Kabupaten</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="kabupaten1" id="kabupaten1" class="w3-input w3-border" maxlength="50" type="search" placeholder="kabupaten" value="{{ old('kabupaten1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Provinsi</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="provinsi1" id="provinsi1" class="w3-input w3-border" maxlength="50" type="search" placeholder="provinsi" value="{{ old('provinsi1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Telp</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="telp1" id="telp1" class="w3-input w3-border" maxlength="15" type="search" placeholder="telp" value="{{ old('telp1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">WA</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="wa1" id="wa1" class="w3-input w3-border" maxlength="15" type="search" placeholder="wa" value="{{ old('wa1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Email</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="email1" id="email1" class="w3-input w3-border" maxlength="50" type="search" placeholder="email" value="{{ old('email1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Web</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="web1" id="web1" class="w3-input w3-border" maxlength="50" type="search" placeholder="web" value="{{ old('web1') }}" >
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Keterangan</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="keterangan1" id="keterangan1" class="w3-input w3-border" maxlength="50" type="search" placeholder="Keterangan" value="{{ old('keterangan1') }}" >
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
			
		}
    
    setTimeout(() => {
         data1Datatable = tampil_data1();    
    }, 1000);
    
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
            ajax   : `{{route('pos01.master.supplier_show')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'kode', name: 'kode' },
                { data: 'supplier', name: 'supplier' },
                { data: 'alamat', name: 'alamat' },
                { data: 'desa', name: 'desa' },
                { data: 'kecamatan', name: 'kecamatan' },
                { data: 'kabupaten', name: 'kabupaten' },
                { data: 'provinsi', name: 'provinsi' },
                { data: 'telp', name: 'telp' },
                { data: 'wa', name: 'wa' },
                { data: 'email', name: 'email' },
                { data: 'web', name: 'web' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'action', name: 'action', className: 'dt-center' },
            ]
        });
    }

       function tampil_dataTable(){        
        data1Datatable.draw(null, false);        
    }

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
        var kode1=$('#kode1').val();
        var supplier1=$('#supplier1').val();
        var alamat1=$('#alamat1').val();
        var desa1=$('#desa1').val();
        var kecamatan1=$('#kecamatan1').val();
        var kabupaten1=$('#kabupaten1').val();
        var provinsi1=$('#provinsi1').val();
        var telp1=$('#telp1').val();
        var wa1=$('#wa1').val();
        var email1=$('#email1').val();
        var web1=$('#web1').val();
        var keterangan1=$('#keterangan1').val();
    
        let formData = new FormData();
            formData.append('id1', id1);
            formData.append('kode1', kode1);
            formData.append('supplier1', supplier1);
            formData.append('alamat1', alamat1);
            formData.append('desa1', desa1);
            formData.append('kecamatan1', kecamatan1);
            formData.append('kabupaten1', kabupaten1);
            formData.append('provinsi1', provinsi1);
            formData.append('telp1', telp1);
            formData.append('wa1', wa1);
            formData.append('email1', email1);
            formData.append('web1', web1);
            formData.append('keterangan1', keterangan1);
          
        $.ajax({
            enctype: 'multipart/form-data',
            type   : 'post',
            url    : '{{route('pos01.master.supplier_create')}}',
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
                swalgagaltambah(supplier1);                 
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
		        url   : `{{ url('pos01/master/supplieredit')}}/${id1}`,
		        async : false,
		        dataType : 'json',	
				
		        success : function(data){
                    var i;                
                    var resultData = data.data;	                			
                    for(i=0; i<resultData.length; i++){

                        $('#id1').val(resultData[i].id);
                        $('#kode1').val(resultData[i].kode);
                        $('#supplier1').val(resultData[i].supplier);
                        $('#alamat1').val(resultData[i].alamat);
                        $('#desa1').val(resultData[i].desa);
                        $('#kecamatan1').val(resultData[i].kecamatan);
                        $('#kabupaten1').val(resultData[i].kabupaten);
                        $('#provinsi1').val(resultData[i].provinsi);
                        $('#telp1').val(resultData[i].telp);
                        $('#wa1').val(resultData[i].wa);
                        $('#email1').val(resultData[i].email);
                        $('#web1').val(resultData[i].web);
                        $('#keterangan1').val(resultData[i].keterangan);

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
            url   : '{{url('pos01/master/supplierdestroy')}}/'+id3,
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