<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostBukuRequest;
use App\Models\Buku;
use App\Models\Tipe_dokumen;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->tipe_dokumen = Tipe_dokumen::latest()->get();;
     }
    public function index()
    {
        $data = Buku::latest()->get();
        $tipe = $this->tipe_dokumen;
        return view('admin.buku.index',compact('data','tipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostBukuRequest $req)
    {
        DB::beginTransaction();
        try{

            $data               = $req->all();
            if($req->cover)
            {
                $nameFile        = Carbon::now()->format('H_i').'_'.$req->file('cover')->getClientOriginalName();
                $data['cover']   = $nameFile;
                
                $req->file('cover')->move('storage/cover/', $nameFile);  
            }      
            Buku::create($data);
            DB::commit();
            
            return redirect()->route('userAdmin.buku.index')->with('success','Data Berhasil Disimpan');

        }catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('userAdmin.buku.index')->withErrors($ex->getmessage())->withInput();
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
        $data = Buku::findorFail($id);
        return view('admin.buku.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Buku::findorFail($id);
        $tipe = $this->tipe_dokumen;
        return view('admin.buku.edit',compact('data','tipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostBukuRequest $req, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($req->all());

        return redirect()->route('userAdmin.buku.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        if($buku->cover != 'default.png'){
            Storage::delete('public/cover/'.$buku->cover);  
        }   
        $buku->delete(); 

        return redirect()->route('userAdmin.buku.index')->with('success','Data Berhasil Dihapus');

    }

    public function api($id)
    {
        $data = Buku::findorFail($id);
        // $data->cover = '{{asset(/storege')}}
        return json_encode($data);
    }
}
