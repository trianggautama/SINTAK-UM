@extends('layouts.main')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Peminjaman Buku</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <strong>Peminjaman Buku</strong>
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
                            <form action="{{Route('userAdmin.peminjaman.update',$data->uuid)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Buku <small class="text-danger"><b>*</b></small></label>
                                <select name="buku_id" id="" class="form-control">
                                    <option value="">- pilih tipe dokumen -</option>
                                    @foreach($buku as $b)
                                    <option value="{{$b->id}}" {{ $data->buku_id == $b->id ? "selected":"" }}>{{$b->judul_buku}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{$data->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="">No.Hp</label>
                                <input type="text" name="no_hp" class="form-control" value="{{$data->no_hp}}">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Peminjaman</label>
                                <input type="date" name="tgl_peminjaman" class="form-control" value="{{$data->tgl_peminjaman}}">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah yang dipinjam <small class="text-danger"><b>*</b></small></label>
                                <input type="number" name="jumlah" class="form-control" value="{{$data->jumlah}}">
                            </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <a href="{{Route('userAdmin.peminjaman.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Batal</a>
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
