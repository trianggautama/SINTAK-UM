@extends('layouts.main')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Beranda</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">User Admin</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Beranda</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> Jenis Dokumen </span>
                        <h2 class="font-bold">{{$tipe}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> Macam Buku </span>
                        <h2 class="font-bold">{{$buku}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-4">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> Peminjaman </span>
                        <h2 class="font-bold">{{$peminjaman}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <h2>Selamat Datang Admin ( {{Auth::user()->nama}} )</h2>
                    <p>Perpustakaan Hukum adalah aplikasi yang merupakan bagian dari Jaringan Dokumentasi dan Informasi Hukum Kota Banjarmasin yang bisa diakses masyarakat, mahasiwa dan aparatur pemerintahan untuk mengetahui daftar koleksi perpustakaan hukum JDIH Kota Banjarmasin.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
   
@endsection
