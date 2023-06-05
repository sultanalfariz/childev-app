@extends('childev.guardian.perkembangan.index')

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
    <a class="nav-link" href="\perkembangan">
      <i class="bi bi-bar-chart"></i><span>Perkembangan</span>
    </a>
  </li><!-- End Perkembangan Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="\catatan_kesehatan">
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
  <h1>Perkembangan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="\dashboard">Home</a></li>
      <li class="breadcrumb-item active">Perkembangan</li>
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
              <h5 class="card-title">Perkembangan <span>| 5 hasil cek perkembangan terakhir</span></h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Usia Perkembangan</th>
                    <th scope="col">Hasil Cek Perkembangan</th>
                    <th scope="col">Tanggal Cek Perkembangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>24 bulan - 30 bulan</td>
                    <td style="background: rgba(0, 128, 0, 0.381)">Normal</td>
                    <td>05-05-2023</td>
                  </tr>
                  <tr>
                    <td>18 bulan -24 bulan</td>
                    <td style="background: rgba(255, 255, 0, 0.34)">Peringatan</td>
                    <td>05-04-2023</td>
                  </tr>
                  <tr>
                    <td>15 bulan - 18 bulan</td>
                    <td style="background: rgba(255, 0, 0, 0.303)">Didiuga terlambat berkembang</td>
                    <td>15-03-2023</td>
                  </tr>
                  <tr>
                    <td>12 bulan - 15 bulan</td>
                    <td style="background: rgba(0, 128, 0, 0.381)">Normal</td>
                    <td>01-02-2023</td>
                  </tr>
                  <tr>
                    <td>9 bulan -12 bulan</td>
                    <td style="background: rgba(0, 128, 0, 0.381)">Normal</td>
                    <td>15-01-2023</td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Perkembangan -->

        <!-- Button -->
        <div class="d-grid gap-2 mt-3">
            <a href="\cek_perkembangan" class="btn btn-success" type="button">Cek Perkembangan Saat Ini</a>
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