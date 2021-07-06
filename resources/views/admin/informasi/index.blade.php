@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>informasi Halaman Depan</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <strong>informasi Halaman Depan</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Edit Informasi</button>
            </div>
        </div>
    </div>

      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Detail Informasi</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table">
                                <tr>
                                    <td width="20%">Alamat</td>
                                    <td width="2%">:</td>
                                    <td>{{$data->alamat}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">No Hp</td>
                                    <td width="2%">:</td>
                                    <td>{{$data->no_hp}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Email</td>
                                    <td width="2%">:</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Jam Pelayanan</td>
                                    <td width="2%">:</td>
                                    <td>{{$data->jam_pelayanan}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">facebook</td>
                                    <td width="2%">:</td>
                                    <td>{{$data->fb}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Twitter</td>
                                    <td width="2%">:</td>
                                    <td>{{$data->twitter}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Instagram</td>
                                    <td width="2%">:</td>
                                    <td>{{$data->ig}}</td>
                                </tr>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('userAdmin.informasi.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{$data->alamat}}">
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" name="no_hp" class="form-control" value="{{$data->no_hp}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$data->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jam Pelayanan</label> 
                        <textarea name="jam_pelayanan" id="" class="form-control">{{$data->jam_pelayanan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Link Facebook</label>
                        <input type="text" name="fb" class="form-control" value="{{$data->fb}}">
                    </div>
                    <div class="form-group">
                        <label for="">Link Twitter</label>
                        <input type="text" name="twitter" class="form-control" value="{{$data->twitter}}">
                    </div>
                    <div class="form-group">
                        <label for="">Link Instagram</label>
                        <input type="text" name="ig" class="form-control" value="{{$data->ig}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="formAdd">Ubah Data</button>
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
