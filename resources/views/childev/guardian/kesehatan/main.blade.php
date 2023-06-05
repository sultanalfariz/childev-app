@extends('childev.guardian.kesehatan.index')

@section('main')

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="\dashboard" class="logo d-flex align-items-center">
    <img src="img/logo-childev.png" alt="">
    <span class="d-none d-lg-block">Childev</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

@component('components.header_dash')
@endcomponent

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="\dashboard">
      <i class="bi bi-grid"></i>
      <span>Beranda</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="\pertumbuhan">
      <i class="bi bi-bar-chart-line"></i><span>Pertumbuhan</span>
    </a>
  </li><!-- End Pertumbuhan Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="\perkembangan">
      <i class="bi bi-bar-chart"></i><span>Perkembangan</span>
    </a>
  </li><!-- End Perkembangan Nav -->

  <li class="nav-item">
    <a class="nav-link" href="\catatan_kesehatan">
      <i class="bi bi-journal-text"></i><span>Catatan Kesehatan Pribadi</span>
    </a>
  </li><!-- End Catatan Kesehatan Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="\rekam_medis">
      <i class="bi bi-journal-medical"></i><span>Rekam Medis</span>
    </a>
  </li><!-- End Rekam Medis Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="\akun">
      <i class="bi bi-person"></i><span>Akun</span>
    </a>
  </li><!-- End Akun Nav -->

</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

<div class="pagetitle">
  <h1>Catatan Kesehatan Pribadi</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="\dashboard">Home</a></li>
      <li class="breadcrumb-item active">Catatan Kesehatan Pribadi</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!-- Nama Anak -->
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    <!-- <i class="bi bi-person"></i>
     Brandon Jacob (4 tahun 5 bulan) -->
     <div class="row md-12">
          <div class="col-md-12">
            <select class="form-select" aria-label="Default select example">
              <option selected>--Pilih Data Anak--</option>
              <option value="Brandon Jacob">Brandon Jacob</option>
              <option value="Bridie Kessler">Bridie Kessler</option>
              <option value="Raheem Lehner">Raheem Lehner</option>
            </select>
          </div>          
      </div>
</div> <!-- Nama Anak -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Perkembangan -->
        <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">
              <h5 class="card-title">Daftar Catatan Kesehatan Pribadi <span></span></h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Keluhan/Penyakit</th>
                    <th scope="col">Obat/Tindakan</th>
                    <th scope="col">Catatan Tambhaan</th>
                    <th scope="col">Lampiran</th>
                    <th scope="col">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Diare</td>
                    <td>Diberi Oralit</td>
                    <td>-</td>
                    <td>-</td>
                    <td>05-04-2023</td>
                  </tr>
                  <tr>
                    <td>Diare</td>
                    <td>Diberi Oralit</td>
                    <td>-</td>
                    <td>-</td>
                    <td>05-04-2023</td>
                  </tr>
                  <tr>
                    <td>Diare</td>
                    <td>Diberi Oralit</td>
                    <td>-</td>
                    <td>-</td>
                    <td>05-04-2023</td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Perkembangan -->

        <!-- Button -->
        <div class="d-grid gap-2 mt-3">
            <a href="\tambah_catatan_kesehatan" class="btn btn-success" type="button">Tambah Catatan Kesehatan</a>
        </div>

    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
<div class="copyright">
  &copy; Copyright <strong><span>Childev</span></strong>. All Rights Reserved
</div>
<div class="credits">
  <!-- All the links in the footer should remain intact. -->
  <!-- You can delete the links only if you purchased the pro version. -->
  <!-- Licensing information: https://bootstrapmade.com/license/ -->
  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
  <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
</div>
</footer><!-- End Footer -->

@endsection