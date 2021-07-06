@extends('layouts.main')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Buku</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <strong>Buku</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Edit</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>

      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Inputan</h5> 
                        </div>
                        <div class="ibox-content">
                            <form action="{{Route('userAdmin.buku.update',$data->uuid)}}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="form-group">
                            <label for="">Judul Buku <small class="text-danger"><b>*</b></small></label>
                            <input type="text" name="judul_buku" class="form-control" value="{{$data->judul_buku}}">
                        </div>
                        <div class="form-group">
                            <label for="">Tipe Dokumen <small class="text-danger"><b>*</b></small></label>
                            <select name="tipe_dokumen_id" id="" class="form-control">
                                <option value="">- pilih tipe dokumen -</option>
                                @foreach($tipe as $t)
                                <option value="{{$t->id}}" {{ $data->tipe_dokumen_id == $t->id ? "selected":"" }}>{{$t->tipe_dokumen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status Baca <small class="text-danger"><b>*</b></small></label>
                            <select name="status_baca" id="" class="form-control">
                                <option value="0" {{ $data->status_baca == 0 ? "selected":"" }}>Baca Ditempat</option>
                                <option value="1" {{ $data->status_baca == 1 ? "selected":"" }}>Bawa Pulang</option>
                                <option value="2" {{ $data->status_baca == 2 ? "selected":"" }}>Pinjam di tempat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Uraian <small class="text-danger"><b>*</b></small></label>
                            <textarea name="uraian" id="" class="form-control">{{$data->uraian}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">T.E.U <small class="text-danger"><b>*</b></small></label>
                                    <input type="text" name="teu" class="form-control" value="{{$data->teu}}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">No.Panggilan</label>
                                    <input type="text" name="no_panggilan" class="form-control" value="{{$data->no_panggilan}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Cetakan</label>
                                    <input type="text" name="cetakan" class="form-control" value="{{$data->cetakan}}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tempat Terbit</label>
                                    <input type="text" name="tempat_terbit" class="form-control" value="{{$data->tempat_terbit}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Penerbit <small class="text-danger"><b>*</b></small></label>
                                    <input type="text" name="penerbit" class="form-control" value="{{$data->penerbit}}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">tahun Penerbit <small class="text-danger"><b>*</b></small></label>
                                    <input type="text" name="tahun_terbit" class="form-control" value="{{$data->tahun_terbit}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Fisik</label>
                            <input type="text" name="deskripsi_fisik" class="form-control" value="{{$data->deskripsi_fisik}}">
                        </div>
                        <div class="form-group">
                            <label for="">Subjek</label>
                            <input type="text" name="subjek" class="form-control" value="{{$data->subjek}}">
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">ISBN / ISSN</label>
                                    <input type="text" name="isbn_issn" class="form-control" value="{{$data->isbn_issn}}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Bahasa <small class="text-danger"><b>*</b></small></label>
                                    <input type="text" name="bahasa" class="form-control" value="{{$data->bahasa}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Bidang Hukum</label>
                                    <input type="text" name="bidang_hukum" class="form-control" value="{{$data->budang_hukum}}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">No,Induk</label>
                                    <input type="text" name="no_induk" class="form-control" value="{{$data->no_induk}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" value="{{$data->lokasi}}">
                        </div>
                        <div class="form-group">
                            <label for="">Lampiran</label>
                            <input type="text" name="lampiran" class="form-control" value="{{$data->lampiran}}">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Buku <small class="text-danger"><b>*</b></small></label>
                            <input type="number" name="jumlah" class="form-control" value="{{$data->jumlah}}">
                        </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <a href="{{Route('userAdmin.buku.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Batal</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
