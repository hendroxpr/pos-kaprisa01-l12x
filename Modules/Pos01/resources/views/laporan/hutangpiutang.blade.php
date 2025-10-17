@extends('admin.layouts.main')

@section('contents')

@php
       
    $tabhutang = session('tabhutang1');
    $event = session('event1');
    
    $tgltransaksi1 = session('tgltransaksi1');   
    if($tgltransaksi1==''){
        $tgltransaksi1=session('memtanggal');;  
    }    
    $tgltransaksi2 = session('tgltransaksi2');   
    if($tgltransaksi2==''){
        $tgltransaksi2=session('memtanggal');;  
    }
@endphp


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
               <input name="tabhutang1" id="tabhutang1" class="" type="hidden" value="{{ $tabhutang }}">
               <input name="event1" id="event1" class="" type="hidden" value="{{ $event }}">
               <div class="row mt-1">
                    <div class="col-md-3 text-right">
                        <h6 class="mt-2">Periode Tanggal</h6>
                    </div>
                    <div class="col-md-2">
                        <input name="tgltransaksi1" id="tgltransaksi1" class="w3-input w3-border" maxlength="10" type="text" placeholder="Tanggal awal" autocomplete="off" value="{{ $tgltransaksi1 }}">                       
                    </div>
                    <div class="col-md-1 text-center">
                        <h6 class="mt-2">s/d</h6>
                    </div>
                    <div class="col-md-2">
                        <input name="tgltransaksi2" id="tgltransaksi2" class="w3-input w3-border" maxlength="10" type="text" placeholder="Tanggal akhir" autocomplete="off" value="{{ $tgltransaksi2 }}">                       
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="w3-row" align="right"><i class="fa fa-refresh" aria-hidden="true"></i>            
                    <a href="{{ url('/') }}{{ $link }}" class="btn bg-success rounded-0"><i style="font-size:18px" class="fa">&#xf021;</i> Refresh</a>            
                </div> 
            </div>
        </div>

    </div>

    <ul class="nav nav-tabs" id="tab-hutangbelum" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="tab-hutangbelumsupplier" data-toggle="pill" href="#isi-tab-hutangbelumsupplier" role="tab" aria-controls="tab-hutangbelumsupplier" aria-selected="true">Hutang (Supplier) Belum Lunas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-hutangbelumcustomer" data-toggle="pill" href="#isi-tab-hutangbelumcustomer" role="tab" aria-controls="tab-hutangbelumcustomer" aria-selected="false">Piutang (Customer) Belum Lunas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-hutangsudahsupplier" data-toggle="pill" href="#isi-tab-hutangsudahsupplier" role="tab" aria-controls="tab-hutangsudahsupplier" aria-selected="false">Hutang (Supplier) Sudah Lunas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-hutangsudahcustomer" data-toggle="pill" href="#isi-tab-hutangsudahcustomer" role="tab" aria-controls="tab-hutangsudahcustomer" aria-selected="false">Piutang (Customer) Sudah Lunas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-hutangsajasupplier" data-toggle="pill" href="#isi-tab-hutangsajasupplier" role="tab" aria-controls="tab-hutangsajasupplier" aria-selected="false">Hutang (Supplier)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-hutangsajacustomer" data-toggle="pill" href="#isi-tab-hutangsajacustomer" role="tab" aria-controls="tab-hutangsajacustomer" aria-selected="false">Piutang (Customer)</a>
        </li>
                 
    </ul>

    <!--awal tabel-->        
    <div class="box-body" id="headerjudul" style="display: block;">
        <div class="tab-content mt-3" id="tab-hutangbelum-tabContent">

            <!--tab-hutangbelumsupplier -->
            <div class="tab-pane fade" id="isi-tab-hutangbelumsupplier" role="tabpanel" aria-labelledby="tab-hutangbelumsupplier">
                <div id="reload" class="table-responsive">
                    <table id="hutangbelumsupplier1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>							
                                <th style="width:10px">Tanggal</th>							
                                <th style="width:10px">Kode</th>
                                <th style="width:50px">Supplier</th>
                                <th style="width:50px">Alamat</th>							
                                <th style="width:10px">X Angs</th>							
                                <th style="width:20px">@ Angsuran</th>							
                                <th style="width:20px">Nilai Hutang</th>							
                                <th style="width:20px">Sudah Bayar</th>							
                                <th style="width:20px">Saldo</th>							
                            </tr>
                        </thead>
                                
                        <tfoot id="show_footerhutangbelumsupplier1">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>                            
                        </tfoot>
                        
                        <tbody id="show_hutangbelumsupplier1">
                            
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-hutangbelumsupplier -->
            
            <!--tab-hutangbelumcustomer -->
            <div class="tab-pane fade" id="isi-tab-hutangbelumcustomer" role="tabpanel" aria-labelledby="tab-hutangbelumcustomer">
                <div id="reload" class="table-responsive">
                    <table id="hutangbelumcustomer1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>							
                                <th style="width:10px">Tanggal</th>							
                                <th style="width:10px">NIA</th>
                                <th style="width:50px">Customer</th>
                                <th style="width:50px">Lembaga</th>							
                                <th style="width:10px">X Angs</th>							
                                <th style="width:20px">@ Angsuran</th>							
                                <th style="width:20px">Nilai Hutang</th>							
                                <th style="width:20px">Sudah Bayar</th>							
                                <th style="width:20px">Saldo</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerhutangbelumcustomer1">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="show_hutangbelumcustomer1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-hutangbelumcustomer -->

            <!--tab-hutangsudahsupplier -->
            <div class="tab-pane fade" id="isi-tab-hutangsudahsupplier" role="tabpanel" aria-labelledby="tab-hutangsudahsupplier">
                <div id="reload" class="table-responsive">
                    <table id="hutangsudahsupplier1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>							
                                <th style="width:10px">Tanggal</th>							
                                <th style="width:10px">Kode</th>
                                <th style="width:50px">Supplier</th>
                                <th style="width:50px">Alamat</th>							
                                <th style="width:10px">X Angs</th>							
                                <th style="width:20px">@ Angsuran</th>							
                                <th style="width:20px">Nilai Hutang</th>							
                                <th style="width:20px">Sudah Bayar</th>							
                                <th style="width:20px">Saldo</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerhutangsudahsupplier1">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>                            
                        </tfoot>
                        <tbody id="show_hutangsudahsupplier1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-hutangsudahsupplier -->
            
            <!--tab-hutangsudahcustomer -->
            <div class="tab-pane fade" id="isi-tab-hutangsudahcustomer" role="tabpanel" aria-labelledby="tab-hutangsudahcustomer">
                <div id="reload" class="table-responsive">
                    <table id="hutangsudahcustomer1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>							
                                <th style="width:10px">Tanggal</th>							
                                <th style="width:10px">NIA</th>
                                <th style="width:50px">Customer</th>
                                <th style="width:50px">Lembaga</th>							
                                <th style="width:10px">X Angs</th>							
                                <th style="width:20px">@ Angsuran</th>							
                                <th style="width:20px">Nilai Hutang</th>							
                                <th style="width:20px">Sudah Bayar</th>							
                                <th style="width:20px">Saldo</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerhutangsudahcustomer1">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="show_hutangsudahcustomer1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-hutangsudahcustomer -->

            <!--tab-hutangsajasupplier -->
            <div class="tab-pane fade" id="isi-tab-hutangsajasupplier" role="tabpanel" aria-labelledby="tab-hutangsajasupplier">
                <div id="reload" class="table-responsive">
                    <table id="hutangsajasupplier1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>							
                                <th style="width:10px">Tanggal</th>							
                                <th style="width:10px">Kode</th>
                                <th style="width:50px">Supplier</th>
                                <th style="width:50px">Alamat</th>							
                                <th style="width:10px">X Angs</th>							
                                <th style="width:20px">@ Angsuran</th>							
                                <th style="width:20px">Nilai Hutang</th>							
                                <th style="width:20px">Sudah Bayar</th>							
                                <th style="width:20px">Saldo</th>							
                            </tr>
                        </thead>
                                
                        <tfoot id="show_footerhutangsajasupplier1">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>                            
                        </tfoot>
                        
                        <tbody id="show_hutangsajasupplier1">
                            
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-hutangsajasupplier -->
            
            <!--tab-hutangsajacustomer -->
            <div class="tab-pane fade" id="isi-tab-hutangsajacustomer" role="tabpanel" aria-labelledby="tab-hutangsajacustomer">
                <div id="reload" class="table-responsive">
                    <table id="hutangsajacustomer1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:10px">NIA</th>
                                <th style="width:50px">Customer</th>
                                <th style="width:50px">Lembaga</th>							
                                <th style="width:10px">X Angs</th>							
                                <th style="width:20px">@ Angsuran</th>							
                                <th style="width:20px">Nilai Hutang</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerhutangsajacustomer1">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="show_hutangsajacustomer1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-hutangsajacustomer -->

        </div>
    </div>    
