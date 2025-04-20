@extends('admin.layouts.main')

@section('contents')

@php
    $level = auth()->user()->levels;    
@endphp

<div class="container-fluid px-0">
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
                    <input name="levelx" id="levelx" class="form-control" type="hidden" value="{{ auth()->user()->levels }}">           
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
                        <tr style="background-color:lightblue">
                            <th style='width:10px'>#</th>
                            <th style='width:50px'>User Name</th>
                            <th style='width:50px'>Email</th>
                            <th style='width:50px'>Nama Depan</th>
                            <th style='width:50px'>Nama Tengah</th>
                            <th style='width:50px'>Nama Belakang</th>
                            <th style='width:10px'>Aplikasi</th>
                            <th style='width:10px'>Level</th>
                            <th style='width:10px'>Blokir</th>
                            <th style='width:10px'>Image</th>
                            <th style='width:10px'>Action</th>
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
                                    <h6 class="mt-2">User Name *)</h6>
                                </div>
                                <div class="col-md-8">                                
                                    <input name="name1" id="name1" class="w3-input w3-border" type="text" placeholder="User Name" autofocus value="{{ old('name1') }}" required>
                                    <input name="cek1" id="cek1" class="" type="hidden">                                
                                    <input name="id1" id="id1" class="" type="hidden">                                
                                </div>								  
                            </div>
    
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">										
                                    <h6>Email *)</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="email1" id="email1" class="w3-input w3-border" type="email" placeholder="Email" required>
                                </div>								  
                            </div>
                                                    
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">									
                                    <h6>Password</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="password1" id="password1" class="w3-input w3-border" type="password" placeholder="Password" required>
                                    <span name='pesanpassword1' id='pesanpassword1'></span>
                                </div>								  
                            </div>
                             
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">										
                                    <h6>Nama Depan</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="namadepan1" id="namadepan1" class="w3-input w3-border" type="text" placeholder="Nama Depan">
                                </div>								  
                            </div>
                    
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">										
                                    <h6>Nama Tengah</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="namatengah1" id="namatengah1" class="w3-input w3-border" type="text" placeholder="Nama Tengah">
                                </div>								  
                            </div>
                                                        
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">										
                                    <h6>Nama Belakang</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="namabelakang1" id="namabelakang1" class="w3-input w3-border" type="text" placeholder="Nama Belakang">
                                </div>								  
                            </div>
                                                    
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">									
                                    <h6>Aplikasi *)</h6>
                                </div>
                                <div class="col-md-8">
                                    <select name="idaplikasi1" id="idaplikasi1" class="w3-input w3-border">
                                        
                                    </select>
                                </div>								  
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">									
                                    <h6>Level</h6>
                                </div>
                                <div class="col-md-8 mt-1" style="padding-left: 20px;">
                                    <div class="icheck-primary-white d-inline">
                                        <input type="radio" value='1' id="levels1xadmin" name="levels1x">
                                        <label for="levels1xadmin">
                                          <span class="text" style="padding-left: 2px; padding-right: 15px;">Admin</span>
                                        </label>
                                    </div>
                                    <div class="icheck-primary-white d-inline text-white">
                                        <input type="radio" value='2' id="levels1xuser" name="levels1x">
                                        <label for="levels1xuser">
                                          <span class="text" style="padding-left: 2px; padding-right: 15px;">User</span>
                                        </label>
                                    </div>    
                                    <div class="icheck-primary-white d-inline text-white">
                                        <input type="radio" value='3' id="levels1xentry" name="levels1x"  checked>
                                        <label for="levels1xentry">
                                          <span class="text" style="padding-left: 2px; padding-right: 15px;">Entry</span>
                                        </label>
                                    </div>    
                                    <input name="levels1" id="levels1" type="hidden">                                    
                                </div>
                            </div> 
    
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">									
                                    <h6>Blokir</h6>
                                </div>
                                <div class="col-md-8 mt-1" style="padding-left: 20px;">
                                    <div class="icheck-primary-white d-inline">
                                      <input type="radio" value='Y' id="blokir1xy" name="blokir1x">
                                      <label for="blokir1xy">
                                        <span class="text" style="padding-left: 2px; padding-right: 15px;">Y</span>
                                      </label>
                                    </div>
                                    <div class="icheck-primary-white d-inline text-white">
                                      <input type="radio" value='N' id="blokir1xn" name="blokir1x"  checked>
                                      <label for="blokir1xn">
                                        <span class="text" style="padding-left: 2px; padding-right: 15px;">N</span>
                                      </label>
                                    </div>
                                    <input name="blokir1" id="blokir1" type="hidden">
                                </div>
                            </div>
                            
                            <div class="row mb-1">
                                <div class="col-md-4 mt-2" align="right">										
                                    <h6>CountDown (s)</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="countdown1" id="countdown1" class="w3-input w3-border" type="number" placeholder="CountDown" value="900">
                                </div>								  
                            </div>
                                
                            <div class="row">
                                <div class="col-md-4 mt-2" align="right">										
                                    <h6>Foto<br>(Mak. 2048 KB)</h6>
                                </div>
                                <div class="col-md-4">
                                    <input name="foto1" id="foto1" type="file" class="w3-input w3-border mb-1">
                                    <input name="foto1x" id="foto1x" type="hidden">
                                        <div class="w3-card w3-border" style="min-height:100px; height: auto;">                                              
                                            <div id="gambarfoto1" name="gambarfoto1" class="mb-1" style="width: 100%; max-height: 100px; overflow:hidden;">                                                                         
                                        </div> 
                                    </div>
                                </div>								  
                            </div>

                            <div class="row">
                                <div class="col-md-4" align="right">										
                                    <label class="control-label"><h6 class="mt-3"><b>*) Wajib diisi.</b></h6></label>
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
    
    function readURLfoto1(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.img-previewfoto1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
    }

    $("#foto1").change(function() {
        var gbrx="<img class='img-previewfoto1 img-fluid col-sm-12 mb-1 mt-1 d-block' id='img-previewfoto1' name='img-previewfoto1' style='width: 100%;'>";
        document.getElementById("gambarfoto1").innerHTML=gbrx;
        readURLfoto1(this);
    });
    
    const level={{ $level }};
    if (level!='1'){        
        $("#btn_tambah1").attr('disabled',''); 
    }else{
        $("#btn_tambah1").removeAttr('disabled');
    }

    tampil_listaplikasi();
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
        var levelx=$('#levelx').val();
        $.ajax({
            type  : 'get',
            url   : '{{route('admin.users_show')}}',
            async : false,
            dataType : 'json',
            				 				
            success : function(data){
                var html = '';
                var i;                
                var resultData = data.data;	                			
                for(i=0; i<resultData.length; i++){

                    var x=resultData[i].levels;
                    if(x==1){
                        var level='Admin';
                    }else if(x==2){
                        var level='User';
                    }else{
                        var level='Entry';
                    }

                    html += '<tr>'+
                            '<td align="center">'+ (i+1) +'</td>'+                            								
                            '<td>'+resultData[i].name+'</td>'+								
                            '<td>'+resultData[i].email+'</td>'+
                            '<td>'+resultData[i].namadepan+'</td>'+
                            '<td>'+resultData[i].namatengah+'</td>'+
                            '<td>'+resultData[i].namabelakang+'</td>'+
                            '<td>'+resultData[i].aplikasi.aplikasi+'</td>'+  
                            '<td>'+level+'</td>'+  
                            '<td align="center">'+resultData[i].blokir+'</td>' +
                            '<td align="center"><img src="{{ asset('storage/') }}/'+(resultData[i].foto ? resultData[i].foto : 'admin-users-foto/blank.png')+'" width="100%"></td>';

                            if(levelx==1){
                            html +=	'<td style="text-align:center;">'+
                                '<a href="javascript:;" title="Edit Data"  class="btn btn-success btn-xs item_edit" data="'+resultData[i].id+'"><i style="font-size:18px" class="fa">&#xf044;</i></a>'+ ' ' +
                                '<a href="javascript:;" title="Hapus Data"  class="btn btn-danger btn-xs item_hapus" ' +
                                    'data="'+resultData[i].id+'" data2="'+resultData[i].name+'" data3="'+resultData[i].email+'" ' +
                                    '><i style="font-size:18px" class="fa">&#xf00d;</i></a>'+
                            '</td>';
                            }else{
                            html +=	'<td style="text-align:center;">'+
                                '<a href="javascript:;" title="Edit Data"  class="btn btn-success btn-xs item_edit" data="'+resultData[i].id+'"><i style="font-size:18px" class="fa">&#xf044;</i></a>'+ 
                            '</td>';	
                            }
                            '</tr>';

                }

                $('#show_data').html(html); 
                                            
            }
        }); 
    
    }
    
    //menampilkan combo aplikasi
    function tampil_listaplikasi(){				
        $.ajax({
            type: 'get',
            url   : '{{route('admin.users_listaplikasi')}}',
            
            success: function(data){				    
                $("#idaplikasi1").html(data);                
            }
        })
    }

    function btn_baru_click(){      
        $('#bodyAdd :input').prop('disabled', false);
        document.getElementById("btn_simpan").style.display='block';        
        document.getElementById("btn_baru").style.display='none';
        $('#password1').css({backgroundColor:'white'});
        $('#pesanpassword1').html('');
    }
    
    function btn_simpan_click(){      
        $('#bodyAdd :input').prop('disabled', true);
        document.getElementById("btn_simpan").style.display='none';        
        document.getElementById("btn_baru").style.display='block';
        
    }

    function btn_edit_click(){      
        $('#bodyAdd :input').prop('disabled', false);
        document.getElementById("btn_simpan").style.display='block';        
        document.getElementById("btn_baru").style.display='none';
        $('#password1').css({backgroundColor:'yellow'});
        $('#pesanpassword1').html('Jika password tidak berubah, kosongkan saja.');
    }
    
    
    //tambah data -> ok
    $('#btn_baru').on('click',function(){
        btn_baru_click();            
    });

    $('#btn_tambah1').on('click',function(){  
        btn_baru_click();
        $('#name1').val('');
        $('#email1').val('');
        $('#namadepan1').val('');
        $('#namatengah1').val('');
        $('#namabelakang1').val('');
        $('#levels1').val('3');
        $('#blokir1').val('N');			
        if ($('[name="levels1"]').val()=='1'){
            document.getElementById("levels1xadmin").checked = true
        }if ($('[name="levels1"]').val()=='2'){
            document.getElementById("levels1xuser").checked = true
        }else{
            document.getElementById("levels1xentry").checked = true
        }
        
        $('[name="blokir1"]').val("N");
        if ($('[name="blokir1"]').val()=='Y'){
            document.getElementById("blokir1xy").checked = true
        }else{
            document.getElementById("blokir1xn").checked = true
        }

        $("#iconx").removeClass("fas fa-edit");
        $("#iconx").addClass("fas fa-plus-square");
        $("#modalx").removeClass("modal-content bg-success w3-animate-zoom");
        $("#modalx").addClass("modal-content bg-primary w3-animate-zoom");
        document.getElementById("btn_simpan").disabled = false;
        $('#ModalAdd').modal('show');
        $('#id1').val('0');
        $('#judulx').html(' Tambah Data');
    }); 

    $('#levels1xadmin').on('change',function(){				
        $('#levels1').val("1");						
    });
    
    $('#levels1xuser').on('change',function(){				
        $('#levels1').val("2");						
    });
    $('#levels1xentry').on('change',function(){				
        $('#levels1').val("3");						
    });
    
    $('#blokir1xy').on('change',function(){				
        $('#blokir1').val("Y");						
    });
    $('#blokir1xn').on('change',function(){				
        $('#blokir1').val("N");						
    });

    function data_simpan(){
        var id1=$('#id1').val();			
        var name1=$('#name1').val();
        var email1=$('#email1').val();
        var password1=$('#password1').val();
        var namadepan1=$('#namadepan1').val();
        var namatengah1=$('#namatengah1').val();
        var namabelakang1=$('#namabelakang1').val();
        var levels1=$('#levels1').val();
        var idaplikasi1=$('#idaplikasi1').val();
        var blokir1=$('#blokir1').val();
        var countdown1=$('#countdown1').val();
        const foto1 = $('#foto1').prop('files')[0];
        
        let formData = new FormData();
            formData.append('id1', id1);
            formData.append('foto1', foto1);
            formData.append('name1', name1);
            formData.append('email1', email1);
            formData.append('password1', password1);
            formData.append('namadepan1', namadepan1);
            formData.append('namatengah1', namatengah1);
            formData.append('namabelakang1', namabelakang1);
            formData.append('levels1', levels1);
            formData.append('idaplikasi1', idaplikasi1);
            formData.append('blokir1', blokir1);
            formData.append('countdown1', countdown1);
          
        $.ajax({
            enctype: 'multipart/form-data',
            type   : 'post',
            url    : '{{route('admin.users_create')}}',
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
                    swaltambah(name1)
                },
            error : function(formData){                    
                swalgagaltambah(name1); 
                
                }
        });
        
    }   

    $("#btn_simpan").on('click',function(){
        data_simpan();	
    });

    $('#show_data').on('click','.item_edit',function(){
        $("#foto1").val('');
        $("#iconx").removeClass("fas fa-plus-square");
        $("#iconx").addClass("fas fa-edit");
        $("#modalx").removeClass("modal-content bg-primary w3-animate-zoom");
        $("#modalx").addClass("modal-content bg-success w3-animate-zoom");
        $('#judulx').html(' Edit Data');
        btn_edit_click();

        var id1=$(this).attr('data');
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
		        url   : '{{url('/admin/usersedit')}}/'+id1,
		        async : false,
		        dataType : 'json',	
				
		        success : function(data){
                    var i;                
                    var resultData = data.data;	                			
                    for(i=0; i<resultData.length; i++){

						$('#id1').val(resultData[i].id);
                        $('#name1').val(resultData[i].name);
                        $('#email1').val(resultData[i].email);
                        $('#password1').val("");
						$('#namadepan1').val(resultData[i].namadepan);
						$('#namatengah1').val(resultData[i].namatengah);
						$('#namabelakang1').val(resultData[i].namabelakang);
						$('#idaplikasi1').val(resultData[i].kunci1);
						$('#levels1').val(resultData[i].levels);
						$('#blokir1').val(resultData[i].blokir);
						$('#countdown1').val(resultData[i].countdown);
						$('#foto1').val('');
						$('#foto1x').val(resultData[i].foto);
						
						if ($('[name="levels1"]').val()=='1'){
							document.getElementById("levels1xadmin").checked = true;							
						
						}else{
							if ($('[name="levels1"]').val()=='2'){
								document.getElementById("levels1xuser").checked = true;
							}else{
								document.getElementById("levels1xentry").checked = true;
							}
						}
						
						if ($('[name="blokir1"]').val()=='Y'){
							document.getElementById("blokir1xy").checked = true;
						}else{
							document.getElementById("blokir1xn").checked = true;
						}	
                        

                        var gbr2=$('#foto1x').val();
                        if(gbr2){                        
                            var url2="{{ asset('storage/') }}/"+gbr2;
                            var gbrx="<img src='"+url2+"' class='img-previewfoto1 img-fluid col-sm-12 mb-1 mt-1 d-block' id='img-previewfoto1' name='img-previewfoto1' style='width: 100%;' alt='"+url2+"'>";
                        }else{
                            var gbrx="<h5 class='mt-2' align='center'>Belum ada foto yang diupload<h5>";
                        }
                        document.getElementById("gambarfoto1").innerHTML=gbrx;

                    }
                    
		        }
		    }); 
    }

    $('#show_data').on('click','.item_hapus',function(){
        var id3=$(this).attr('data');
        var data3a=$(this).attr('data2');
        var data3b=$(this).attr('data3');
        var data3c=$(this).attr('data4');
        
        $('#id3').val(id3);
        $('#data3a').val(data3a);
        $('#data3b').val(data3b);
        $('#data3c').val(data3c);
        modal_hapus(data3a);
    });

    //modal sweet art hapus		
    function modal_hapus(x){
        Swal.fire({
        title: 'Are you sure delete?',
        text: x,
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
        var data3a = $('#data3a').val();
        $.ajax({
            type  : 'get',
            url   : '{{url('/admin/usersdelete')}}/'+id3,
            async : false,
            dataType : 'json',					
            success : function(data){
                tampil_data();
                swalhapus(data3a); 
            },
            error : function(data){
                swalgagalhapus(data3a); 
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