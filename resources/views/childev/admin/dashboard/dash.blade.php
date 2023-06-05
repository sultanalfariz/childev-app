@extends('childev.admin.dashboard.index')

@section('dashboard')

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
    <a class="nav-link" href="\dashboard">
      <i class="bi bi-grid"></i>
      <span>Beranda</span>
    </a>
  </li><!-- End Dashboard Nav -->

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
  <h1>Beranda</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="\dashboard">Home</a></li>
      <li class="breadcrumb-item active">Beranda</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Card tb bb lb -->
            <!-- Tinggi Badan Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Tenaga Medis</h5>

                  <div class="d-flex align-items-center">                    
                    <div class="ps-3">
                      <h6>80</h6>
                      <span class="text-muted small pt-2 ps-1">Orang</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Tinggi Badan Card -->

            <!-- Berat Badan Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Jumlah Pengguna</h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>5</h6>
                      <span class="text-muted small pt-2 ps-1">Orang</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Berat Badan Card -->

            <!-- Lingkar Kepala Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Jumlah Pasien</h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>20</h6>
                      <span class="text-muted small pt-2 ps-1">Anak</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Lingkar Kepala Card -->

            <!-- Perkembangan -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="card-body pb-0">
                <h5 class="card-title">Daftar Pengguna <span></span></h5>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Nama</th>
                      <th scope="col">Role</th>
                      <th scope="col">Terakhir Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#">Brandon Jacob</a></td>
                      <td>Designer</td>
                      <td>2016-05-25</td>
                    </tr>
                    <tr>
                      <td>Bridie Kessler</td>
                      <td>Developer</td>
                      <td>2014-12-05</td>
                    </tr>
                    <tr>
                      <td>Ashleigh Langosh</td>
                      <td>Finance</td>
                      <td>2011-08-12</td>
                    </tr>
                    <tr>
                      <td>Angus Grady</td>
                      <td>HR</td>
                      <td>2012-06-11</td>
                    </tr>
                    <tr>
                      <td>Raheem Lehner</td>
                      <td>Dynamic Division Officer</td>
                      <td>2011-04-19</td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>

            </div>
          </div><!-- End Perkembangan -->

          <!-- Button -->
          <div class="d-grid gap-2 mt-3">
              <a href="\buat_akun" class="btn btn-success" type="button">Buat Akun Baru</a>
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