<!--akhir tabel-->

    <!-- khusus menyimpan data yang akan dihapus -->
    <input name="id3" id="id3"type="hidden">	
    <input name="data3a" id="data3a"type="hidden">	
    <input name="data3b" id="data3b"type="hidden">	
    <input name="data3c" id="data3c"type="hidden">	

</div>


<script type="text/javascript">
    var hutangbelumsupplier1Datatable;
    var hutangbelumcustomer1Datatable;
    var hutangsudahsupplier1Datatable;
    var hutangsudahcustomer1Datatable;
    var hutangsajasupplier1Datatable;
    var hutangsajacustomer1Datatable;

$(document).ready(function(){
    
    function formatRupiah(angka, prefix,desimal){
			angka1=parseFloat(angka);			
			angka2=angka1.toFixed(10);
		    angka3=angka2.substr(0,(angka2.length)-11);			
			var number_string = angka3.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
		 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
					jmldesimal=parseFloat(desimal);					
					//a1 = parseFloat(angka);
					a1 = parseFloat(angka1);
					b1 = a1.toFixed(0);					
					b2 = a1.toFixed(parseFloat(jmldesimal));					
					pos1 = b2.indexOf(".");
					pos2 = b2.indexOf(",");					
					if (parseFloat(pos1)<0){
						pos1=0;
					}
					if (parseFloat(pos2)<0){
						pos2=0;
					}
					pos = parseFloat(pos1)+ parseFloat(pos2)+parseFloat(1);
					
					koma = ','+b2.substr(parseFloat(pos),parseFloat(jmldesimal));
					
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah + koma;
			return prefix == undefined ? rupiah : (rupiah ? ' ' + rupiah : '');
		}
		
		function formatAngka(angka, prefix){
			angka1=parseFloat(angka);			
			angka2=angka1.toFixed(10);
		    angka3=angka2.substr(0,(angka2.length)-11);			
			var number_string = angka3.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
		 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
						
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
		}
		
		function cek_angka(angka){	
			var x='';
			var validasiAngka = /^[0-9]+$/;
			//cek validasi
			if(angka.match(validasiAngka)){
				x=parseFloat(angka);
			}else{
				x=parseFloat(1);
			}
			return x;			
        }

    function tgl_sekarang(){
        var x = new Date();
        var tgl = x.getDate();
        if(tgl<10){
            tgl='0'+tgl;
        }
        var bln = x.getMonth()+1;
        if(bln<10){
            bln='0'+bln;
        }
        var thn = x.getFullYear();

			return thn+'-'+bln+'-'+tgl;

	}

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
        if($('#tabhutang1').val()=='tab-hutangsudahsupplier'){
            $('#tab-hutangsudahsupplier').click();            
        }else if($('#tabhutangsudah1').val()=='tab-hutangsudahcustomer'){
            $('#tab-hutangsudahcustomer').click();            
        }else if($('#tabhutang1').val()=='tab-hutangbelumsupplier'){
            $('#tab-hutangbelumsupplier').click();            
        }else if($('#tabhutang1').val()=='tab-hutangbelumcustomer'){
            $('#tab-hutangbelumcustomer').click();            
        }else if($('#tabhutang1').val()=='tab-hutangsajasupplier'){
            $('#tab-hutangsajasupplier').click();            
        }else if($('#tabhutang1').val()=='tab-hutangsajacustomer'){
            $('#tab-hutangsajacustomer').click();            
        }else{
            $('#tab-hutangbelumsupplier').click();            
        }
    }, 500);

    $('#tab-hutangbelumsupplier').on('click',function(){
        $('#tabhutang1').val('tab-hutangbelumsupplier');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 500);
    });
    $('#tab-hutangbelumcustomer').on('click',function(){
        $('#tabhutang1').val('tab-hutangbelumcustomer');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 500);
    });
    $('#tab-hutangsudahsupplier').on('click',function(){
        $('#tabhutang1').val('tab-hutangsudahsupplier');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 500);
    });
    $('#tab-hutangsudahcustomer').on('click',function(){
        $('#tabhutang1').val('tab-hutangsudahcustomer');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 500);
    });
    $('#tab-hutangsajasupplier').on('click',function(){
        $('#tabhutang1').val('tab-hutangsajasupplier');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 500);
    });
    $('#tab-hutangsajacustomer').on('click',function(){
        $('#tabhutang1').val('tab-hutangsajacustomer');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 500);
    });
           
    //menampilkan combo ruang
    setTimeout(() => {
        // tampil_listruang();
        koneksi_datatable()
    }, 500);

    $("#tgltransaksi1").datepicker({
           dateFormat  : "yy-mm-dd",
           changeMonth : true,
           changeYear  : true         
    });

    $("#tgltransaksi2").datepicker({
           dateFormat  : "yy-mm-dd",
           changeMonth : true,
           changeYear  : true         
    });
    
    $('#tgltransaksi1').on('change',function(){
        $('#event1').val('1');				
       setTimeout(() => {
           kirimsyarat();
       }, 500);					
    });
    
    $('#tgltransaksi2').on('change',function(){
        $('#event1').val('1');				
       setTimeout(() => {
           kirimsyarat();
       }, 500);					
    });
   
    function kirimsyarat(){
        var tabhutang1=$('#tabhutang1').val();
        var event1=$('#event1').val();
        var tgltransaksi1=$('#tgltransaksi1').val();
        var tgltransaksi2=$('#tgltransaksi2').val();
        
        let formData = new FormData();
            formData.append('tabhutang1', tabhutang1);
            formData.append('tgltransaksi1', tgltransaksi1);
            formData.append('tgltransaksi2', tgltransaksi2);

        $.ajax({
            enctype: 'multipart/form-data',
            type   : 'post',
            url    : '{{route('pos01.laporan.hutangpiutang_kirimsyarat')}}',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },				 				
            success : function(formData){ 
                if(event1=='1'){
                        $("#tgltransaksi1").val(tgltransaksi1);                                        
                        $("#tgltransaksi2").val(tgltransaksi2);
                        tampil_dataTable();                   
                    }
                }
        });
    }

    function tampil_hutangbelumsupplier1(){
        let i = 1;	
        return $('#hutangbelumsupplier1').DataTable({
            responsive : true,
            retrieve: true,
            autoWidth : true,
            buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],        
            dom: 'lBfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 5000, -1 ],
                [ '10', '25', '50', '100', '500','1000','5000', 'All' ]
            ],
            
            footerCallback: function (row, data, start, end, display) {
            let api = this.api();
    
            // Remove the formatting to get integer data for summation
            let intVal = function (i) {
                return typeof i === 'string'
                    ? i.replace(/[\$,]/g, '') * 1
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
    
            // Total over all pages
            totalhutang = api
                .column(8)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            sudahbayar = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            saldo = api
                .column(10)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhutang = api
                .column(8, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesudahbayar = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesaldo = api
                .column(10, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(3).footer().innerHTML = 'SUB TOTAL :';
            api.column(8).footer().innerHTML = formatAngka(pagetotalhutang,'');
            api.column(9).footer().innerHTML = formatAngka(pagesudahbayar,'');
            api.column(10).footer().innerHTML = formatAngka(pagesaldo,'');
            },
            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.hutangpiutang_showhutangpiutangbelumsupplier')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'supplier.kode', className: 'dt-center' },
                { data: 'supplier', name: 'supplier.supplier', className: 'dt-left' },
                { data: 'alamat', name: 'supplier.alamat', className: 'dt-left' },
                { data: 'xangsuran', name: 'xangsuran', className: 'dt-center' },
                { data: 'nilaiangsuran', name: 'nilaiangsuran', className: 'dt-right' },
                { data: 'asli', name: 'asli', className: 'dt-right' },
                { data: 'sudahbayar', name: 'sudahbayar', className: 'dt-right' },
                { data: 'saldo', name: 'saldo', className: 'dt-right' },
            ]
        });
    }
    
    function tampil_hutangbelumcustomer1(){
        let i = 1;	
        return $('#hutangbelumcustomer1').DataTable({
            responsive : true,
            retrieve: true,
            autoWidth : true,
            buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],        
            dom: 'lBfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 5000, -1 ],
                [ '10', '25', '50', '100', '500','1000','5000', 'All' ]
            ],
            footerCallback: function (row, data, start, end, display) {
            let api = this.api();
    
            // Remove the formatting to get integer data for summation
            let intVal = function (i) {
                return typeof i === 'string'
                    ? i.replace(/[\$,]/g, '') * 1
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
    
            // Total over all pages
            totalhutang = api
                .column(8)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            sudahbayar = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            saldo = api
                .column(10)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhutang = api
                .column(8, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesudahbayar = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesaldo = api
                .column(10, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(3).footer().innerHTML = 'SUB TOTAL :';
            api.column(8).footer().innerHTML = formatAngka(pagetotalhutang,'');
            api.column(9).footer().innerHTML = formatAngka(pagesudahbayar,'');
            api.column(10).footer().innerHTML = formatAngka(pagesaldo,'');
            },
            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.hutangpiutang_showhutangpiutangbelumcustomer')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'nia', name: 'anggota.nia', className: 'dt-center' },
                { data: 'nama', name: 'anggota.nama', className: 'dt-left' },
                { data: 'lembaga', name: 'anggota.lembaga.lembaga', className: 'dt-left' },
                { data: 'xangsuran', name: 'xangsuran', className: 'dt-center' },
                { data: 'nilaiangsuran', name: 'nilaiangsuran', className: 'dt-right' },
                { data: 'asli', name: 'asli', className: 'dt-right' },
                { data: 'sudahbayar', name: 'sudahbayar', className: 'dt-right' },
                { data: 'saldo', name: 'saldo', className: 'dt-right' },
            ]
        });
    }
   
    function tampil_hutangsudahsupplier1(){
        let i = 1;	
        return $('#hutangsudahsupplier1').DataTable({
            responsive : true,
            retrieve: true,
            autoWidth : true,
            buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],        
            dom: 'lBfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 5000, -1 ],
                [ '10', '25', '50', '100', '500','1000','5000', 'All' ]
            ],
            
            footerCallback: function (row, data, start, end, display) {
            let api = this.api();
    
            // Remove the formatting to get integer data for summation
            let intVal = function (i) {
                return typeof i === 'string'
                    ? i.replace(/[\$,]/g, '') * 1
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
    
            // Total over all pages
            totalhutang = api
                .column(8)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            sudahbayar = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            saldo = api
                .column(10)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhutang = api
                .column(8, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesudahbayar = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesaldo = api
                .column(10, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(3).footer().innerHTML = 'SUB TOTAL :';
            api.column(8).footer().innerHTML = formatAngka(pagetotalhutang,'');
            api.column(9).footer().innerHTML = formatAngka(pagesudahbayar,'');
            api.column(10).footer().innerHTML = formatAngka(pagesaldo,'');
            },
            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.hutangpiutang_showhutangpiutangsudahsupplier')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'supplier.kode', className: 'dt-center' },
                { data: 'supplier', name: 'supplier.supplier', className: 'dt-left' },
                { data: 'alamat', name: 'supplier.alamat', className: 'dt-left' },
                { data: 'xangsuran', name: 'xangsuran', className: 'dt-center' },
                { data: 'nilaiangsuran', name: 'nilaiangsuran', className: 'dt-right' },
                { data: 'asli', name: 'asli', className: 'dt-right' },
                { data: 'sudahbayar', name: 'sudahbayar', className: 'dt-right' },
                { data: 'saldo', name: 'saldo', className: 'dt-right' },
            ]
        });
    }
    
    function tampil_hutangsudahcustomer1(){
        let i = 1;	
        return $('#hutangsudahcustomer1').DataTable({
            responsive : true,
            retrieve: true,
            autoWidth : true,
            buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],        
            dom: 'lBfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 5000, -1 ],
                [ '10', '25', '50', '100', '500','1000','5000', 'All' ]
            ],
            footerCallback: function (row, data, start, end, display) {
            let api = this.api();
    
            // Remove the formatting to get integer data for summation
            let intVal = function (i) {
                return typeof i === 'string'
                    ? i.replace(/[\$,]/g, '') * 1
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
    
            // Total over all pages
            totalhutang = api
                .column(8)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            sudahbayar = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            saldo = api
                .column(10)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhutang = api
                .column(8, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesudahbayar = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesaldo = api
                .column(10, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(3).footer().innerHTML = 'SUB TOTAL :';
            api.column(8).footer().innerHTML = formatAngka(pagetotalhutang,'');
            api.column(9).footer().innerHTML = formatAngka(pagesudahbayar,'');
            api.column(10).footer().innerHTML = formatAngka(pagesaldo,'');
            },
            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.hutangpiutang_showhutangpiutangsudahcustomer')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'nia', name: 'anggota.nia', className: 'dt-center' },
                { data: 'nama', name: 'anggota.nama', className: 'dt-left' },
                { data: 'lembaga', name: 'anggota.lembaga.lembaga', className: 'dt-left' },
                { data: 'xangsuran', name: 'xangsuran', className: 'dt-center' },
                { data: 'nilaiangsuran', name: 'nilaiangsuran', className: 'dt-right' },
                { data: 'asli', name: 'asli', className: 'dt-right' },
                { data: 'sudahbayar', name: 'sudahbayar', className: 'dt-right' },
                { data: 'saldo', name: 'saldo', className: 'dt-right' },
            ]
        });
    }
   
    function tampil_hutangsajasupplier1(){
        let i = 1;	
        return $('#hutangsajasupplier1').DataTable({
            responsive : true,
            retrieve: true,
            autoWidth : true,
            buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],        
            dom: 'lBfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 5000, -1 ],
                [ '10', '25', '50', '100', '500','1000','5000', 'All' ]
            ],
            
            footerCallback: function (row, data, start, end, display) {
            let api = this.api();
    
            // Remove the formatting to get integer data for summation
            let intVal = function (i) {
                return typeof i === 'string'
                    ? i.replace(/[\$,]/g, '') * 1
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
    
            // Total over all pages
            totalhutang = api
                .column(8)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            sudahbayar = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            saldo = api
                .column(10)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhutang = api
                .column(8, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesudahbayar = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            pagesaldo = api
                .column(10, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(3).footer().innerHTML = 'SUB TOTAL :';
            api.column(8).footer().innerHTML = formatAngka(pagetotalhutang,'');
            api.column(9).footer().innerHTML = formatAngka(pagesudahbayar,'');
            api.column(10).footer().innerHTML = formatAngka(pagesaldo,'');
            },
            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.hutangpiutang_showhutangpiutangsajasupplier')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'supplier.kode', className: 'dt-center' },
                { data: 'supplier', name: 'supplier.supplier', className: 'dt-left' },
                { data: 'alamat', name: 'supplier.alamat', className: 'dt-left' },
                { data: 'xangsuran', name: 'xangsuran', className: 'dt-center' },
                { data: 'nilaiangsuran', name: 'nilaiangsuran', className: 'dt-right' },
                { data: 'asli', name: 'asli', className: 'dt-right' },
                { data: 'sudahbayar', name: 'sudahbayar', className: 'dt-right' },
                { data: 'saldo', name: 'saldo', className: 'dt-right' },
            ]
        });
    }
    
    function tampil_hutangsajacustomer1(){
        let i = 1;	
        return $('#hutangsajacustomer1').DataTable({
            responsive : true,
            retrieve: true,
            autoWidth : true,
            buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],        
            dom: 'lBfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 5000, -1 ],
                [ '10', '25', '50', '100', '500','1000','5000', 'All' ]
            ],
            footerCallback: function (row, data, start, end, display) {
            let api = this.api();
    
            // Remove the formatting to get integer data for summation
            let intVal = function (i) {
                return typeof i === 'string'
                    ? i.replace(/[\$,]/g, '') * 1
                    : typeof i === 'number'
                    ? i
                    : 0;
            };
    
            // Total over all pages
            totalhutang = api
                .column(6)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);

            // Total over this page
            pagetotalhutang = api
                .column(6, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(2).footer().innerHTML = 'SUB TOTAL :';
            api.column(6).footer().innerHTML = formatAngka(pagetotalhutang,'');
            },
            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.hutangpiutang_showhutangpiutangsajacustomer')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nia', name: 'anggota.nia', className: 'dt-center' },
                { data: 'nama', name: 'anggota.nama', className: 'dt-left' },
                { data: 'lembaga', name: 'anggota.lembaga.lembaga', className: 'dt-left' },
                { data: 'xangsuran', name: 'xangsuran', className: 'dt-center' },
                { data: 'nilaiangsuran', name: 'nilaiangsuran', className: 'dt-right' },
                { data: 'asli', name: 'asli', className: 'dt-right' },
            ]
        });
    }
   
    function tampil_dataTable(){        
        hutangbelumsupplier1Datatable.draw(null, false);        
        hutangbelumcustomer1Datatable.draw(null, false);        
        hutangsudahsupplier1Datatable.draw(null, false);        
        hutangsudahcustomer1Datatable.draw(null, false);        
        hutangsajasupplier1Datatable.draw(null, false);        
        hutangsajacustomer1Datatable.draw(null, false);        
                      
    }

    function koneksi_datatable(){
        hutangbelumsupplier1Datatable = tampil_hutangbelumsupplier1();    
        hutangbelumcustomer1Datatable = tampil_hutangbelumcustomer1();    
        hutangsudahsupplier1Datatable = tampil_hutangsudahsupplier1();    
        hutangsudahcustomer1Datatable = tampil_hutangsudahcustomer1();   
        hutangsajasupplier1Datatable = tampil_hutangsajasupplier1();    
        hutangsajacustomer1Datatable = tampil_hutangsajacustomer1();   
        
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