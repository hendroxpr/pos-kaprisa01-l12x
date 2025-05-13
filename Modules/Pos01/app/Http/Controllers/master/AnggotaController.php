<?php

namespace Modules\Pos01\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Menuutama;
use Illuminate\Http\Request;

use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Aplikasi;
use Modules\Pos01\Models\Anggota;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;
use App\Models\Menusub;
use Modules\Pos01\Models\Hutang;
use Modules\Pos01\Models\Lembaga;
use Modules\Pos01\Models\Savings;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $product = new Product;
        // $product->setConnection('mysql_second');
        // $something = $product->find(1);
        // return $something;

        $meminstansi = session('memnamasingkat');
        $remark = 'Halaman ini digunakan untuk menampilkan, menambah, mengubah dan menghapus <b>Anggota</b>.';
        $page = 'pos01::master.anggota';
        $link = '/pos01/master/anggota';
        $subtitle = 'Master';
        $caption = 'Anggota';
        $jmlhal = 2;
       
        $menu=Menusub::where('link','=',$link)
            ->with(['menuutama','aplikasi'])
            ->get();
        return view($page, [
            'title' => $meminstansi . ' | ' . $subtitle . ' | ' . $caption,
            'subtitle' => $subtitle,
            'caption' => $caption,
            'link' => $link,
            'remark' => $remark,
            'jmlhal' => $jmlhal,
            'tabel' => Anggota::SimplePaginate($jmlhal)->withQueryString(),
            'aplikasi' => Aplikasi::get(),
            'menu' => $menu,
        ]);
        
    }
 
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
   
    public function create(Request $request)
    {
        $id = $request['id1'];

        $validatedData = $request->validate([
            'idlembaga1' => 'required',
            'nama1' => 'required',
            'ecard1' => 'required',
            'nia1' => 'required',
            'ktp1' => 'required',
            'tgldaftar1' => 'required',
        ]);
          
        //untuk input tabel yang asli
        
        $data = [            
            'idlembaga' => $validatedData['idlembaga1'],
            'nama' => $validatedData['nama1'],
            'ecard' => $validatedData['ecard1'],
            'nia' => $validatedData['nia1'],
            'ktp' => $validatedData['ktp1'],
            'statusprofesi' => $request['statusprofesi1'],
            'tgllahir' => $request['tgllahir1'],
            'tgldaftar' => $validatedData['tgldaftar1'],
            'tglkeluar' => $request['tglkeluar1'],
            'alamat' => $request['alamat1'],
            'telp' => $request['telp1'],
            'aktif' => $request['aktif1'],
        ];

        if ($id == '0') {
            Anggota::create($data);
        } else {
            Anggota::where('id', '=', $id)->update($data);
        }
        // return json_encode('data');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        
        $anggota = Anggota::with('lembaga')->get();
        $datax = DataTables::of($anggota                          
            );

        $data = $datax
            ->addIndexColumn()

            ->addColumn('lembaga', function ($row) {
                return $row->idlembaga ? $row->lembaga->lembaga : '';
            })
           
            ->addColumn('action', function ($row) {
                return '<a href="#" title="Edit Data" class="btn btn-success btn-xs item_edit" data="' . $row->id . '" data2="'. $row->nia.'" data3="'. $row->nama.'" data4="'. $row->ktp.'"><i style="font-size:18px" class="fa">&#xf044;</i></a> ' .
                       '<a href="#" title="Hapus Data" class="btn btn-danger btn-xs item_hapus" data="' . $row->id . '" data2="'. $row->nia.'" data3="'. $row->nama.'" data4="'. $row->ktp.'"><i style="font-size:18px" class="fa">&#xf00d;</i></a>';
            })
            
            ->rawColumns([
                'action'])


            ->make(true);

            return $data;

    }

    
    public function edit($id)
    {
        $jmlx = Savings::where('idanggota','=',$id)->count();
        if($jmlx<>0){
            $jmlx1 = Savings::limit(1)->where('idanggota','=',$id)
            ->orderBy('id','desc')
            ->get();
            foreach ($jmlx1 as $baris) {
                $saldo = $baris->akhir;
            }
        }else{
            $saldo=0;
        }

        $saldohutang = Hutang::where('idanggota','=',$id)->sum('pokok');

        $data = Anggota::select('*')
        ->selectRaw('('. $saldo .') as akhir')
        ->selectRaw('('. $saldohutang .') as saldohutang')
        ->with('lembaga')->where('id', '=', $id)  
        ->get();
        return json_encode(array('data' => $data)); 
       
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $data = Anggota::where('id', '=', $id)->delete();
        return json_encode(array('data' => $data));
    }

    function listlembaga()
    {
        $tampil = Lembaga::orderBy('kode', 'asc')->get();
        foreach ($tampil as $baris) {
            echo "<option value='" . $baris->id . "'>" . $baris->lembaga . "</option>";
        }
    }

}
