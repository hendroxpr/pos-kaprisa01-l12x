@extends('admin.layouts.main')

@section('contents')

@php
    $idruang = session('idruang1');
    if($idruang==''){
        $idruang = '1';
    }    
   
    $tabstok = session('tabstok1');
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
                <div class="row">
                    <div class="col-md-3 mt-2 text-right">
                        <h6>Lokasi</h6>
                    </div>
                    <div class="col-md-7">
                        <select name="idruang1" id="idruang1" class="w3-input w3-border" value="{{ $idruang }}"></select>
                        <input name="tabstok1" id="tabstok1" class="" type="hidden" value="{{ $tabstok }}"> 
                        <input name="event1" id="event1" class="" type="hidden" value="0"> 
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 text-right">
                        <h6 class="mt-2">Periode Tanggal</h6>
                    </div>
                    <div class="col-md-3">
                        <input name="tgltransaksi1" id="tgltransaksi1" class="w3-input w3-border" maxlength="10" type="text" placeholder="Tanggal awal" autocomplete="off" value="{{ $tgltransaksi1 }}">                       
                    </div>
                    <div class="col-md-1 text-center">
                        <h6 class="mt-2">s/d</h6>
                    </div>
                    <div class="col-md-3">
                        <input name="tgltransaksi2" id="tgltransaksi2" class="w3-input w3-border" maxlength="10" type="text" placeholder="Tanggal akhir" autocomplete="off" value="{{ $tgltransaksi2 }}">                       
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
                    <button id="btn_tambah1" name="btn_tambah1" type="button" class="btn bg-primary rounded-0" style="display: none;"><i class="fas fa-plus"></i> Tambah</button>	            
                </div> 
            </div>
        </div>

    </div>

    <ul class="nav nav-tabs" id="tab-stok" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="tab-stokmasuk" data-toggle="pill" href="#isi-tab-stokmasuk" role="tab" aria-controls="tab-stokmasuk" aria-selected="true">Masuk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokmasukfifo" data-toggle="pill" href="#isi-tab-stokmasukfifo" role="tab" aria-controls="tab-stokmasukfifo" aria-selected="false">Masuk FIFO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokmasukmova" data-toggle="pill" href="#isi-tab-stokmasukmova" role="tab" aria-controls="tab-stokmasukmova" aria-selected="false">Masuk Moving Average</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokmasuklifo" data-toggle="pill" href="#isi-tab-stokmasuklifo" role="tab" aria-controls="tab-stokmasuklifo" aria-selected="false">Masuk LIFO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokkeluar" data-toggle="pill" href="#isi-tab-stokkeluar" role="tab" aria-controls="tab-stokkeluar" aria-selected="false">Keluar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokkeluarfifo" data-toggle="pill" href="#isi-tab-stokkeluarfifo" role="tab" aria-controls="tab-stokkeluarfifo" aria-selected="false">Keluar FIFO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokkeluarmova" data-toggle="pill" href="#isi-tab-stokkeluarmova" role="tab" aria-controls="tab-stokkeluarmova" aria-selected="false">Keluar Moving Average</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokkeluarlifo" data-toggle="pill" href="#isi-tab-stokkeluarlifo" role="tab" aria-controls="tab-stokkeluarlifo" aria-selected="false">Keluar LIFO</a>
        </li>               
        <li class="nav-item">
            <a class="nav-link" id="tab-stokrekap" data-toggle="pill" href="#isi-tab-stokrekap" role="tab" aria-controls="tab-stokrekap" aria-selected="false">Rekap</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokrekapfifo" data-toggle="pill" href="#isi-tab-stokrekapfifo" role="tab" aria-controls="tab-stokrekapfifo" aria-selected="false">Rekap FIFO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-stokrekapmova" data-toggle="pill" href="#isi-tab-stokrekapmova" role="tab" aria-controls="tab-stokrekapmova" aria-selected="false">Rekap Moving Average</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab-storekaplifo" data-toggle="pill" href="#isi-tab-stokrekaplifo" role="tab" aria-controls="tab-stokrekaplifo" aria-selected="false">Rekap LIFO</a>
        </li>               
    </ul>

    <!--awal tabel-->        
    <div class="box-body" id="headerjudul" style="display: block;">
        <div class="tab-content mt-3" id="tab-stok-tabContent">

            <!--tab-stokmasuk -->
            <div class="tab-pane fade" id="isi-tab-stokmasuk" role="tabpanel" aria-labelledby="tab-stokmasuk">
                <div id="reload" class="table-responsive">
                    <table id="stokmasuk1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty</th>							
                                <th style="width:20px">HPP</th>							
                                <th style="width:20px">Total HPP</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokmasuk1">
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
                        <tbody id="show_stokmasuk1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokmasuk -->
            
            <!--tab-stokmasukfifo -->
            <div class="tab-pane fade" id="isi-tab-stokmasukfifo" role="tabpanel" aria-labelledby="tab-stokmasukfifo">
                <div id="reload" class="table-responsive">
                    <table id="stokmasukfifo1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty</th>							
                                <th style="width:20px">HPP</th>							
                                <th style="width:20px">Total HPP</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokmasukfifo1">
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
                        <tbody id="show_stokmasukfifo1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokmasukfifo -->
            
            <!--tab-stokmasukmova -->
            <div class="tab-pane fade" id="isi-tab-stokmasukmova" role="tabpanel" aria-labelledby="tab-stokmasukmova">
                <div id="reload" class="table-responsive">
                    <table id="stokmasukmova1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty</th>							
                                <th style="width:20px">HPP</th>							
                                <th style="width:20px">Total HPP</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokmasukmova1">
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
                        <tbody id="show_stokmasukmova1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokmasukmova -->

            <!--tab-stokmasuklifo -->
            <div class="tab-pane fade" id="isi-tab-stokmasuklifo" role="tabpanel" aria-labelledby="tab-stokmasuklifo">
                <div id="reload" class="table-responsive">
                    <table id="stokmasuklifo1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty</th>							
                                <th style="width:20px">HPP</th>							
                                <th style="width:20px">Total HPP</th>							
                                <th style="width:50px">Keterangan</th>								
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokmasuklifo1">
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
                        <tbody id="show_stokmasuklifo1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokmasuklifo -->

            <!--tab-stokkeluar -->
            <div class="tab-pane fade" id="isi-tab-stokkeluar" role="tabpanel" aria-labelledby="tab-stokkeluar">
                <div id="reload" class="table-responsive">
                    <table id="stokkeluar1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty</th>							
                                <th style="width:20px">HPP</th>							
                                <th style="width:20px">Total HPP</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokkeluar1">
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
                        <tbody id="show_stokkeluar1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokkeluar -->

            <!--tab-stokkeluarfifo -->
            <div class="tab-pane fade" id="isi-tab-stokkeluarfifo" role="tabpanel" aria-labelledby="tab-stokkeluarfifo">
                <div id="reload" class="table-responsive">
                    <table id="stokkeluarfifo1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty</th>							
                                <th style="width:20px">HPP</th>							
                                <th style="width:20px">Total HPP</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokkeluarfifo1">
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
                        <tbody id="show_stokkeluarfifo1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokkeluarfifo -->

            <!--tab-stokkeluarmova -->
            <div class="tab-pane fade" id="isi-tab-stokkeluarmova" role="tabpanel" aria-labelledby="tab-stokkeluarmova">
                <div id="reload" class="table-responsive">
                    <table id="stokkeluarmova1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty</th>							
                                <th style="width:20px">HPP</th>							
                                <th style="width:20px">Total HPP</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokkeluarmova1">
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
                        <tbody id="show_stokkeluarmova1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokkeluarmova -->

            <!--tab-stokkeluarlifo -->
            <div class="tab-pane fade" id="isi-tab-stokkeluarlifo" role="tabpanel" aria-labelledby="tab-stokkeluarlifo">
                <div id="reload" class="table-responsive">
                    <table id="stokkeluarlifo1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty</th>							
                                <th style="width:20px">HPP</th>							
                                <th style="width:20px">Total HPP</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokkeluarlifo1">
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
                        <tbody id="show_stokkeluarlifo1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokkeluarlifo -->

            <!--tab-stokrekap -->
            <div class="tab-pane fade" id="isi-tab-stokrekap" role="tabpanel" aria-labelledby="tab-stokrekap">
                <div id="reload" class="table-responsive">
                    <table id="stokrekap1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty Masuk</th>							
                                <th style="width:20px">HPP Masuk</th>							
                                <th style="width:20px">Total HPP MASUK</th>							
                                <th style="width:10px">Qty Keluar</th>							
                                <th style="width:20px">HPP Keluar</th>							
                                <th style="width:20px">Total HPP Keluar</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokrekap1">
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
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="show_stokrekap1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokrekap -->

            <!--tab-stokrekapfifo -->
            <div class="tab-pane fade" id="isi-tab-stokrekapfifo" role="tabpanel" aria-labelledby="tab-stokrekapfifo">
                <div id="reload" class="table-responsive">
                    <table id="stokrekapfifo1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty Masuk</th>							
                                <th style="width:20px">HPP Masuk</th>							
                                <th style="width:20px">Total HPP MASUK</th>							
                                <th style="width:10px">Qty Keluar</th>							
                                <th style="width:20px">HPP Keluar</th>							
                                <th style="width:20px">Total HPP Keluar</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokrekapfifo1">
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
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="show_stokrekapfifo1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokrekapfifo -->

            <!--tab-stokrekapmova -->
            <div class="tab-pane fade" id="isi-tab-stokrekapmova" role="tabpanel" aria-labelledby="tab-stokrekapmova">
                <div id="reload" class="table-responsive">
                    <table id="stokrekapmova1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty Masuk</th>							
                                <th style="width:20px">HPP Masuk</th>							
                                <th style="width:20px">Total HPP MASUK</th>							
                                <th style="width:10px">Qty Keluar</th>							
                                <th style="width:20px">HPP Keluar</th>							
                                <th style="width:20px">Total HPP Keluar</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokrekapmova1">
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
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="show_stokrekapmova1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokrekapmova -->

            <!--tab-stokrekaplifo -->
            <div class="tab-pane fade" id="isi-tab-stokrekaplifo" role="tabpanel" aria-labelledby="tab-stokrekaplifo">
                <div id="reload" class="table-responsive">
                    <table id="stokrekaplifo1" class="table table-bordered table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width:10px;">#</th>                            
                                <th style="width:20px">Faktur</th>
                                <th style="width:20px">Tanggal</th>
                                <th style="width:50px">Kode</th>
                                <th style="width:50px">Barcode</th>
                                <th style="width:300px">Nama Barang</th>							
                                <th style="width:20px">Satuan</th>							
                                <th style="width:10px">Qty Masuk</th>							
                                <th style="width:20px">HPP Masuk</th>							
                                <th style="width:20px">Total HPP MASUK</th>							
                                <th style="width:10px">Qty Keluar</th>							
                                <th style="width:20px">HPP Keluar</th>							
                                <th style="width:20px">Total HPP Keluar</th>							
                                <th style="width:50px">Keterangan</th>							
                            </tr>
                        </thead>
                        <tfoot id="show_footerstokrekaplifo1">
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
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody id="show_stokrekaplifo1">
                        
                        </tbody>
                    </table>            
                </div>
            </div>
            <!--/tab-stokrekaplifo -->


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
                                <div class="col-md-4" align="right">										
                                    <h6 class="mt-2">Nama Barang *)</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                            <select name="idbarang1" id="idbarang1" class="js-select-auto__select form-control" style="border-radius:0px; height:40px;" autocomplete="true">                                   
                                            </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <button id="btn_cariid1x" name="btn_cariid1x" type="button" style="border-radius:0px; border:none;"><i style="font-size:24" class="fas">&#xf002;</i></button>
                                            </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <input name="idbarangx1" id="idbarangx1" class="" type="hidden">
                                </div>								  
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Stok Min</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="stokmin1" id="stokmin1" class="w3-input w3-border" maxlength="15" type="number" placeholder="Stok Min" value="{{ old('stokmin1') }}" required>
                                    <input name="cek1" id="cek1" class="" type="hidden">                                
                                    <input name="id1" id="id1" class="" type="hidden">

                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-1" align="right">									
                                    <h6 class="mt-2">Stok Max</h6>
                                </div>
                                <div class="col-md-8">
                                    <input name="stokmax1" id="stokmax1" class="w3-input w3-border" maxlength="15" type="number" placeholder="Stok Max" value="{{ old('stokmax1') }}" required>
                                </div>								  
                            </div>
                            <div class="row">
                                <div class="col-md-4" align="right">									
                                    <h6 class="mt-2">Aktif</h6>
                                </div>

                                <div class="col-md-8 mt-1" style="padding-left: 20px;">
                                    <div class="icheck-primary-white d-inline">
                                      <input type="radio" value='Y' id="aktif1xy" name="aktif1x">
                                      <label for="aktif1xy">
                                        <span class="text" style="padding-left: 2px; padding-right: 15px;">Y</span>
                                      </label>
                                    </div>
                                    <div class="icheck-primary-white d-inline text-white">
                                      <input type="radio" value='N' id="aktif1xn" name="aktif1x"  checked>
                                      <label for="aktif1xn">
                                        <span class="text" style="padding-left: 2px; padding-right: 15px;">N</span>
                                      </label>
                                    </div>
                                    <input name="aktif1" id="aktif1" type="hidden">
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

    <!-- ModalCariID modal fade-->
	<div class="modal fade" id="ModalCariID"  data-backdrop="static">
		<div class="modal-dialog modal-lg">  <!-- modal-(sm, lg, xl) ukuran lebar modal -->
			<div class="modal-content bg-info w3-animate-zoom">
				
				<div class="modal-header">
						<h3 class="modal-title"><i style="font-size:18" class="fas">&#xf002;</i><b> Cari Data Barang</b></h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						
				</div>
				<form class="form-horizontal">
                    @csrf
					<div class="modal-body">
												
						<div class="row">
							<div id="reload" class="table-responsive">
								<table id="caribarang" width="100%" class="table table-bordered table-striped table-hover">
									<thead>
									<tr>
										<th width="5px">#</th>
										<th width="20px">Kode</th>																									
										<th width="20px">Barcode</th>																									
										<th width="50px">Nama Barang</th>																									
										<th width="30px">Kategori</th>																									
										<th width="20px">Satuan</th>																									
										<th width="10px">image</th>																									
									</tr>
								</thead>
								
								<tfoot id="show_footercaribarang">
									
								</tfoot>
								<tbody id="show_datacaribarang">
								
								</tbody>
								</table>
							</div>			
						</div>
						
					</div>
					<div class="modal-footer justify-content-between" align="right">
						<button type="button" class="w3-button w3-border w3-border-white" data-dismiss="modal">Tutup</button>
					</div>
				</form>
			</div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
	</div>
	<!-- end ModalCariID-->

    <!-- khusus menyimpan data yang akan dihapus -->
    <input name="id3" id="id3"type="hidden">	
    <input name="data3a" id="data3a"type="hidden">	
    <input name="data3b" id="data3b"type="hidden">	
    <input name="data3c" id="data3c"type="hidden">	

