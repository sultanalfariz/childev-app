@extends('childev.guardian.dashboard.index')

@section('add_child')

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="\dashboard" class="logo d-flex align-items-center">
    <img src="img/logo-childev.png" alt="">
    <span class="d-none d-lg-block">Childev</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    
    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Kevin Anderson</h6>
          <span>Web Designer</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>Akun Saya</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Edit Akun</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <span>Keluar</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link" href="\dashboard">
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
    <a class="nav-link collapsed" href="#">
      <i class="bi bi-journal-text"></i><span>Catatan Kesehatan Pribadi</span>
    </a>
  </li><!-- End Catatan Kesehatan Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#">
      <i class="bi bi-journal-medical"></i><span>Rekam Medis</span>
    </a>
  </li><!-- End Rekam Medis Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#">
      <i class="bi bi-person"></i><span>Akun</span>
    </a>
  </li><!-- End Akun Nav -->

</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

<div class="pagetitle">
  <h1>Tambah Data Anak</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="\dashboard">Home</a></li>
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item active">Tambah Data Anak</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Anak</h5>

              <!-- General Form Elements -->
      
              <form action="{{ route('add_anak_post') }}" method="post" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="date_birth" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="gender" aria-label="Default select example">
                      <option selected>--Pilih Jenis Kelamin--</option>
                      <option value="1">Laki-laki</option>
                      <option value="2">Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                  </form>
            </div>
          </div>

        </div>

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