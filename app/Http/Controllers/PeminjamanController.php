<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->buku = Buku::where('status_baca',1)->orderBy('judul_buku')->get();
    }
    public function index()
    {
        $buku = $this->buku;
        $data = Peminjaman::latest()->get(); 
        return view('admin.peminjaman.index',compact('data','buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        DB::beginTransaction();
        try{

            $buku           = Buku::whereId($req->buku_id)->first();

            if($req->jumlah <= $buku->jumlah)
            {
                Peminjaman::create($req->all());

                $buku->jumlah   = $buku->jumlah - $req->jumlah; 
                $buku->save();
                DB::commit();

                return redirect()->route('userAdmin.peminjaman.index')->with('success','Data Berhasil Disimpan');

            }else{
                return redirect()->route('userAdmin.peminjaman.index')->with('warning','Jumlah peminjaman melebihi stok buku');
            }
        }catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('userAdmin.peminjaman.index')->withErrors($ex->getmessage())->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Peminjaman::findOrFail($id);
        $buku = $this->buku;

        return view('admin.peminjaman.edit',compact('data','buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        DB::beginTransaction();
        try{

            $peminjaman         = Peminjaman::findOrFail($id);
            $buku               = $peminjaman->buku;
            $buku->jumlah       = $buku->jumlah + $peminjaman->jumlah;

            if($req->jumlah <= $buku->jumlah)
            {
                $buku->jumlah   = $buku->jumlah - $req->jumlah;
                $buku->save();
                $peminjaman->update($req->all());
                DB::commit();

                return redirect()->route('userAdmin.peminjaman.index')->with('success','Data Berhasil Diubah');

            }else{
                return redirect()->route('userAdmin.peminjaman.index')->with('warning','Jumlah peminjaman melebihi stok buku');
            }
        }catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('userAdmin.peminjaman.index')->withErrors($ex->getmessage())->withInput();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{

            $peminjaman     = Peminjaman::findOrFail($id);
            $buku           = $peminjaman->buku;
            $buku->jumlah   = $buku->jumlah + $peminjaman->jumlah ;
            $buku->save();
            $peminjaman->delete();
            DB::commit();

            return redirect()->route('userAdmin.peminjaman.index')->with('success','Data Berhasil Dihapus');

        }catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('userAdmin.peminjaman.index')->withErrors($ex->getmessage());
        }
    }

    public function pengembalian(Request $req)
    {
        DB::beginTransaction();
        try{

            $data           = Peminjaman::findOrFail($req->peminjaman_uuid);
            $buku           = $data->buku;
            $buku->jumlah   = $buku->jumlah + $data->jumlah;
            $buku->update();
            $data->update($req->all());
            DB::commit();

            return redirect()->route('userAdmin.peminjaman.index')->with('success','Data Berhasil Disimpan');

        }catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('userAdmin.peminjaman.index')->withErrors($ex->getmessage());
        }
        
    }
}
