<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostTipeDokumenRequest;
use App\Models\Tipe_dokumen;
use Illuminate\Http\Request;

class TipeDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tipe_dokumen::latest()->get();
        return view('admin.tipe_dokumen.index',compact('data'));
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
    public function store(PostTipeDokumenRequest $req)
    {
        Tipe_dokumen::create($req->all());

        return redirect()->route('userAdmin.tipe_dokumen.index')->with('success','Data Berhasil Disimpan');

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
        $data = Tipe_dokumen::findOrFail($id);
        return view('admin.tipe_dokumen.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostTipeDokumenRequest $req, $id)
    {
        $data = Tipe_dokumen::findOrFail($id);
        $data->update($req->all());

        return redirect()->route('userAdmin.tipe_dokumen.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipe_dokumen::findOrFail($id)->delete();

        return redirect()->route('userAdmin.tipe_dokumen.index')->with('success','Data Berhasil Dihapus');
    }
}
