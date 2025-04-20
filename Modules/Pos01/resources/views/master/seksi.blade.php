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
                <div class="row">
                    <div class="col-md-3">
                        {{--  --}}
                    </div>
                    <div class="col-md-7">
                        {{--  --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {{--  --}}
                    </div>
                    <div class="col-md-7">
                        {{--  --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="w3-row" align="right"><i class="fa fa-refresh" aria-hidden="true"></i>            
                    <a href="{{ url('/') }}{{ $link }}" class="btn bg-success rounded-0"><i style="font-size:18px" class="fa">&#xf021;</i> Refresh</a>            
                    <button id="btn_tambah1" name="btn_tambah1" type="button" class="btn bg-primary rounded-0"><i class="fas fa-plus"></i> Tambah</button>	            
                </div> 
            </div>
        </div>

    </div>

    <!--awal tabel-->        
        <div class="box-body" id="headerjudul" style="display: block;">
            <div id="reload" class="table-responsive">
                <table id="example1" class="table table-bordered table-striped table-hover" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>                            
							<th style="width:10px">Kode</th>							
							<th style="width:200px">Seksi</th>
							<th style="width:100px">Keterangan</th>							
                            <th style="width:10px">Action</th>
                        </tr>
                    </thead>
                    <tfoot id="show_footer">
                        
                    </tfoot>
                    <tbody id="show_data">
                    
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
                                    <h6 class="mt-2">Kode</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="kode1" id="kode1" class="w3-input w3-border" maxlength="5" type="search" placeholder="Kode" autofocus value="{{ old('kode1') }}" required>
                                    <input name="cek1" id="cek1" class="" type="hidden">                                
                                    <input name="id1" id="id1" class="" type="hidden">                                
                                </div>								  
                            </div>
    
                            <div class="row">
                                <div class="col-md-4" align="right">									
                                    <h6 class="mt-2">Seksi</h6>
                                </div>

                                <div class="col-md-8">                                
                                    <input name="seksi1" id="seksi1" class="w3-input w3-border" maxlength="50" type="search" placeholder="seksi" value="{{ old('seksi1') }}" required>
                                </div>
                            </div> 
                             
                            <div class="row">
                                <div class="col-md-4" align="right">										
                                    <h6 class="mt-2">Keterangan</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="keterangan1" id="keterangan1" class="w3-input w3-border" maxlength="50" type="search" placeholder="keterangan" value="{{ old('keterangan1') }}">
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
   
$(document).ready(function(){
    
    
    tampil_data();  
    tampil_tombol();

    function tampil_tombol(){
        $('#example1').DataTable( {
            "responsive": true, "lengthChange": false, "autoWidth": false,
            buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],
		    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');   
     } 
         

    //tampilkan dalam tabel ->OK
    function tampil_data(){	
        $.ajax({
            type  : 'get',
            url   : '{{route('pos01.master.seksi_show')}}',
            async : false,
            dataType : 'json',
            				 				
            success : function(data){
                var html = '';
                var i;                
                var resultData = data.data;	                			
                for(i=0; i<resultData.length; i++){
                    
                    html += '<tr>'+
                            '<td align="center">'+ (i+1) +'</td>'+                            								
                            '<td>'+resultData[i].kode+'</td>'+
                            '<td>'+resultData[i].seksi+'</td>'+
                            '<td>'+(resultData[i].keterangan ? resultData[i].keterangan : '')+'</td>'+                            
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" title="Edit Data"  class="btn btn-success btn-xs item_edit" data="'+resultData[i].id+'" data2="'+resultData[i].kode+'" data3="'+resultData[i].seksi+'" data4="'+resultData[i].keterangan+'"><i style="font-size:18px" class="fa">&#xf044;</i></a>'+ ' ' +
                                '<a href="javascript:;" title="Hapus Data"  class="btn btn-danger btn-xs item_hapus" ' +
                                    'data="'+resultData[i].id+'" data2="'+resultData[i].kode+'" data3="'+resultData[i].seksi+'" data4="'+resultData[i].keterangan+'" ' +
                                    '><i style="font-size:18px" class="fa">&#xf00d;</i></a>'+
                            '</td>'+
                            '</tr>';

                }

                $('#show_data').html(html); 
                                            
            }
        }); 
    
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
        
    $("#kode1").on('keyup',function(){
        var x = $("#kode1").val(); 	        
        var y = x.replace('.', '');
        $("#kode1").val(y);
    });

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
        var seksi1=$('#seksi1').val();
        var keterangan1=$('#keterangan1').val();

        let formData = new FormData();
            formData.append('id1', id1);
            formData.append('kode1', kode1);
            formData.append('seksi1', seksi1);
            formData.append('keterangan1', keterangan1);            
          
        $.ajax({
            enctype: 'multipart/form-data',
            type   : 'post',
            url    : '{{route('pos01.master.seksi_create')}}',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },				 				
            success : function(formData){                                         
                tampil_data();
                    btn_simpan_click();
                    if(id1>0){
                        $('#ModalAdd').modal('hide'); 
                    }
                },
            error : function(formData){                    
                swalgagaltambah(seksi1); 
                
                }
        });
        
    }   

    $("#btn_simpan").on('click',function(){
        data_simpan();	
    });

    $('#show_data').on('click','.item_edit',function(){
        $("#iconx").removeClass("fas fa-plus-square");
        $("#iconx").addClass("fas fa-edit");
        $("#modalx").removeClass("modal-content bg-primary w3-animate-zoom");
        $("#modalx").addClass("modal-content bg-success w3-animate-zoom");
        $('#judulx').html(' Edit Data');
        btn_edit_click();

        var id1=$(this).attr('data');

        $('#id1').val(id1);
        data_edit(id1);

        $('#ModalAdd').modal('show');         
    });

    $("#btn_update").on('click',function(){	        
        data_simpan();
    });                                         
    
    function data_edit(idx){
        var id1=idx;			
			
            $.ajax({
		        type  : 'get',
		        url   : `{{ url('pos01/master/seksiedit')}}/${id1}`,
		        async : false,
		        dataType : 'json',	
				
		        success : function(data){
                    var i;                
                    var resultData = data.data;	                			
                    for(i=0; i<resultData.length; i++){

						$('#kode1').val(resultData[i].kode);						
						$('#seksi1').val(resultData[i].seksi);
						$('#keterangan1').val(resultData[i].keterangan);
                    }
		        },
                error : function(data){
                    alert(id1);
                }
		    }); 
    }

    $('#show_data').on('click','.item_hapus',function(){
        var id3=$(this).attr('data');
        var data3b=$(this).attr('data2');
        var data3c=$(this).attr('data3');
        var data3d=$(this).attr('data4');
        
        $('#id3').val(id3);
        $('#data3a').val(data3b);
        $('#data3b').val(data3c);
        $('#data3c').val(data3d);
        modal_hapus();
    });

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
            url   : '{{url('pos01/master/seksidestroy')}}/'+id3,
            async : false,
            dataType : 'json',					
            success : function(data){
                tampil_data();
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

});
</script>	



@endsection