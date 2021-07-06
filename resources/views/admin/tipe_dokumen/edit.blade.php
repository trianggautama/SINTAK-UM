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
                        <form action="{{Route('userAdmin.tipe_dokumen.update',$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="">Tipe Dokumen</label>
                                <input type="text" name="tipe_dokumen" class="form-control" value="{{$data->tipe_dokumen}}">
                            </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <a href="{{Route('userAdmin.tipe_dokumen.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Batal</a>
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
