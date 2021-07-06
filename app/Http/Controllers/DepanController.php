<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Informasi;
use Illuminate\Http\Request;

class DepanController extends Controller
{
    public function depan()
    {
        $buku = Buku::latest()->paginate(5);
        $info = Informasi::first();
        return view('welcome',compact('buku','info'));
    }

    public function cari(Request $req)
    {
        $info = Informasi::first();

        if($req->cari){
            $buku = Buku::where('judul_buku','LIKE','%'.$req->cari.'%')
                          ->orwhere('tahun_terbit','LIKE','%'.$req->cari.'%')
                          ->orwhere('penerbit','LIKE','%'.$req->cari.'%')
                          ->latest()->paginate(5);

            return view('welcome',compact('buku','info'));
        }else{
            return redirect()->route('depan');
        } 
    }
}
