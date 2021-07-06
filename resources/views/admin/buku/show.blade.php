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
                    <strong>Show</strong>
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
                    <div class="row pr-0">
                        <div class="col-md">
                            <h5>Detail Data</h5>
                        </div>
                        <div class="col-md text-right pr-0">
                            <a href="{{Route('userAdmin.buku.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td width="20%">Judul Buku</td>
                            <td width="2%">:</td>
                            <td>{{$data->judul_buku}}</td>
                        </tr>
                        <tr>
                            <td width="20%">tipe Dokumen</td>
                            <td width="2%">:</td>
                            <td>{{$data->tipe_dokumen->tipe_dokumen}}</td>
                        </tr>
                        <tr>
                            <td width="20%">T.E.U (Badan/Orang)</td>
                            <td width="2%">:</td>
                            <td>{{$data->teu}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Status Baca</td>
                            <td width="2%">:</td>
                            <td>
                                @if($data->status_baca == 0)
                                    Baca ditempat
                                @elseif($data->status_baca == 2)
                                    Pinjam di tempat
                                @else
                                    Bawa Pulang
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">uraian</td>
                            <td width="2%">:</td>
                            <td>{{$data->uraian}}</td>
                        </tr>
                        <tr>
                            <td width="20%">No Panggilan</td>
                            <td width="2%">:</td>
                            <td>{{$data->no_panggilan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Cetakan</td>
                            <td width="2%">:</td>
                            <td>{{$data->cetakan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Tempat Terbit</td>
                            <td width="2%">:</td>
                            <td>{{$data->tempat_terbit}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Penerbit / Tahun</td>
                            <td width="2%">:</td>
                            <td>{{$data->penerbit}} / {{$data->tahun_terbit}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Deskripsi Fisik</td>
                            <td width="2%">:</td>
                            <td>{{$data->deskripsi_fisik}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Subjek</td>
                            <td width="2%">:</td>
                            <td>{{$data->subjek}}</td>
                        </tr>
                        <tr>
                            <td width="20%">ISBN / ISSN</td>
                            <td width="2%">:</td>
                            <td>{{$data->isbn_issn}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Bahasa</td>
                            <td width="2%">:</td>
                            <td>{{$data->bahasa}}</td>
                        </tr> 
                        <tr>
                            <td width="20%">Bidang Hukum</td>
                            <td width="2%">:</td>
                            <td>{{$data->bidang_hukum}}</td>
                        </tr>
                        <tr>
                            <td width="20%">No. Induk</td>
                            <td width="2%">:</td>
                            <td>{{$data->no_induk}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Lokasi</td>
                            <td width="2%">:</td>
                            <td>{{$data->lokasi}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Lampiran</td>
                            <td width="2%">:</td>
                            <td>{{$data->lampiran}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Jumlah Buku</td>
                            <td width="2%">:</td>
                            <td>{{$data->jumlah}}</td>
                        </tr>
                    </table>
                </div>
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
