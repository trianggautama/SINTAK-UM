@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Master Data</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <strong>Tipe Dokumen</strong>
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
                                    <th>Tipe Dokumen</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->tipe_dokumen}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('userAdmin.tipe_dokumen.destroy',$d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-warning" href="{{Route('userAdmin.tipe_dokumen.edit',$d->id)}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('userAdmin.tipe_dokumen.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Tipe Dokumen</label>
                        <input type="text" name="tipe_dokumen" class="form-control">
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
</script>
@endsection
