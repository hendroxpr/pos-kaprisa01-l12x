<?php

namespace Modules\Pos01\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Aplikasi;
use Modules\Pos01\Models\Ruang;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;
use App\Models\Menusub;
use Modules\Pos01\Models\Seksi;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $product = new Product;
        // $product->setConnection('mysql_second');
        // $something = $product->find(1);
        // return $something;

        $meminstansi = session('memnamasingkat');
        $remark = 'Halaman ini digunakan untuk menampilkan, menambah, mengubah dan menghapus <b>Ruang</b>.';
        $page = 'pos01::master.ruang';
        $link = '/pos01/master/ruang';
        $subtitle = 'Master';
        $caption = 'Ruang';
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
            'tabel' => Ruang::SimplePaginate($jmlhal)->withQueryString(),
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

        $slug = $request['idseksi1'].'-'.Str::slug($request['ruang1']);

        $validatedData = $request->validate([
            'kode1' => 'required',
            'ruang1' => 'required',
            'idseksi1' => 'required',
        ]);
        
        //untuk input tabel yang asli
        $data = [
            'kode' => $validatedData['kode1'],
            'slug' => $slug,
            'ruang' => $validatedData['ruang1'],
            'idseksi' => $validatedData['idseksi1'],
            'keterangan' => $request['keterangan1'],
        ];

        if ($id == '0') {
            Ruang::create($data);
        } else {
            Ruang::where('id', '=', $id)->update($data);
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
        $id = session('idseksi1');
        $data = Ruang::where('idseksi','=',$id)->get();
        return json_encode(array('data' => $data));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = Ruang::where('id', '=', $id)->get();
        return json_encode(array('data' => $data));       
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = Ruang::where('id', '=', $id)->delete();
        return json_encode(array('data' => $data));
    }
    
    function listseksi()
    {
        $tampil = Seksi::orderBy('seksi', 'asc')->get();
        foreach ($tampil as $baris) {
            echo "<option value='" . $baris->id . "'>" . $baris->seksi . "</option>";
        }
    }

    public function kirimsyarat(Request $request)
    {
        $idseksi1 = $request['idseksi1'];
        session([
            'idseksi1' => $idseksi1,
        ]);
    }

}
