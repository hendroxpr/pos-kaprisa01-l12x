<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
       $judul = "Dashboard";
        // tampilkan data ke view
        return view('dashboards.index', compact(
            'judul',
        ));
    }


}
