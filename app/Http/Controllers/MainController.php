<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Tipe_dokumen;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function admin_beranda()
    {
        $tipe  = Tipe_dokumen::count();
        $buku   = Buku::count();
        $peminjaman = Peminjaman::count();
        return view('admin.index',compact('tipe','buku','peminjaman'));
    }
}
