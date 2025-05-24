<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Modules\Pos01\Http\Controllers\laporan\KartustokController;
use Modules\Pos01\Http\Controllers\laporan\StokkeluarmasukController;
use Modules\Pos01\Http\Controllers\laporan\StokbarangController;
use Modules\Pos01\Http\Controllers\pengaturan\ParameterController;
use Modules\Pos01\Http\Controllers\transaksi\BayarhutangController;
use Modules\Pos01\Http\Controllers\transaksi\BmasukController;
use Modules\Pos01\Http\Controllers\master\BarangController;
use Modules\Pos01\Http\Controllers\master\BarangruangController;
use Modules\Pos01\Http\Controllers\master\BarcodeController;
use Modules\Pos01\Http\Controllers\master\KategoriController;
use Modules\Pos01\Http\Controllers\master\RuangController;
use Modules\Pos01\Http\Controllers\master\SeksiController;
use Modules\Pos01\Http\Controllers\master\AnggotaController;
use Modules\Pos01\Http\Controllers\master\SatuanController;
use Modules\Pos01\Http\Controllers\master\SupplierController;
use Modules\Pos01\Http\Controllers\master\LembagaController;
use Modules\Pos01\Http\Controllers\Pos01Controller;
use Modules\Pos01\Http\Controllers\transaksi\BkeluarController;

// use Modules\Pos01\Http\Controllers\master\AnggotaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group([], function () {
//     Route::resource('pos01', Pos01Controller::class)->names('pos01');
// });

