
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perpustakaan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('depan/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('depan/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('depan/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('depan/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('depan/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('depan/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('depan/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('depan/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('depan/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('depan/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="/"><img src="{{asset('pemko.png')}}" alt="" width="35px"><span class="mt-1">&nbsp; SI-TAHU</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="index.html">Beranda</a></li>
          <li><a href="{{Route('auth.login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h4 class="animate__animated animate__fadeInUp text-white">Si-Tahu (Sistem Informasi Perpustakan Hukum)</h4>
          <p class="animate__animated animate__fadeInUp">Perpustakaan Hukum adalah aplikasi yang merupakan bagian dari Jaringan Dokumentasi dan Informasi Hukum Kota Banjarmasin yang bisa diakses masyarakat, mahasiwa dan aparatur pemerintahan untuk mengetahui daftar koleksi perpustakaan hukum JDIH Kota Banjarmasin. </p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h4 class="animate__animated animate__fadeInUp text-white">Si-Tahu (Sistem Informasi Perpustakan Hukum)</h4>
          <p class="animate__animated animate__fadeInUp">Perpustakaan Hukum adalah aplikasi yang merupakan bagian dari Jaringan Dokumentasi dan Informasi Hukum Kota Banjarmasin yang bisa diakses masyarakat, mahasiwa dan aparatur pemerintahan untuk mengetahui daftar koleksi perpustakaan hukum JDIH Kota Banjarmasin. </p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h4 class="animate__animated animate__fadeInUp text-white">Si-Tahu (Sistem Informasi Perpustakan Hukum)</h4>
          <p class="animate__animated animate__fadeInUp">Perpustakaan Hukum adalah aplikasi yang merupakan bagian dari Jaringan Dokumentasi dan Informasi Hukum Kota Banjarmasin yang bisa diakses masyarakat, mahasiwa dan aparatur pemerintahan untuk mengetahui daftar koleksi perpustakaan hukum JDIH Kota Banjarmasin.</p>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services" style="padding-top:0px;">
      <div class="container">
      <div class="row mb-2">
        <div class="col-md-8">
          <h3>List Buku</h3>
        </div>
        <div class="col-md-4 text-right"> 
          <form action="{{Route('cari')}}" method="GET"> 
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="judul / penerbit/ tahun" name="cari">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>          
          </form>
        </div>
        </div>
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                      <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Cover</th>
                          <th>Judul Buku</th>
                          <th class="text-center">TEU Badan/Orang</th>
                          <th class="text-center">Penerbit (Tahun )</th>
                          <th class="text-center">Status Baca</th>
                          <th class="text-center">Jumlah Buku</th> 
                          <th class="text-center"> Detail </th>
                      </tr>
                  </thead> 
                  <tbody> 
                      @foreach($buku as $d)
                      <tr>
                          <td class="text-center" style="width:3px !important;">{{$loop->iteration}}</td>
                          <td width="5%" class="text-center">
                          @if($d->cover)
                            <img class="mb-2" src="{{asset('/storage/cover/'.$d->cover)}}" alt="" width="100px" style="height: 100px;">
                          @else
                            <img class="mb-2" src="{{asset('depan/assets/img/blog/blog-3.jpg')}}" alt="" width="100px" style="height: 100px;">
                          @endif
                          </td>
                          <td>{{$d->judul_buku}}</td>
                          <td class="text-center">{{$d->teu}}</td>
                          <td class="text-center">{{$d->penerbit}} ({{$d->tahun_terbit}})</td>
                          <td class="text-center">
                              @if($d->status_baca == 0)
                               <span class="text-success">Baca di tempat</span>
                              @elseif($d->status_baca == 2)
                                <span class="text-success">Pinjam di tempat</span>
                              @else
                                <span class="text-primary">Bawa pulang</span>
                              @endif
                          </td>
                          <td class="text-center">{{$d->jumlah}}</td>
                          <td>
                              <button type="button" class="btn btn-primary" onclick="modal_show('{{$d->uuid}}','{{asset("/storage/cover/".$d->cover)}}')"><i class="fa fa-info-circle"></i></button>
                          </td>
                      </tr>
                      @endforeach 
                  </tbody>
              </table>
              {{$buku->links('vendor.pagination.custom')}}
          </div>
      </div>
      <div class="modal fade bd-example-modal-lg" id="moda_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
            <button type="button" class="btn close" data-dismiss="modal" aria-label="Close" id="close_modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <img class="mb-2" src="" alt="" width="100%" height="290px" id="img_show">
            </div>
            <div class="col-md">
              <table class="table table-striped">
                <tr>
                    <td width="20%">Judul Buku</td>
                    <td width="2%">:</td>
                    <td id="judul_buku"></td>
                </tr>
                <tr>
                    <td width="20%">tipe Dokumen</td>
                    <td width="2%">:</td>
                    <td id="tipe_dokumen"></td>
                </tr>
                <tr>
                    <td width="20%">T.E.U (Badan/Orang)</td>
                    <td width="2%">:</td>
                    <td id="teu"></td>
                </tr>
                <tr>
                    <td width="20%">Status Baca</td>
                    <td width="2%">:</td>
                    <td id="status_baca">
                        -
                    </td>
                </tr>
                <tr>
                    <td width="20%">No Panggilan</td>
                    <td width="2%">:</td>
                    <td id="no_panggilan">-</td>
                </tr>
                <tr>
                    <td width="20%">Cetakan</td>
                    <td width="2%">:</td>
                    <td id="cetakan">-</td>
                </tr>
                </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
            <table class="table table-striped">
                <tr>
                    <td width="20%">Uraian</td>
                    <td width="2%">:</td>
                    <td id="uraian"></td>
                </tr>
                <tr>
                    <td width="20%">Tempat Terbit</td>
                    <td width="2%">:</td>
                    <td id="tempat_terbit"></td>
                </tr>
                <tr>
                    <td width="20%">Penerbit / Tahun</td>
                    <td width="2%">:</td>
                    <td id="penerbit">-</td>
                </tr>
                <tr>
                    <td width="20%">Deskripsi Fisik</td>
                    <td width="2%">:</td>
                    <td id="deskripsi_fisik">-</td>
                </tr>
                <tr>
                    <td width="20%">Subjek</td>
                    <td width="2%">:</td>
                    <td id="subjek">-</td>
                </tr>
                <tr>
                    <td width="20%">ISBN / ISSN</td>
                    <td width="2%">:</td>
                    <td id="isbn_issn">-</td>
                </tr>
                <tr>
                    <td width="20%">Bahasa</td>
                    <td width="2%">:</td>
                    <td id="bahasa">-</td>
                </tr> 
                <tr>
                    <td width="20%">Bidang Hukum</td>
                    <td width="2%">:</td>
                    <td id="bidang_hukum">-</td>
                </tr>
                <tr>
                    <td width="20%">No. Induk</td>
                    <td width="2%">:</td>
                    <td id="no_induk">-</td>
                </tr>
                <tr>
                    <td width="20%">Lokasi</td>
                    <td width="2%">:</td>
                    <td id="lokasi">-</td>
                </tr>
                <tr>
                    <td width="20%">Lampiran</td>
                    <td width="2%">:</td>
                    <td id="lampiran">-</td>
                </tr>
                <tr>
                    <td width="20%">Jumlah Buku</td>
                    <td width="2%">:</td>
                    <td id="jumlah">-</td>
                </tr>
                </table>
            </div>
          </div>
          <br>
          </div>
        </div>
      </div>
    </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="{{asset('depan/assets/img/why-us.jpg')}}" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
            <h4>Petunjuk Peminjaman</h4>
            Penggunaan Fasilitas Perpustakaan dapat dilakukan dengan mengunjungi perpustakaan secara langsung :
            <br>
            <br>
            <div class="icon-box">
              <div class="icon"><i class="bx bx-map"></i></div>
              <h4 class="title"><a href="">Alamat</a></h4>
              <p class="description">
                {{$info->alamat}}
              </p>
            </div>
            <div class="icon-box">
              <div class="icon"><i class="bx bx-calendar"></i></div>
              <h4 class="title"><a href="">Jam Pelayanan</a></h4>
              <p class="description">
                  {{$info->jam_pelayanan}}
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-12 footer-links">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15932.363987266925!2d114.58034545183185!3d-3.327693120298065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x17bd3ac921d2828e!2sPemerintah%20Kota%20Banjarmasin!5e0!3m2!1sid!2sid!4v1624784282671!5m2!1sid!2sid" width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak & Alamat</h4>
            <p>
              {{$info->alamat}}
               <br><br>
              <strong>No.Hp:</strong> {{$info->no_hp}}<br>
              <strong>Email:</strong> {{$info->email}}<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Tentang Aplikasi</h3>
            <p style="text-align: justify;">Perpustakaan Hukum adalah aplikasi yang merupakan bagian dari Jaringan Dokumentasi dan Informasi Hukum Kota Banjarmasin yang bisa diakses masyarakat, mahasiwa dan aparatur pemerintahan untuk mengetahui daftar koleksi perpustakaan hukum JDIH Kota Banjarmasin.</p>
            <div class="social-links mt-3">
              <a href="{{$info->fb}}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
              <a href="{{$info->twitter}}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
              <a href="{{$info->ig}}" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright 2021 <strong><span>Diskominfotik Kota Banjarmasin</span></strong>.
      </div>
      <div class="credits">      
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('admin/js/jquery-3.1.1.min.js')}}"></script>
  <script src="{{asset('depan/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('depan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('depan/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('depan/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('depan/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('depan/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('depan/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('depan/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('depan/axios.min.js')}}" ></script>

  <!-- Template Main JS File -->
  <script src="{{asset('depan/assets/js/main.js')}}"></script>
  <script>
    let modal_show = (buku_uuid,img) =>{
      let url       = '{{Route("buku.api","")}}'
        axios.get( `${url}/${buku_uuid} `)
          .then(function (response) {

            if(response.data.status_baca == '0')
            {
              status_baca = 'baca di tempat'
            }else{
              status_baca = 'bawa pulang'
            }
            
            $('#judul_buku').text(response.data.judul_buku)
            $('#tipe_dokumen').text(response.data.tipe_dokumen_id)
            $('#teu').text(response.data.teu)
            $('#status_baca').text(status_baca)
            $('#no_panggilan').text(response.data.no_panggilan)
            $('#cetakan').text(response.data.cetakan)
            $('#tempat_terbit').text(response.data.tempat_terbit)
            $('#penerbit').text(`${response.data.penerbit}-${response.data.tahun_terbit}`)
            $('#deskripsi_fisik').text(response.data.deskripsi_fisik)
            $('#subjek').text(response.data.subjek)
            $('#isbn_issn').text(response.data.isbn_issn)
            $('#bahasa').text(response.data.bahasa)
            $('#bidang_hukum').text(response.data.bidang_hukum)
            $('#no_induk').text(response.data.no_induk)
            $('#lokasi').text(response.data.lokasi)
            $('#lampiran').text(response.data.lampiran)
            $('#jumlah').text(response.data.jumlah)
            $('#uraian').text(response.data.uraian)
            $('#img_show').attr("src", img)
          }) 
          .catch(function (error) {
              console.log(error);
          })
      $('#moda_detail').modal('show');
    }

    $('#close_modal').click( function(){
      $('#moda_detail').modal('hide');
    })

  </script>
</body>

</html>