</div>


<script type="text/javascript">
    var stokmasuk1Datatable;
    var stokmasukfifo1Datatable;
    var stokmasukmova1Datatable;
    var stokmasuklifo1Datatable;
    var stokkeluar1Datatable;
    var stokkeluarmova1Datatable;
    var stokkeluarfifo1Datatable;
    var stokkeluarlifo1Datatable;
    var stokrekap1Datatable;
    var stokrekapmova1Datatable;
    var stokrekapfifo1Datatable;
    var stokrekaplifo1Datatable;

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
        if($('#tabstok1').val()=='tab-stokmasuk'){
            $('#tab-stokmasuk').click();            
        }else if($('#tabstok1').val()=='tab-stokmasukfifo'){
            $('#tab-stokmasukfifo').click();            
        }else if($('#tabstok1').val()=='tab-stokmasukmova'){
            $('#tab-stokmasukmova').click();            
        }else if($('#tabstok1').val()=='tab-stokmasuklifo'){
            $('#tab-stokmasuklifo').click();            
        }else if($('#tabstok1').val()=='tab-stokkeluar'){
            $('#tab-stokkeluar').click();            
        }else if($('#tabstok1').val()=='tab-stokkeluarfifo'){
            $('#tab-stokkeluarfifo').click();            
        }else if($('#tabstok1').val()=='tab-stokkeluarmova'){
            $('#tab-stokkeluarmova').click();            
        }else if($('#tabstok1').val()=='tab-stokkeluarlifo'){
            $('#tab-stokkeluarlifo').click();            
        }else if($('#tabstok1').val()=='tab-stokrekap'){
            $('#tab-stokrekap').click();            
        }else if($('#tabstok1').val()=='tab-stokrekapfifo'){
            $('#tab-stokrekapfifo').click();            
        }else if($('#tabstok1').val()=='tab-stokrekapmova'){
            $('#tab-stokrekapmova').click();            
        }else if($('#tabstok1').val()=='tab-stokrekaplifo'){
            $('#tab-stokrekaplifo').click();            
        }else{
            $('#tab-stokmasuk').click();            
        }
    }, 100);

    $('#tab-stokmasuk').on('click',function(){
        $('#tabstok1').val('tab-stokmasuk');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokmasukfifo').on('click',function(){
        $('#tabstok1').val('tab-stokmasukfifo');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokmasukmova').on('click',function(){
        $('#tabstok1').val('tab-stokmasukmova');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokmasuklifo').on('click',function(){
        $('#tabstok1').val('tab-stokmasuklifo');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokkeluar').on('click',function(){
        $('#tabstok1').val('tab-stokkeluar');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokkeluarfifo').on('click',function(){
        $('#tabstok1').val('tab-stokkeluarfifo');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokkeluarmova').on('click',function(){
        $('#tabstok1').val('tab-stokkeluarmova');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokkeluarlifo').on('click',function(){
        $('#tabstok1').val('tab-stokkeluarlifo');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokrekap').on('click',function(){
        $('#tabstok1').val('tab-stokrekap');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokrekapfifo').on('click',function(){
        $('#tabstok1').val('tab-stokrekapfifo');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokrekapmova').on('click',function(){
        $('#tabstok1').val('tab-stokrekapmova');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
    $('#tab-stokrekaplifo').on('click',function(){
        $('#tabstok1').val('tab-stokrekaplifo');
        $('#event1').val('0');
        setTimeout(() => {
            kirimsyarat();	
        }, 100);
    });
        
    //menampilkan combo ruang
    setTimeout(() => {
        tampil_listruang();
    }, 500);
    
    koneksi_datatable();

    $('#idruang1').on('change',function(){
        $('#event1').val('1');
        setTimeout(() => {
            kirimsyarat();	
        }, 500);
    });

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
    
    $('#tgltransaksi1').on('click',function(){
        $('#event1').val('1');       
        setTimeout(() => {
            kirimsyarat();           
        }, 500);     				
    });
    
    $('#tgltransaksi1').on('change',function(){	
        $('#event1').val('1');			
        setTimeout(() => {
            kirimsyarat();
        }, 500);					
    });
    $('#tgltransaksi2').on('click',function(){  
        $('#event1').val('1');     
        setTimeout(() => {
            kirimsyarat();           
        }, 100);     				
    });
    
    $('#tgltransaksi2').on('change',function(){	
        $('#event1').val('1');			
        setTimeout(() => {
            kirimsyarat();
        }, 100);					
    });
    
    function kirimsyarat(){
        var event1=$('#event1').val();
        
        var idruang1=$('#idruang1').val();
        var tabstok1=$('#tabstok1').val();
        var tgltransaksi1=$('#tgltransaksi1').val();
        var tgltransaksi2=$('#tgltransaksi2').val();
        
        let formData = new FormData();
            formData.append('idruang1', idruang1);
            formData.append('tabstok1', tabstok1);
            formData.append('tgltransaksi1', tgltransaksi1);
            formData.append('tgltransaksi2', tgltransaksi2);

        $.ajax({
            enctype: 'multipart/form-data',
            type   : 'post',
            url    : '{{route('pos01.laporan.stokkeluarmasuk_kirimsyarat')}}',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },				 				
            success : function(formData){ 
                    if(event1=='1'){
                        $("#idruang1").val(idruang1);                                        
                        tampil_dataTable();                   
                    }
                }
        });
    }
 
    //menampilkan combo ruang
    function tampil_listruang(){				
        $.ajax({
            type: 'get',
            url   : '{{route('pos01.laporan.stokkeluarmasuk_listruang')}}',
            
            success: function(data){				    
                $("#idruang1").html(data);
                $("#idruang1").val({{ $idruang }});

            }
        })                    
    }

    //menampilkan combo barang
    function tampil_listbarang(){				
        $.ajax({
            type: 'get',
            url   : '{{route('pos01.master.barangruang_listbarang')}}',
            
            success: function(data){				    
                $("#idbarang1").html(data);
            }
        })                    
    }

    //menampilkan combo barangedit
    function tampil_listbarangedit(){				
        $.ajax({
            type: 'get',
            url   : '{{route('pos01.master.barcode_listbarang')}}',
            
            success: function(data){				    
                $("#idbarang1").html(data);
            }
        })                    
    }

    $('#aktif1xy').on('change',function(){				
        $('#aktif1').val("Y");						
    });
    $('#aktif1xn').on('change',function(){				
        $('#aktif1').val("N");						
    });

    function tampil_stokmasuk1(){
        let i = 1;	
        return $('#stokmasuk1').DataTable({
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
            totalhpp = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhpp = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhpp,'');
            },


            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokmasuk')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'masuk', name: 'masuk', className: 'dt-center' },
                { data: 'hbsmasuk', name: 'hbsmasuk', className: 'dt-right' },
                { data: 'hppmasuk', name: 'hppmasuk', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }
    
    function tampil_stokmasukfifo1(){
        let i = 1;	
        return $('#stokmasukfifo1').DataTable({
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
            totalhpp = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhpp = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhpp,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokmasukfifo')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'masuk', name: 'masuk', className: 'dt-center' },
                { data: 'hbsmasuk', name: 'hbsmasuk', className: 'dt-right' },
                { data: 'hppmasuk', name: 'hppmasuk', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }
    
    function tampil_stokmasukmova1(){
        let i = 1;	
        return $('#stokmasukmova1').DataTable({
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
            totalhpp = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhpp = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhpp,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokmasukmova')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'masuk', name: 'masuk', className: 'dt-center' },
                { data: 'hbsmasuk', name: 'hbsmasuk', className: 'dt-right' },
                { data: 'hppmasuk', name: 'hppmasuk', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }
    
    function tampil_stokmasuklifo1(){
        let i = 1;	
        return $('#stokmasuklifo1').DataTable({
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
            totalhpp = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhpp = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhpp,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokmasuklifo')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'masuk', name: 'masuk', className: 'dt-center' },
                { data: 'hbsmasuk', name: 'hbsmasuk', className: 'dt-right' },
                { data: 'hppmasuk', name: 'hppmasuk', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }
    
    function tampil_stokkeluar1(){
        let i = 1;	
        return $('#stokkeluar1').DataTable({
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
            totalhpp = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhpp = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhpp,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokkeluar')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'keluar', name: 'keluar', className: 'dt-center' },
                { data: 'hbskeluar', name: 'hbskeluar', className: 'dt-right' },
                { data: 'hppkeluar', name: 'hppkeluar', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }
    
    function tampil_stokkeluarfifo1(){
        let i = 1;	
        return $('#stokkeluarfifo1').DataTable({
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
            totalhpp = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhpp = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhpp,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokkeluarfifo')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'keluar', name: 'keluar', className: 'dt-center' },
                { data: 'hbskeluar', name: 'hbskeluar', className: 'dt-right' },
                { data: 'hppkeluar', name: 'hppkeluar', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }

    function tampil_stokkeluarmova1(){
        let i = 1;	
        return $('#stokkeluarmova1').DataTable({
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
            totalhpp = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhpp = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhpp,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokkeluarmova')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'keluar', name: 'keluar', className: 'dt-center' },
                { data: 'hbskeluar', name: 'hbskeluar', className: 'dt-right' },
                { data: 'hppkeluar', name: 'hppkeluar', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }

    function tampil_stokkeluarlifo1(){
        let i = 1;	
        return $('#stokkeluarlifo1').DataTable({
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
            totalhpp = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhpp = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhpp,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokkeluarlifo')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'keluar', name: 'keluar', className: 'dt-center' },
                { data: 'hbskeluar', name: 'hbskeluar', className: 'dt-right' },
                { data: 'hppkeluar', name: 'hppkeluar', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }

    function tampil_stokrekap1(){
        let i = 1;	
        return $('#stokrekap1').DataTable({
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
            totalhppm = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            
            totalhppk = api
                .column(12)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhppm = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            pagetotalhppk = api
                .column(12, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhppm,'');
            api.column(12).footer().innerHTML = formatAngka(pagetotalhppk,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokrekap')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'masuk', name: 'masuk', className: 'dt-center' },
                { data: 'hbsmasuk', name: 'hbsmasuk', className: 'dt-right' },
                { data: 'hppmasuk', name: 'hppmasuk', className: 'dt-right' },
                { data: 'keluar', name: 'keluar', className: 'dt-center' },
                { data: 'hbskeluar', name: 'hbskeluar', className: 'dt-right' },
                { data: 'hppkeluar', name: 'hppkeluar', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }

    function tampil_stokrekapfifo1(){
        let i = 1;	
        return $('#stokrekapfifo1').DataTable({
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
            totalhppm = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            
            totalhppk = api
                .column(12)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhppm = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            pagetotalhppk = api
                .column(12, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhppm,'');
            api.column(12).footer().innerHTML = formatAngka(pagetotalhppk,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokrekapfifo')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'masuk', name: 'masuk', className: 'dt-center' },
                { data: 'hbsmasuk', name: 'hbsmasuk', className: 'dt-right' },
                { data: 'hppmasuk', name: 'hppmasuk', className: 'dt-right' },
                { data: 'keluar', name: 'keluar', className: 'dt-center' },
                { data: 'hbskeluar', name: 'hbskeluar', className: 'dt-right' },
                { data: 'hppkeluar', name: 'hppkeluar', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }

    function tampil_stokrekapmova1(){
        let i = 1;	
        return $('#stokrekapmova1').DataTable({
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
            totalhppm = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            
            totalhppk = api
                .column(12)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhppm = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            pagetotalhppk = api
                .column(12, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhppm,'');
            api.column(12).footer().innerHTML = formatAngka(pagetotalhppk,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokrekapmova')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'masuk', name: 'masuk', className: 'dt-center' },
                { data: 'hbsmasuk', name: 'hbsmasuk', className: 'dt-right' },
                { data: 'hppmasuk', name: 'hppmasuk', className: 'dt-right' },
                { data: 'keluar', name: 'keluar', className: 'dt-center' },
                { data: 'hbskeluar', name: 'hbskeluar', className: 'dt-right' },
                { data: 'hppkeluar', name: 'hppkeluar', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }

    function tampil_stokrekaplifo1(){
        let i = 1;	
        return $('#stokrekaplifo1').DataTable({
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
            totalhppm = api
                .column(9)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
            
            totalhppk = api
                .column(12)
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Total over this page
            pagetotalhppm = api
                .column(9, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            pagetotalhppk = api
                .column(12, { page: 'current' })
                .data()
                .reduce((a, b) => intVal(a) + intVal(b), 0);
    
            // Update footer
            api.column(5).footer().innerHTML = 'SUB TOTAL :';
            api.column(9).footer().innerHTML = formatAngka(pagetotalhppm,'');
            api.column(12).footer().innerHTML = formatAngka(pagetotalhppk,'');
            },

            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.laporan.stokkeluarmasuk_showstokrekaplifo')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'nomorstatus', name: 'nomorstatus', className: 'dt-center' },
                { data: 'tglstatus', name: 'tglstatus', className: 'dt-center' },
                { data: 'kode', name: 'barang.kode', className: 'dt-center' },
                { data: 'barcode', name: 'barang.barcode', className: 'dt-center' },
                { data: 'barang', name: 'barang.barang' },
                { data: 'satuan', name: 'barang.satuan.kode', className: 'dt-center' },
                { data: 'masuk', name: 'masuk', className: 'dt-center' },
                { data: 'hbsmasuk', name: 'hbsmasuk', className: 'dt-right' },
                { data: 'hppmasuk', name: 'hppmasuk', className: 'dt-right' },
                { data: 'keluar', name: 'keluar', className: 'dt-center' },
                { data: 'hbskeluar', name: 'hbskeluar', className: 'dt-right' },
                { data: 'hppkeluar', name: 'hppkeluar', className: 'dt-right' },
                { data: 'keterangan', name: 'keterangan', className: 'dt-left' },
            ]
        });
    }

    function tampil_dataTable(){        
        stokmasuk1Datatable.draw(null, false);        
        stokmasukfifo1Datatable.draw(null, false);        
        stokmasuklifo1Datatable.draw(null, false);        
        stokmasukmova1Datatable.draw(null, false);        
        stokkeluar1Datatable.draw(null, false);        
        stokkeluarfifo1Datatable.draw(null, false);        
        stokkeluarmova1Datatable.draw(null, false);        
        stokkeluarlifo1Datatable.draw(null, false); 
        stokrekap1Datatable.draw(null, false);        
        stokrekapfifo1Datatable.draw(null, false);        
        stokrekapmova1Datatable.draw(null, false);        
        stokrekaplifo1Datatable.draw(null, false);        
    }

    function koneksi_datatable(){
        stokmasuk1Datatable = tampil_stokmasuk1();    
        stokmasukfifo1Datatable = tampil_stokmasukfifo1();    
        stokmasukmova1Datatable = tampil_stokmasukmova1();    
        stokmasuklifo1Datatable = tampil_stokmasuklifo1();    
        stokkeluar1Datatable = tampil_stokkeluar1();    
        stokkeluarfifo1Datatable = tampil_stokkeluarfifo1();    
        stokkeluarmova1Datatable = tampil_stokkeluarmova1();    
        stokkeluarlifo1Datatable = tampil_stokkeluarlifo1();    
        stokrekap1Datatable = tampil_stokrekap1();    
        stokrekapfifo1Datatable = tampil_stokrekapfifo1();    
        stokrekapmova1Datatable = tampil_stokrekapmova1();    
        stokrekaplifo1Datatable = tampil_stokrekaplifo1(); 
    }

    $('#btn_cariid1x').on('click',function(){
        // caribarangDatatable.draw(null, false);
        setTimeout(() => {
            $('#ModalCariID').modal('show');						
        }, 300);
    });

    caribarangDatatable = tampil_data_caribarang();    
     function tampil_data_caribarang(){
        let i = 1;	
        return $('#caribarang').DataTable({
            responsive : true,
            retrieve: true,
            autoWidth : true,
            // buttons : [ {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] }, {extend:'copy'}, {extend:'csv'}, {extend: 'pdf', orientation: 'portrait', pageSize: 'A4', title:'{{ $caption }}'}, {extend: 'excel', title: '{{ $caption }}'}, {extend:'print', orientation: 'portrait', pageSize: 'A4', title: '{{ $caption }}'}, ],        
            // dom: 'lBfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 5000, -1 ],
                [ '10', '25', '50', '100', '500','1000','5000', 'All' ]
            ],
            processing: true,
            serverSide: true,
            ajax   : `{{route('pos01.master.barangruang_showbarang')}}`,
            columns: [
                // { data: 'no', name:'id', render: function (data, type, row, meta) {
                //     return meta.row + meta.settings._iDisplayStart + 1;
                // }},
                {  "data": 'DT_RowIndex',
                    orderable: false, 
                    searchable: false },
                { data: 'kode', name: 'kode' },
                { data: 'barcode', name: 'barcode' },
                { data: 'nabara', name: 'nabara' },
                { data: 'kategori', name: 'kategori' },
                { data: 'satuan', name: 'satuan' },
                { data: 'image', name: 'image' },
                               
                // { data: 'action', name: 'action'},
            ]
        });
    }

    $('#show_datacaribarang').on('click','.item_kode',function(){
        ambilcari(this);        
    });
    $('#show_datacaribarang').on('click','.item_barcode',function(){
        ambilcari(this);        
    });
    $('#show_datacaribarang').on('click','.item_kategori',function(){
        ambilcari(this);        
    });
    $('#show_datacaribarang').on('click','.item_satuan',function(){
        ambilcari(this);        
    });
    $('#show_datacaribarang').on('click','.item_nabara',function(){
        ambilcari(this);        
    });
    $('#show_datacaribarang').on('click','.item_image',function(){
        ambilcari(this);        
    });

    function ambilcari(t){
        var data1 = $(t).attr('data1');
        var data2 = $(t).attr('data2');
        var data3 = $(t).attr('data3');
        var data4 = $(t).attr('data4');
        var data5 = $(t).attr('data5');
        $('#ModalCariID').modal('hide');
        $('#idbarang1').val(data1);

    }

    function btn_baru_click(){ 
        $('[name="aktif1"]').val("Y");
        if ($('[name="aktif1"]').val()=='Y'){
            document.getElementById("aktif1xy").checked = true
        }else{
            document.getElementById("aktif1xn").checked = true
        }

        tampil_listbarang();

        $('#bodyAdd :input').prop('disabled', false);
        document.getElementById("btn_simpan").style.display='block';        
        document.getElementById("btn_baru").style.display='none';
    }
    
    function btn_simpan_click(){      
        $('#bodyAdd :input').prop('disabled', true);
        document.getElementById("btn_simpan").style.display='none';        
        document.getElementById("btn_baru").style.display='block';
        swaltambah($('#idbarang1 option:selected').text());
        
    }

    function btn_edit_click(){
        tampil_listbarangedit();      
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
        var idruang1=$('#idruang1').val();
        var idbarang1=$('#idbarang1').val();
        var stokmin1=$('#stokmin1').val();
        var stokmax1=$('#stokmax1').val();
        var aktif1=$('#aktif1').val();
        
        let formData = new FormData();
            formData.append('id1', id1);
            formData.append('idruang1', idruang1);
            formData.append('idbarang1', idbarang1);
            formData.append('stokmin1', stokmin1);
            formData.append('stokmax1', stokmax1);
            formData.append('aktif1', aktif1);
          
        $.ajax({
            enctype: 'multipart/form-data',
            type   : 'post',
            url    : '{{route('pos01.master.barangruang_create')}}',
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
                swalgagaltambah($('#idbarang1 option:selected').text());                 
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
        setTimeout(() => {
            var idb = $('#idbarangx1').val(); 
            $('#idbarang1').val(idb);
        }, 500);
    }
    
    function data_edit(idx){
        
        var id1=idx;			
            $.ajax({
		        type  : 'get',
		        url   : `{{ url('pos01/master/barangruangedit')}}/${id1}`,
		        async : false,
		        dataType : 'json',	
				
		        success : function(data){
                    var i;                
                    var resultData = data.data;	                			
                    for(i=0; i<resultData.length; i++){

                            $('#id1').val(resultData[i].id);
                            $('#idbarang1').val(resultData[i].idbarang);
                            $('#idbarangx1').val(resultData[i].idbarang);

                            $('#stokmin1').val(resultData[i].stokmin);
                            $('#stokmax1').val(resultData[i].stokmax);
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
        text: $('#data3a').val(),
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
            url   : '{{url('pos01/master/barangruangdestroy')}}/'+id3,
            async : false,
            dataType : 'json',					
            success : function(data){
                tampil_dataTable();
                swalhapus(data3b); 
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