Route::prefix('pos01')->group(function() {
    // Route::get('/', 'Pos01Controller@index');

/* master - anggota */
Route::get('/master/anggota', [AnggotaController::class, 'index'])->name('pos01.master.anggota.index')->middleware('auth'); /* halaman anggota */
Route::get('/master/anggotashow', [AnggotaController::class, 'show'])->name('pos01.master.anggota_show')->middleware('auth'); /* menampilkan data anggota pada datatable javascript */
Route::get('/master/anggotalistlembaga', [AnggotaController::class, 'listlembaga'])->name('pos01.master.anggota_listlembaga')->middleware('auth'); /* menampilkan list lembaga */
Route::post('/master/anggotacreate', [AnggotaController::class, 'create'])->name('pos01.master.anggota_create')->middleware('auth'); /* menambah anggota */
Route::get('/master/anggotaedit/{id}', [AnggotaController::class, 'edit'])->name('pos01.master.anggota_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/anggotadestroy/{id}', [AnggotaController::class, 'destroy'])->name('pos01.master.anggota_destroy')->middleware('auth'); /* hapus data anggota */

/* master - satuan */
Route::get('/master/satuan', [SatuanController::class, 'index'])->name('pos01.master.satuan.index')->middleware('auth'); /* halaman satuan */
Route::get('/master/satuanshow', [SatuanController::class, 'show'])->name('pos01.master.satuan_show')->middleware('auth'); /* menampilkan data satuan pada datatable javascript */
Route::post('/master/satuancreate', [SatuanController::class, 'create'])->name('pos01.master.satuan_create')->middleware('auth'); /* menambah satuan */
Route::get('/master/satuanedit/{id}', [SatuanController::class, 'edit'])->name('pos01.master.satuan_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/satuandestroy/{id}', [SatuanController::class, 'destroy'])->name('pos01.master.satuan_destroy')->middleware('auth'); /* hapus data satuan */

/* master - kategori */
Route::get('/master/kategori', [KategoriController::class, 'index'])->name('pos01.master.kategori.index')->middleware('auth'); /* halaman kategori */
Route::get('/master/kategorishow', [KategoriController::class, 'show'])->name('pos01.master.kategori_show')->middleware('auth'); /* menampilkan data kategori pada datatable javascript */
Route::post('/master/kategoricreate', [KategoriController::class, 'create'])->name('pos01.master.kategori_create')->middleware('auth'); /* menambah kategori */
Route::get('/master/kategoriedit/{id}', [KategoriController::class, 'edit'])->name('pos01.master.kategori_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/kategoridestroy/{id}', [KategoriController::class, 'destroy'])->name('pos01.master.kategori_destroy')->middleware('auth'); /* hapus data kategori */

/* master - barang */
Route::get('/master/barang', [BarangController::class, 'index'])->name('pos01.master.barang.index')->middleware('auth'); /* halaman barang */
Route::get('/master/barangshow', [BarangController::class, 'show'])->name('pos01.master.barang_show')->middleware('auth'); /* menampilkan data barang pada datatable javascript */
Route::get('/master/barangshowbarang', [BarangController::class, 'showbarang'])->name('pos01.master.barang_showbarang')->middleware('auth'); /* menampilkan data barang untuk pilihan pada datatable javascript */
Route::get('/master/baranglistkategori', [BarangController::class, 'listkategori'])->name('pos01.master.barang_listkategori')->middleware('auth'); /* menampilkan list kategori */
Route::get('/master/baranglistsatuan', [BarangController::class, 'listsatuan'])->name('pos01.master.barang_listsatuan')->middleware('auth'); /* menampilkan satuan */
Route::post('/master/barangcreate', [BarangController::class, 'create'])->name('pos01.master.barang_create')->middleware('auth'); /* menambah barang */
Route::get('/master/barangedit/{id}', [BarangController::class, 'edit'])->name('pos01.master.barang_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/barangdestroy/{id}', [BarangController::class, 'destroy'])->name('pos01.master.barang_destroy')->middleware('auth'); /* hapus data barang */

/* master - barangruang */
Route::get('/master/barangruang', [BarangruangController::class, 'index'])->name('pos01.master.barangruang.index')->middleware('auth'); /* halaman barangruang */
Route::get('/master/barangruangshow', [BarangruangController::class, 'show'])->name('pos01.master.barangruang_show')->middleware('auth'); /* menampilkan data barangruang pada datatable javascript */
Route::get('/master/barangruangshowbarang', [BarangruangController::class, 'showbarang'])->name('pos01.master.barangruang_showbarang')->middleware('auth'); /* menampilkan data barang yg gk ada di barangruang pada datatable javascript */
Route::get('/master/barangruanglistbarang', [BarangruangController::class, 'listbarang'])->name('pos01.master.barangruang_listbarang')->middleware('auth'); /* menampilkan list barang */
Route::get('/master/barangruanglistruang', [BarangruangController::class, 'listruang'])->name('pos01.master.barangruang_listruang')->middleware('auth'); /* menampilkan list ruang */
Route::post('/master/barangruangcreate', [BarangruangController::class, 'create'])->name('pos01.master.barangruang_create')->middleware('auth'); /* menambah barangruang */
Route::post('/master/barangruangkirimsyarat', [BarangruangController::class, 'kirimsyarat'])->name('pos01.master.barangruang_kirimsyarat')->middleware('auth'); /* kirimsyarat */
Route::get('/master/barangruangedit/{id}', [BarangruangController::class, 'edit'])->name('pos01.master.barangruang_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/barangruangdestroy/{id}', [BarangruangController::class, 'destroy'])->name('pos01.master.barangruang_destroy')->middleware('auth'); /* hapus data barangruang */

/* master - barcode */
Route::get('/master/barcode', [BarcodeController::class, 'index'])->name('pos01.master.barcode.index')->middleware('auth'); /* halaman barcode */
Route::get('/master/barcodeshow', [BarcodeController::class, 'show'])->name('pos01.master.barcode_show')->middleware('auth'); /* menampilkan data barcode pada datatable javascript */
Route::get('/master/barcodelistbarang', [BarcodeController::class, 'listbarang'])->name('pos01.master.barcode_listbarang')->middleware('auth'); /* menampilkan list barang */
Route::post('/master/barcodecreate', [BarcodeController::class, 'create'])->name('pos01.master.barcode_create')->middleware('auth'); /* menambah barcode */
Route::get('/master/barcodeedit/{id}', [BarcodeController::class, 'edit'])->name('pos01.master.barcode_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/barcodedestroy/{id}', [BarcodeController::class, 'destroy'])->name('pos01.master.barcode_destroy')->middleware('auth'); /* hapus data barcode */

/* master - supplier */
Route::get('/master/supplier', [SupplierController::class, 'index'])->name('pos01.master.supplier.index')->middleware('auth'); /* halaman supplier */
Route::get('/master/suppliershow', [SupplierController::class, 'show'])->name('pos01.master.supplier_show')->middleware('auth'); /* menampilkan data supplier pada datatable javascript */
Route::post('/master/suppliercreate', [SupplierController::class, 'create'])->name('pos01.master.supplier_create')->middleware('auth'); /* menambah supplier */
Route::get('/master/supplieredit/{id}', [SupplierController::class, 'edit'])->name('pos01.master.supplier_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/supplieredit/{id}', [SupplierController::class, 'edit'])->name('pos01.master.supplier_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/supplierdestroy/{id}', [SupplierController::class, 'destroy'])->name('pos01.master.supplier_destroy')->middleware('auth'); /* hapus data supplier */

/* master - lembaga */
Route::get('/master/lembaga', [LembagaController::class, 'index'])->name('pos01.master.lembaga.index')->middleware('auth'); /* halaman lembaga */
Route::get('/master/lembagashow', [LembagaController::class, 'show'])->name('pos01.master.lembaga_show')->middleware('auth'); /* menampilkan data lembaga pada datatable javascript */
Route::post('/master/lembagacreate', [LembagaController::class, 'create'])->name('pos01.master.lembaga_create')->middleware('auth'); /* menambah lembaga */
Route::get('/master/lembagaedit/{id}', [LembagaController::class, 'edit'])->name('pos01.master.lembaga_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/lembagaedit/{id}', [LembagaController::class, 'edit'])->name('pos01.master.lembaga_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/master/lembagadestroy/{id}', [LembagaController::class, 'destroy'])->name('pos01.master.lembaga_destroy')->middleware('auth'); /* hapus data lembaga */

/* master - seksi */
Route::get('/master/seksi', [SeksiController::class, 'index'])->name('pos01.master.seksi.index')->middleware('auth'); /* halaman seksi */
Route::get('/master/seksishow', [SeksiController::class, 'show'])->name('pos01.master.seksi_show')->middleware('auth'); /* menampilkan data seksi pada datatable javascript */
Route::post('/master/seksicreate', [SeksiController::class, 'create'])->name('pos01.master.seksi_create')->middleware('auth'); /* menambah data seksi */
Route::get('/master/seksiedit/{id}', [SeksiController::class, 'edit'])->name('pos01.master.seksi_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::post('/master/seksiupdate', [SeksiController::class, 'update'])->name('pos01.master.seksi_update')->middleware('auth'); /* update data seksi */
Route::get('/master/seksidestroy/{id}', [SeksiController::class, 'destroy'])->name('pos01.master.seksi_destroy')->middleware('auth'); /* hapus data seksi */

/* master - ruang */
Route::get('/master/ruang', [RuangController::class, 'index'])->name('pos01.master.ruang.index')->middleware('auth'); /* halaman ruang */
Route::get('/master/ruangshow', [RuangController::class, 'show'])->name('pos01.master.ruang_show')->middleware('auth'); /* menampilkan data ruang pada datatable javascript */
Route::get('/master/ruanglistseksi', [RuangController::class, 'listseksi'])->name('pos01.master.ruang_listseksi')->middleware('auth'); /* menampilkan list jurusan */
Route::post('/master/ruangcreate', [RuangController::class, 'create'])->name('pos01.master.ruang_create')->middleware('auth'); /* menambah data ruang */
Route::get('/master/ruangedit/{id}', [RuangController::class, 'edit'])->name('pos01.master.ruang_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::post('/master/ruangupdate', [RuangController::class, 'update'])->name('pos01.master.ruang_update')->middleware('auth'); /* update data ruang */
Route::post('/master/ruangkirimsyarat', [RuangController::class, 'kirimsyarat'])->name('pos01.master.ruang_kirimsyarat')->middleware('auth'); /* kirimsyarat */
Route::get('/master/ruangdelete/{id}', [RuangController::class, 'destroy'])->name('pos01.master.ruang_destroy')->middleware('auth'); /* hapus data ruang */

/* transaksi - bmasuk */
Route::get('/transaksi/bmasuk', [BmasukController::class, 'index'])->name('pos01.transaksi.bmasuk.index')->middleware('auth'); /* halaman bmasuk */
Route::get('/transaksi/bmasukshow', [BmasukController::class, 'show'])->name('pos01.transaksi.bmasuk_show')->middleware('auth'); /* menampilkan data bmasuk pada datatable javascript */
Route::post('/transaksi/bmasukkirimsyarat', [BmasukController::class, 'kirimsyarat'])->name('pos01.transaksi.bmasuk_kirimsyarat')->middleware('auth'); /* kirim syarat */
Route::get('/transaksi/bmasukshowbarang', [BmasukController::class, 'showbarang'])->name('pos01.transaksi.bmasuk_showbarang')->middleware('auth'); /* menampilkan barang pada datatable javascript */
Route::post('/transaksi/bmasuknomorbukti', [BmasukController::class, 'nomorbukti'])->name('pos01.transaksi.bmasuk_nomorbukti')->middleware('auth'); /* buat nomorbukti */
Route::post('/transaksi/bmasuknomorposting', [BmasukController::class, 'nomorposting'])->name('pos01.transaksi.bmasuk_nomorposting')->middleware('auth'); /* buat nomorposting */
Route::get('/transaksi/bmasuklistbarang', [BmasukController::class, 'listbarang'])->name('pos01.transaksi.bmasuk_listbarang')->middleware('auth'); /* menampilkan list barang */
Route::get('/transaksi/bmasuklistruang', [BmasukController::class, 'listruang'])->name('pos01.transaksi.bmasuk_listruang')->middleware('auth'); /* menampilkan list ruang */
Route::get('/transaksi/bmasuklistjenispembayaran', [BmasukController::class, 'listjenispembayaran'])->name('pos01.transaksi.bmasuk_listjenispembayaran')->middleware('auth'); /* menampilkan list jenispembayaran */
Route::get('/transaksi/bmasuklistsupplier', [BmasukController::class, 'listsupplier'])->name('pos01.transaksi.bmasuk_listsupplier')->middleware('auth'); /* menampilkan list supplier */
Route::post('/transaksi/bmasukcreate', [BmasukController::class, 'create'])->name('pos01.transaksi.bmasuk_create')->middleware('auth'); /* menambah data bmasuk */
Route::get('/transaksi/bmasukedit/{id}', [BmasukController::class, 'edit'])->name('pos01.transaksi.bmasuk_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::post('/transaksi/bmasukupdate', [BmasukController::class, 'update'])->name('pos01.transaksi.bmasuk_update')->middleware('auth'); /* update data bmasuk */
Route::post('/transaksi/bmasukposting', [BmasukController::class, 'posting'])->name('pos01.transaksi.bmasuk_posting')->middleware('auth'); /* posting data bmasuk */
Route::get('/transaksi/bmasukdestroy/{id}', [BmasukController::class, 'destroy'])->name('pos01.transaksi.bmasuk_destroy')->middleware('auth'); /* hapus data bmasuk */

/* transaksi - bkeluar */
Route::get('/transaksi/bkeluar', [BkeluarController::class, 'index'])->name('pos01.transaksi.bkeluar.index')->middleware('auth'); /* halaman bkeluar */
Route::get('/transaksi/bkeluarshow', [BkeluarController::class, 'show'])->name('pos01.transaksi.bkeluar_show')->middleware('auth'); /* menampilkan data bkeluar pada datatable javascript */
Route::post('/transaksi/bkeluarkirimsyarat', [BkeluarController::class, 'kirimsyarat'])->name('pos01.transaksi.bkeluar_kirimsyarat')->middleware('auth'); /* kirim syarat */
Route::post('/transaksi/bkeluarcariid', [BkeluarController::class, 'cariid'])->name('pos01.transaksi.bkeluar_cariid')->middleware('auth'); /* cari data anggota */
Route::get('/transaksi/bkeluarshowbarang', [BkeluarController::class, 'showbarang'])->name('pos01.transaksi.bkeluar_showbarang')->middleware('auth'); /* menampilkan barang pada datatable javascript */
Route::get('/transaksi/bkeluarshowanggota', [BkeluarController::class, 'showanggota'])->name('pos01.transaksi.bkeluar_showanggota')->middleware('auth'); /* menampilkan anggota pada datatable javascript */
Route::post('/transaksi/bkeluarnomorbukti', [BkeluarController::class, 'nomorbukti'])->name('pos01.transaksi.bkeluar_nomorbukti')->middleware('auth'); /* buat nomorbukti */
Route::post('/transaksi/bkeluarnomorposting', [BkeluarController::class, 'nomorposting'])->name('pos01.transaksi.bkeluar_nomorposting')->middleware('auth'); /* buat nomorposting */
Route::get('/transaksi/bkeluarlistbarang', [BkeluarController::class, 'listbarang'])->name('pos01.transaksi.bkeluar_listbarang')->middleware('auth'); /* menampilkan list barang */
Route::get('/transaksi/bkeluarlistruang', [BkeluarController::class, 'listruang'])->name('pos01.transaksi.bkeluar_listruang')->middleware('auth'); /* menampilkan list ruang */
Route::get('/transaksi/bkeluarlistanggota', [BkeluarController::class, 'listanggota'])->name('pos01.transaksi.bkeluar_listanggota')->middleware('auth'); /* menampilkan list anggota */
Route::get('/transaksi/bkeluarlistjenispembayaran', [BkeluarController::class, 'listjenispembayaran'])->name('pos01.transaksi.bkeluar_listjenispembayaran')->middleware('auth'); /* menampilkan list jenispembayaran */
Route::post('/transaksi/bkeluarcreate', [BkeluarController::class, 'create'])->name('pos01.transaksi.bkeluar_create')->middleware('auth'); /* menambah data bkeluar */
Route::post('/transaksi/bkeluarproses', [BkeluarController::class, 'proses'])->name('pos01.transaksi.bkeluar_proses')->middleware('auth'); /* menambah proses */
Route::get('/transaksi/bkeluaredit/{id}', [BkeluarController::class, 'edit'])->name('pos01.transaksi.bkeluar_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/transaksi/bkeluardisplaypembayaran/{id}', [BkeluarController::class, 'displaypembayaran'])->name('pos01.transaksi.bkeluar_displaypembayaran')->middleware('auth'); /* menampilkan pembayaran */
Route::get('/transaksi/bkeluarlihatpersen/{id}', [BkeluarController::class, 'lihatpersen'])->name('pos01.transaksi.bkeluar_lihatpersen')->middleware('auth'); /* menampilkan lihatpersen jasa */
Route::post('/transaksi/bkeluarupdate', [BkeluarController::class, 'update'])->name('pos01.transaksi.bkeluar_update')->middleware('auth'); /* update data bkeluar */
Route::post('/transaksi/bkeluarposting', [BkeluarController::class, 'posting'])->name('pos01.transaksi.bkeluar_posting')->middleware('auth'); /* posting data bkeluar */
Route::get('/transaksi/bkeluardestroy/{id}', [BkeluarController::class, 'destroy'])->name('pos01.transaksi.bkeluar_destroy')->middleware('auth'); /* hapus data bkeluar */

/* transaksi - bayarhutang */
Route::get('/transaksi/bayarhutang', [BayarhutangController::class, 'index'])->name('pos01.transaksi.bayarhutang.index')->middleware('auth'); /* halaman bayarhutang */
Route::get('/transaksi/bayarhutangshow', [BayarhutangController::class, 'show'])->name('pos01.transaksi.bayarhutang_show')->middleware('auth'); /* menampilkan data bayarhutang pada datatable javascript */
Route::post('/transaksi/bayarhutangkirimsyarat', [BayarhutangController::class, 'kirimsyarat'])->name('pos01.transaksi.bayarhutang_kirimsyarat')->middleware('auth'); /* kirim syarat */
Route::post('/transaksi/bayarhutangcariid', [BayarhutangController::class, 'cariid'])->name('pos01.transaksi.bayarhutang_cariid')->middleware('auth'); /* cari data anggota */
Route::get('/transaksi/bayarhutangshowhutang', [BayarhutangController::class, 'showhutang'])->name('pos01.transaksi.bayarhutang_showhutang')->middleware('auth'); /* menampilkan hutang pada datatable javascript */
Route::get('/transaksi/bayarhutangshowanggota', [BayarhutangController::class, 'showanggota'])->name('pos01.transaksi.bayarhutang_showanggota')->middleware('auth'); /* menampilkan anggota pada datatable javascript */
Route::post('/transaksi/bayarhutangnomorbukti', [BayarhutangController::class, 'nomorbukti'])->name('pos01.transaksi.bayarhutang_nomorbukti')->middleware('auth'); /* buat nomorbukti */
Route::post('/transaksi/bayarhutangnomorposting', [BayarhutangController::class, 'nomorposting'])->name('pos01.transaksi.bayarhutang_nomorposting')->middleware('auth'); /* buat nomorposting */
Route::get('/transaksi/bayarhutanglisthutang', [BayarhutangController::class, 'listhutang'])->name('pos01.transaksi.bayarhutang_listhutang')->middleware('auth'); /* menampilkan list hutang */
Route::get('/transaksi/bayarhutanglisthutangx', [BayarhutangController::class, 'listhutangx'])->name('pos01.transaksi.bayarhutang_listhutangx')->middleware('auth'); /* menampilkan list hutangx */
Route::get('/transaksi/bayarhutanglistruang', [BayarhutangController::class, 'listruang'])->name('pos01.transaksi.bayarhutang_listruang')->middleware('auth'); /* menampilkan list ruang */
Route::get('/transaksi/bayarhutanglistanggota', [BayarhutangController::class, 'listanggota'])->name('pos01.transaksi.bayarhutang_listanggota')->middleware('auth'); /* menampilkan list anggota */
Route::get('/transaksi/bayarhutanglistjenispembayaran', [BayarhutangController::class, 'listjenispembayaran'])->name('pos01.transaksi.bayarhutang_listjenispembayaran')->middleware('auth'); /* menampilkan list jenispembayaran */
Route::post('/transaksi/bayarhutangcreate', [BayarhutangController::class, 'create'])->name('pos01.transaksi.bayarhutang_create')->middleware('auth'); /* menambah data bayarhutang */
Route::post('/transaksi/bayarhutangproses', [BayarhutangController::class, 'proses'])->name('pos01.transaksi.bayarhutang_proses')->middleware('auth'); /* menambah proses */
Route::get('/transaksi/bayarhutangedit/{id}', [BayarhutangController::class, 'edit'])->name('pos01.transaksi.bayarhutang_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/transaksi/bayarhutangdisplayhutang/{id}', [BayarhutangController::class, 'displayhutang'])->name('pos01.transaksi.bayarhutang_displayhutang')->middleware('auth'); /* menampilkan data hutang */
Route::get('/transaksi/bayarhutangdisplaypembayaran/{id}', [BayarhutangController::class, 'displaypembayaran'])->name('pos01.transaksi.bayarhutang_displaypembayaran')->middleware('auth'); /* menampilkan pembayaran */
Route::post('/transaksi/bayarhutangupdate', [BayarhutangController::class, 'update'])->name('pos01.transaksi.bayarhutang_update')->middleware('auth'); /* update data bayarhutang */
Route::post('/transaksi/bayarhutangposting', [BayarhutangController::class, 'posting'])->name('pos01.transaksi.bayarhutang_posting')->middleware('auth'); /* posting data bayarhutang */
Route::get('/transaksi/bayarhutangdestroy/{id}', [BayarhutangController::class, 'destroy'])->name('pos01.transaksi.bayarhutang_destroy')->middleware('auth'); /* hapus data bayarhutang */

/* laporan - stokbarang */
Route::get('/laporan/stokbarang', [StokbarangController::class, 'index'])->name('pos01.laporan.stokbarang.index')->middleware('auth'); /* halaman stokbarang */
Route::get('/laporan/stokbarangshowstokbarang', [StokbarangController::class, 'showstokbarang'])->name('pos01.laporan.stokbarang_showstokbarang')->middleware('auth'); /* menampilkan data stokbarang pada datatable javascript */
Route::get('/laporan/stokbarangshowstokfifo', [StokbarangController::class, 'showstokfifo'])->name('pos01.laporan.stokbarang_showstokfifo')->middleware('auth'); /* menampilkan data stokfifo pada datatable javascript */
Route::get('/laporan/stokbarangshowstokmova', [StokbarangController::class, 'showstokmova'])->name('pos01.laporan.stokbarang_showstokmova')->middleware('auth'); /* menampilkan data stokmova pada datatable javascript */
Route::get('/laporan/stokbarangshowstoklifo', [StokbarangController::class, 'showstoklifo'])->name('pos01.laporan.stokbarang_showstoklifo')->middleware('auth'); /* menampilkan data stoklifo pada datatable javascript */
Route::get('/laporan/stokbarangshowstokexpired', [StokbarangController::class, 'showstokexpired'])->name('pos01.laporan.stokbarang_showstokexpired')->middleware('auth'); /* menampilkan data stokexpired pada datatable javascript */
Route::get('/laporan/stokbarangshowstokmin', [StokbarangController::class, 'showstokmin'])->name('pos01.laporan.stokbarang_showstokmin')->middleware('auth'); /* menampilkan data stokmin pada datatable javascript */
Route::get('/laporan/stokbarangshowstokmax', [StokbarangController::class, 'showstokmax'])->name('pos01.laporan.stokbarang_showstokmax')->middleware('auth'); /* menampilkan data stokmax pada datatable javascript */
Route::get('/laporan/stokbarangshowstokhabis', [StokbarangController::class, 'showstokhabis'])->name('pos01.laporan.stokbarang_showstokhabis')->middleware('auth'); /* menampilkan data stokhabis pada datatable javascript */
Route::get('/laporan/stokbarangshowbarang', [StokbarangController::class, 'showbarang'])->name('pos01.laporan.stokbarang_showbarang')->middleware('auth'); /* menampilkan data barang yg gk ada di stokbarang pada datatable javascript */
Route::get('/laporan/stokbaranglistbarang', [StokbarangController::class, 'listbarang'])->name('pos01.laporan.stokbarang_listbarang')->middleware('auth'); /* menampilkan list barang */
Route::get('/laporan/stokbaranglistruang', [StokbarangController::class, 'listruang'])->name('pos01.laporan.stokbarang_listruang')->middleware('auth'); /* menampilkan list ruang */
Route::post('/laporan/stokbarangcreate', [StokbarangController::class, 'create'])->name('pos01.laporan.stokbarang_create')->middleware('auth'); /* menambah stokbarang */
Route::post('/laporan/stokbarangkirimsyarat', [StokbarangController::class, 'kirimsyarat'])->name('pos01.laporan.stokbarang_kirimsyarat')->middleware('auth'); /* kirimsyarat */
Route::get('/laporan/stokbarangedit/{id}', [StokbarangController::class, 'edit'])->name('pos01.laporan.stokbarang_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/laporan/stokbarangdestroy/{id}', [StokbarangController::class, 'destroy'])->name('pos01.laporan.stokbarang_destroy')->middleware('auth'); /* hapus data stokbarang */

/* laporan - stokkeluarmasuk */
Route::get('/laporan/stokkeluarmasuk', [StokkeluarmasukController::class, 'index'])->name('pos01.laporan.stokkeluarmasuk.index')->middleware('auth'); /* halaman stokkeluarmasuk */
Route::get('/laporan/stokkeluarmasukshowstokmasuk', [StokkeluarmasukController::class, 'showstokmasuk'])->name('pos01.laporan.stokkeluarmasuk_showstokmasuk')->middleware('auth'); /* menampilkan data stokmsduk pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokmasukfifo', [StokkeluarmasukController::class, 'showstokmasukfifo'])->name('pos01.laporan.stokkeluarmasuk_showstokmasukfifo')->middleware('auth'); /* menampilkan data stokmasukfifo pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokmasukmova', [StokkeluarmasukController::class, 'showstokmasukmova'])->name('pos01.laporan.stokkeluarmasuk_showstokmasukmova')->middleware('auth'); /* menampilkan data stokmasukmova pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokmasuklifo', [StokkeluarmasukController::class, 'showstokmasuklifo'])->name('pos01.laporan.stokkeluarmasuk_showstokmasuklifo')->middleware('auth'); /* menampilkan data stokmasuklifo pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokkeluar', [StokkeluarmasukController::class, 'showstokkeluar'])->name('pos01.laporan.stokkeluarmasuk_showstokkeluar')->middleware('auth'); /* menampilkan data stokkeluar pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokkeluarfifo', [StokkeluarmasukController::class, 'showstokkeluarfifo'])->name('pos01.laporan.stokkeluarmasuk_showstokkeluarfifo')->middleware('auth'); /* menampilkan data stokkeluarfifo pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokkeluarmova', [StokkeluarmasukController::class, 'showstokkeluarmova'])->name('pos01.laporan.stokkeluarmasuk_showstokkeluarmova')->middleware('auth'); /* menampilkan data stokkeluarmova pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokkeluarlifo', [StokkeluarmasukController::class, 'showstokkeluarlifo'])->name('pos01.laporan.stokkeluarmasuk_showstokkeluarlifo')->middleware('auth'); /* menampilkan data stokkeluarlifo pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokrekap', [StokkeluarmasukController::class, 'showstokrekap'])->name('pos01.laporan.stokkeluarmasuk_showstokrekap')->middleware('auth'); /* menampilkan data stokrekap pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokrekapfifo', [StokkeluarmasukController::class, 'showstokrekapfifo'])->name('pos01.laporan.stokkeluarmasuk_showstokrekapfifo')->middleware('auth'); /* menampilkan data stokrekapfifo pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokrekapmova', [StokkeluarmasukController::class, 'showstokrekapmova'])->name('pos01.laporan.stokkeluarmasuk_showstokrekapmova')->middleware('auth'); /* menampilkan data stokrekapmova pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowstokrekaplifo', [StokkeluarmasukController::class, 'showstokrekaplifo'])->name('pos01.laporan.stokkeluarmasuk_showstokrekaplifo')->middleware('auth'); /* menampilkan data stokrekaplifo pada datatable javascript */
Route::get('/laporan/stokkeluarmasukshowbarang', [StokkeluarmasukController::class, 'showbarang'])->name('pos01.laporan.stokkeluarmasuk_showbarang')->middleware('auth'); /* menampilkan data barang yg gk ada di stokkeluarmasuk pada datatable javascript */
Route::get('/laporan/stokkeluarmasuklistbarang', [StokkeluarmasukController::class, 'listbarang'])->name('pos01.laporan.stokkeluarmasuk_listbarang')->middleware('auth'); /* menampilkan list barang */
Route::get('/laporan/stokkeluarmasuklistruang', [StokkeluarmasukController::class, 'listruang'])->name('pos01.laporan.stokkeluarmasuk_listruang')->middleware('auth'); /* menampilkan list ruang */
Route::post('/laporan/stokkeluarmasukcreate', [StokkeluarmasukController::class, 'create'])->name('pos01.laporan.stokkeluarmasuk_create')->middleware('auth'); /* menambah stokkeluarmasuk */
Route::post('/laporan/stokkeluarmasukkirimsyarat', [StokkeluarmasukController::class, 'kirimsyarat'])->name('pos01.laporan.stokkeluarmasuk_kirimsyarat')->middleware('auth'); /* kirimsyarat */
Route::get('/laporan/stokkeluarmasukedit/{id}', [StokkeluarmasukController::class, 'edit'])->name('pos01.laporan.stokkeluarmasuk_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/laporan/stokkeluarmasukdestroy/{id}', [StokkeluarmasukController::class, 'destroy'])->name('pos01.laporan.stokkeluarmasuk_destroy')->middleware('auth'); /* hapus data stokkeluarmasuk */

/* laporan - kartustok */
Route::get('/laporan/kartustok', [KartustokController::class, 'index'])->name('pos01.laporan.kartustok.index')->middleware('auth'); /* halaman kartustok */
Route::get('/laporan/kartustokshowstokrekap', [KartustokController::class, 'showstokrekap'])->name('pos01.laporan.kartustok_showstokrekap')->middleware('auth'); /* menampilkan data stokrekap pada datatable javascript */
Route::get('/laporan/kartustokshowstokrekapfifo', [KartustokController::class, 'showstokrekapfifo'])->name('pos01.laporan.kartustok_showstokrekapfifo')->middleware('auth'); /* menampilkan data stokrekapfifo pada datatable javascript */
Route::get('/laporan/kartustokshowstokrekapmova', [KartustokController::class, 'showstokrekapmova'])->name('pos01.laporan.kartustok_showstokrekapmova')->middleware('auth'); /* menampilkan data stokrekapmova pada datatable javascript */
Route::get('/laporan/kartustokshowstokrekaplifo', [KartustokController::class, 'showstokrekaplifo'])->name('pos01.laporan.kartustok_showstokrekaplifo')->middleware('auth'); /* menampilkan data stokrekaplifo pada datatable javascript */
Route::get('/laporan/kartustokshowbarang', [KartustokController::class, 'showbarang'])->name('pos01.laporan.kartustok_showbarang')->middleware('auth'); /* menampilkan data barang yg gk ada di kartustok pada datatable javascript */
Route::get('/laporan/kartustoklistbarang', [KartustokController::class, 'listbarang'])->name('pos01.laporan.kartustok_listbarang')->middleware('auth'); /* menampilkan list barang */
Route::get('/laporan/kartustoklistruang', [KartustokController::class, 'listruang'])->name('pos01.laporan.kartustok_listruang')->middleware('auth'); /* menampilkan list ruang */
Route::post('/laporan/kartustokcreate', [KartustokController::class, 'create'])->name('pos01.laporan.kartustok_create')->middleware('auth'); /* menambah kartustok */
Route::post('/laporan/kartustokkirimsyarat', [KartustokController::class, 'kirimsyarat'])->name('pos01.laporan.kartustok_kirimsyarat')->middleware('auth'); /* kirimsyarat */
Route::get('/laporan/kartustokedit/{id}', [KartustokController::class, 'edit'])->name('pos01.laporan.kartustok_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/laporan/kartustokdestroy/{id}', [KartustokController::class, 'destroy'])->name('pos01.laporan.kartustok_destroy')->middleware('auth'); /* hapus data kartustok */

/* pengaturan - parameter */
Route::get('/pengaturan/parameter', [ParameterController::class, 'index'])->name('pos01.pengaturan.parameter.index')->middleware('auth'); /* halaman parameter */
Route::get('/pengaturan/parametershow', [ParameterController::class, 'show'])->name('pos01.pengaturan.parameter_show')->middleware('auth'); /* menampilkan data parameter pada datatable javascript */
Route::post('/pengaturan/parametercreate', [ParameterController::class, 'create'])->name('pos01.pengaturan.parameter_create')->middleware('auth'); /* menambah parameter */
Route::get('/pengaturan/parameteredit/{id}', [ParameterController::class, 'edit'])->name('pos01.pengaturan.parameter_edit')->middleware('auth'); /* menampilkan data yang akan dirubah */
Route::get('/pengaturan/parameterdestroy/{id}', [ParameterController::class, 'destroy'])->name('pos01.pengaturan.parameter_destroy')->middleware('auth'); /* hapus data parameter */



});