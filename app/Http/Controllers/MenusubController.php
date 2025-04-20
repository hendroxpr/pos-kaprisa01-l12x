<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use App\Models\Menuutama;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Menusub;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Modules\Sis01\src\Entities\Mainmenu;
use RealRashid\SweetAlert\Facades\Alert;

class MenusubController extends Controller
{
    public function index()
    {
        $meminstansi = session('memnamasingkat');
        $remark = 'Halaman ini digunakan untuk menampilkan, menambah, mengubah dan menghapus <b>Sub Menu</b>.';
        $page = 'admin.dashboards.menusub';
        $link = '/admin/menusub';
        $subtitle = 'Setting Menu';
        $caption = 'Sub Menu';
        $jmlhal = 2;

        return view($page, [
            'title' => $meminstansi . ' | ' . $subtitle . ' | ' . $caption,
            'subtitle' => $subtitle,
            'caption' => $caption,
            'link' => $link,
            'remark' => $remark,
            'jmlhal' => $jmlhal,
            'tabel' => Menusub::SimplePaginate($jmlhal)->withQueryString(),
            'aplikasi' => Aplikasi::get()
        ]);
    }

    public function show()
    {
        $idmenuutama = session('idmenuutama');
        $idaplikasi = session('idaplikasi');

        $data = Menusub::where([['idaplikasi', '=', $idaplikasi], ['idmainmenu', '=', $idmenuutama]])
            ->orderBy('slug', 'asc')
            ->orderBy('urutan', 'asc')
            ->get();
        return json_encode(array('data' => $data));
    }

    public function create(Request $request)
    {
        $id = $request['id1'];
        $id1a = $request['idaplikasi1'];
        $id1b = $request['idmenuutama1'];
        if ($id1a < 10) {
            $id1a = '0' . $id1a;
        }
        if ($id1b < 10) {
            $id1b = '0' . $id1b;
        }

        $namamenu = $request['menu1'];

        $slug = $id1a . '-' . $id1b . '-' .  Str::slug($request['menu1']);

        $validatedData = $request->validate([
            'idaplikasi1' => 'required',
            'idmenuutama1' => 'required',
            'menu1' => 'required',
            'aktif1' => 'required',
            'admin1' => 'required',
            'user1' => 'required',
            'entry1' => 'required',
        ]);
        
        //untuk input tabel menusub yang asli
        $data = [
            'link' => $request['link1'],
            'idaplikasi' => $validatedData['idaplikasi1'],
            'idmainmenu' => $validatedData['idmenuutama1'],
            'namamenu' => $namamenu,
            'slug' => $slug,
            'aktif' => $validatedData['aktif1'],
            'adminmenu' => $validatedData['admin1'],
            'usermenu' => $validatedData['user1'],
            'entrymenu' => $validatedData['entry1'],
            'urutan' => $request['urutan1']
        ];

        if ($id == '0') {
            Menusub::create($data);
        } else {
            Menusub::where('id', '=', $id)->update($data);
        }
        return json_encode('data');
    }

    public function edit($id)
    {
        $data = Menusub::where('id', '=', $id)->get();
        return json_encode(array('data' => $data));
    }

    public function destroy($id)
    {
        $data = Menusub::where('id', '=', $id)->delete();
        return json_encode(array('data' => $data));
    }

    function listaplikasi()
    {
        $idaplikasi1 = auth()->user()->kunci1;
        $idaplikasi2 = auth()->user()->kunci2;
        $tampil = Aplikasi::where([['id', '>=', $idaplikasi1], ['id', '<=', $idaplikasi2]])
            ->orderBy('urutan', 'asc')->get();

        foreach ($tampil as $baris) {
            echo "<option value='" . $baris->id . "'>" . $baris->aplikasi . "</option>";
        }
    }

    function listmenuutama()
    {
        $tampil = Menuutama::orderBy('urutan', 'asc')->get();

        foreach ($tampil as $baris) {
            echo "<option value='" . $baris->id . "'>" . $baris->namamenu . "</option>";
        }
    }

    public function kirimsyarat(Request $request)
    {
        $idmenuutama = $request['idmenuutama1'];
        $idaplikasi = $request['idaplikasi1'];
        session([
            'idmenuutama' => $idmenuutama,
            'idaplikasi' => $idaplikasi,
        ]);
    }
}
