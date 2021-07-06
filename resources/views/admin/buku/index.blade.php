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
                                    <th>Judul Buku</th>
                                    <th>TEU Badan/Orang</th>
                                    <th>Penerbit</th>
                                    <th>Tahun</th>
                                    <th>Status Baca</th>
                                    <th>Jumlah Buku</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->judul_buku}}</td>
                                    <td>{{$d->teu}}</td>
                                    <td>{{$d->penerbit}}</td>
                                    <td>{{$d->tahun_terbit}}</td>
                                    <td>
                                    @if($d->status_baca == 0)
                                        Baca ditempat
                                    @elseif($d->status_baca == 2)
                                        Pinjam di tempat
                                    @else
                                        Bawa Pulang
                                    @endif
                                    </td>
                                    <td>{{$d->jumlah}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('userAdmin.buku.destroy',$d->uuid) }}" method="POST">
                                            @csrf
                                            @method('DELETE') 
                                            <a class="btn btn-info" href="{{Route('userAdmin.buku.show',$d->uuid)}}"><i class="fa fa-edit"></i>&nbsp;Detail</a>
                                            <a class="btn btn-warning" href="{{Route('userAdmin.buku.edit',$d->uuid)}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                            <button class="btn btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
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
                    <form action="{{Route('userAdmin.buku.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Judul Buku <small class="text-danger"><b>*</b></small></label>
                        <input type="text" name="judul_buku" class="form-control" value="{{old('judul_buku')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Tipe Dokumen <small class="text-danger"><b>*</b></small></label>
                        <select name="tipe_dokumen_id" id="" class="form-control">
                            <option value="">- pilih tipe dokumen -</option>
                            @foreach($tipe as $t)
                            <option value="{{$t->id}}" {{ old('tipe_dokumen_id') == $t->id ? "selected":"" }}>{{$t->tipe_dokumen}}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status Baca <small class="text-danger"><b>*</b></small></label>
                        <select name="status_baca" id="" class="form-control">
                            <option value="0" {{ old('status_baca') == 0 ? "selected":"" }}>Baca Ditempat</option>
                            <option value="1" {{ old('status_baca') == 1 ? "selected":"" }}>Bawa Pulang</option>
                            <option value="2" {{ old('status_baca') == 2 ? "selected":"" }}>Pinjam di tempat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Uraian <small class="text-danger"><b>*</b></small></label>
                       <textarea name="uraian" id="" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">T.E.U <small class="text-danger"><b>*</b></small></label>
                                <input type="text" name="teu" class="form-control" value="{{old('teu')}}">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">No.Panggilan</label>
                                <input type="text" name="no_panggilan" class="form-control" value="{{old('no_panggilan')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Cetakan</label>
                                <input type="text" name="cetakan" class="form-control" value="{{old('cetakan')}}">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Tempat tahun_terbit</label>
                                <input type="text" name="tempat_terbit" class="form-control" value="{{old('tempat_terbit')}}">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Penerbit <small class="text-danger"><b>*</b></small></label>
                                <input type="text" name="penerbit" class="form-control" value="{{old('penerbit')}}">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">tahun Penerbit <small class="text-danger"><b>*</b></small></label>
                                <input type="text" name="tahun_terbit" class="form-control" value="{{old('tahun_terbit')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Fisik</label>
                        <input type="text" name="deskripsi_fisik" class="form-control" value="{{old('deskripsi_fisik')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Subjek</label>
                        <input type="text" name="subjek" class="form-control" value="{{old('subjek')}}">
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">ISBN / ISSN</label>
                                <input type="text" name="isbn_issn" class="form-control" value="{{old('isbn_issn')}}">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Bahasa <small class="text-danger"><b>*</b></small></label>
                                <input type="text" name="bahasa" class="form-control" value="{{old('bahasa')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Bidang Hukum</label>
                                <input type="text" name="bidang_hukum" class="form-control" value="{{old('bidang_hukum')}}">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">No,Induk</label>
                                <input type="text" name="no_induk" class="form-control" value="{{old('no_induk')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{old('lokasi')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Lampiran</label>
                        <input type="text" name="lampiran" class="form-control" value="{{old('lampiran')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Buku <small class="text-danger"><b>*</b></small></label>
                        <input type="text" name="jumlah" class="form-control" value="{{old('jumlah')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Cover Depan <small class="text-danger"><b>*</b></small></label>
                        <input type="file" name="cover" class="form-control">
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

let pengembalian = id =>{
    alert(id);
}
</script>
@endsection
