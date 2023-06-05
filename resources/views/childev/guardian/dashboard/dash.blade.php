@extends('childev.guardian.dashboard.index')

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
  <h1>Beranda</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="\dashboard">Home</a></li>
      <li class="breadcrumb-item active">Beranda</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!-- Nama Anak -->
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    <div class="row md-12">
      <div class="col-md-10">
        <select class="form-select" aria-label="Default select example" style="margin-top:3px; margin-bottom:3px" id ="filterSelect">
          <option selected>--Pilih Data Anak--</option>
          @foreach($anak as $data_anak)
          <option value="{{$data_anak->id}}">{{$data_anak->nama_anak}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
          <a href="\tambah_data_anak" type="button" class="btn btn-danger" style="margin-top:3px; margin-bottom:3px" 
            data-bs-toggle="tooltip" data-bs-placement="right" title="Tambah Data Anak">
            <i class="bi bi-plus-circle" style="font-style:normal; font-size:10pt"> Tambah Data Anak</i>
          </a>
      </div>
    </div>
</div> <!-- Nama Anak -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Reports -->
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Pertumbuhan</h5>

              <!-- Line Chart -->
              <div id="lineChart"></div>

              <script>
              document.addEventListener("DOMContentLoaded", () => {
                  var chartOptions = {
                      series: [],
                      chart: {
                          height: 350,
                          type: 'line',
                          zoom: {
                              enabled: false
                          }
                      },
                      dataLabels: {
                          enabled: false
                      },
                      stroke: {
                          curve: 'smooth'
                      },
                      grid: {
                          row: {
                              colors: ['#f3f3f3', 'transparent'],
                              opacity: 0.5
                          },
                      },
                      xaxis: {
                          categories: []
                      }
                  };

                  var chart = new ApexCharts(document.querySelector("#lineChart"), chartOptions);
                  chart.render();

                  $('#filterSelect').on('change', function () {
                      var selectedOption = $(this).val();

                      $.ajax({
                          url: "{{ route('dashboard-filter') }}",
                          type: "GET",
                          data: { selectedOption: selectedOption },
                          success: function (response) {
                            console.log(response[0]);
                            var arrBerat = [];
                            var arrTinggi = [];
                            response.forEach((data) => {
                                    arrBerat.push(data.berat)
                                    arrTinggi.push(data.tinggi)
                                    });
                              chartOptions.series =  [{
                                  name: "berat",
                                  data: arrBerat
                              },
                              {
                                  name: "tinggi",
                                  data: arrTinggi
                              }],
                              chartOptions.chart= {
                              height: 350,
                              type: 'line',
                              zoom: {
                                enabled: false
                              }
                              },
                              chartOptions.stroke =  {
                                curve: 'smooth'
                              },
                              chartOptions.grid = {
                                row: {
                                  colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                  opacity: 0.5
                                },
                              },
                              chartOptions.xaxis = {
                                categories: ['3 bulan', '6 bulan', '9 bulan', '12 bulan', '15 bulan', '18 bulan', '21 bulan', '24 bulan'],
                              }
                              chart.updateOptions(chartOptions);
                          }
                      });
                  });
              });
              </script>
              <!-- End Line Chart -->

            </div>

          </div>
        </div><!-- End Reports -->

        <!-- Perkembangan -->
        <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">
              <h5 class="card-title">Perkembangan <span>| 5 hasil cek perkembangan terakhir</span></h5>

              <table class="table table-borderless" id="dataTable">
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

        <!-- Catatan -->
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Catatan Kesehatan Pribadi <span>| catatan terakhir</span></h5>

              <!-- List group with custom content -->
              <ol class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Keluhan atau Sakit</div>
                    Demam dan diare
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Penanganan</div>
                    Diberi oralit
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Catatan tambahan</div>
                    -
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Lampiran</div>
                    05052023.jpg
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Waktu</div>
                    05/05/2023 18:02:38
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
              </ol><!-- End with custom content -->

            </div>
          </div>
        <!-- End Catatan -->

        <!-- Rekam Medis -->
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rekam Medis <span>| catatan terakhir</span></h5>

              <!-- List group with custom content -->
              <ol class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Keluhan atau Sakit</div>
                    Demam dan diare
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Obat atau Penanganan</div>
                    Diberi oralit
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Catatan tambahan</div>
                    -
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Dokter atau Bidan</div>
                    Dr. Dwi Widyawati
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Lampiran</div>
                    05072023.jpg
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Waktu</div>
                    05/05/2023 18:02:38
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
              </ol><!-- End with custom content -->

            </div>
          </div>
        <!-- End Rekam Medis -->

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