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
                    <strong>Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>
        </div>
    </div>

      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Tabel Data</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Nama</th>
                                    <th>No Hp</th>
                                    <th>Buku</th>
                                    <th>jumlah Peminjaman</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengembalain</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{Carbon\carbon::parse($d->tgl_peminjaman)->translatedFormat('d F Y')}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->no_hp}}</td>
                                    <td>{{$d->buku->judul_buku}}</td>
                                    <td>{{$d->jumlah}}</td>
                                    <td>
                                        @if($d->tgl_pengembalian)
                                            <div class="badge badge-success">Selesai</div>
                                        @else
                                            <div class="badge badge-warning">Belum di kembalikan</div>
                                        @endif
                                    </td>
                                    <td>{{$d->tgl_pengembalian}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('userAdmin.peminjaman.destroy',$d->uuid) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @if(!$d->tgl_pengembalian)
                                                <a class="btn btn-primary text-white" onclick="pengembalian('{{$d->uuid}}')" ><i class="fa fa-calendar"></i>&nbsp;Pengembalian</a>
                                                <a class="btn btn-warning" href="{{Route('userAdmin.peminjaman.edit',$d->uuid)}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                <button class="btn btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
                                            @else
                                                -
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('userAdmin.peminjaman.store')}}" method="POST">
                    @csrf
                    <div class="form-group"> 
                        <label for="">Buku <small class="text-danger"><b>*</b></small></label>
                        <select name="buku_id" id="" class="form-control">
                            <option value="">- pilih tipe dokumen -</option>
                            @foreach($buku as $b)
                                <option value="{{$b->id}}" {{ old('buku_id') == $b->id ? "selected":"" }}>{{$b->judul_buku}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{old('nama')}}">
                    </div>
                    <div class="form-group">
                        <label for="">No.Hp</label>
                        <input type="text" name="no_hp" class="form-control" value="{{old('no_hp')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Peminjaman</label>
                        <input type="date" name="tgl_peminjaman" class="form-control" value="{{Carbon\carbon::now()->format('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah yang dipinjam <small class="text-danger"><b>*</b></small></label>
                        <input type="number" name="jumlah" class="form-control" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="formAdd">Simpan Data</button>
                </div>
                </form>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="pengembalian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('userAdmin.pengembalian.store')}}" method="POST">
                    @csrf
                    <input type="hidden" id="peminjaman_uuid" name="peminjaman_uuid">
                    <div class="form-group">
                        <label for="">Tanggal Pengembalian</label>
                        <input type="date" name="tgl_pengembalian" class="form-control" value="{{Carbon\carbon::now()->format('Y-m-d')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="formAdd">Simpan Data</button>
                </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

let pengembalian = uuid =>{
    $('#peminjaman_uuid').val(uuid)
    $('#pengembalian').modal('show');
}
</script>
@endsection
