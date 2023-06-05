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
              <div id="lineChart">

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
                          curve: 'straight'
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

                      // Data Medis
                      $.ajax({
                          url: "{{ route('dashboard-medis-update') }}",
                          type: "GET",
                          data: { selectedOption: selectedOption },
                          success: function (response) {
                            console.log(response[0]);
                            $('#mkeluhan').empty().append("belum ada data");
                            $('#mpenanganan').empty().append("belum ada data");
                            $('#mcatatan').empty().append("belum ada data");
                            $('#mdokter').empty().append("belum ada data");
                            $('#mwaktu').empty().append("belum ada data");
                            
                            $.each(response, function(index, item) {
                                
                                $('#mkeluhan').empty();
                                $('#mpenanganan').empty();
                                $('#mcatatan').empty();
                                $('#mdokter').empty();
                                $('#mwaktu').empty();
                                
                                $('#mkeluhan').append(item.keluhan);
                                $('#mpenanganan').append(item.penanganan);
                                $('#mcatatan').append(item.catatan);
                                $('#mdokter').append(item.dokter);
                                $('#mwaktu').append(item.tanggal);
                            })
                          }
                      });

                      // Data Kesehatan
                      $.ajax({
                          url: "{{ route('dashboard-kesehatan-update') }}",
                          type: "GET",
                          data: { selectedOption: selectedOption },
                          success: function (response) {
                            console.log(response[0]);
                            $('#keluhan').empty().append("belum ada data");
                            $('#penanganan').empty().append("belum ada data");
                            $('#catatan').empty().append("belum ada data");
                            $('#waktu').empty().append("belum ada data");
                            
                            $.each(response, function(index, item) {

                                $('#keluhan').empty();
                                $('#penanganan').empty();
                                $('#catatan').empty();
                                $('#waktu').empty();
                                
                                $('#keluhan').append(item.keluhan);
                                $('#penanganan').append(item.penanganan);
                                $('#catatan').append(item.catatan);
                                $('#waktu').append(item.tanggal);
                            })
                          }
                      });

                      // Data Perkembangan
                      $.ajax({
                          url: "{{ route('dashboard-perkembangan') }}",
                          type: "GET",
                          data: { selectedOption: selectedOption },
                          success: function (response) {
                            console.log(response[0]);
                            $('#tperkembangan tbody').empty();
                            
                            $.each(response, function(index, item) {

                            		var row = $('<tr></tr>');
                                row.append('<td>' + item.usia_perkembangan + '</td>');
                                row.append('<td style="background: ' + item.color + '">' + item.hasil_cek + '</td>');
                                row.append('<td>' + item.tanggal_cek + '</td>');
                                
                                $('#tperkembangan tbody').append(row);
                            })
                          }
                      });

                      $.ajax({
                          url: "{{ route('dashboard-filter') }}",
                          type: "GET",
                          data: { selectedOption: selectedOption },
                          success: function (response) {
                            console.log(response[0]);
                            var arrBerat = [];
                            var arrTinggi = [];
                            var arrUsia = [];
                            response.forEach((data) => {
                                    arrBerat.push(data.berat)
                                    arrTinggi.push(data.tinggi)
                                    arrUsia.push(data.usia)
                                    });
                              chartOptions.series =  [{
                                  name: "Berat (Kg)",
                                  data: arrBerat
                              },
                              {
                                  name: "Tinggi (Cm)",
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
                                curve: 'straight'
                              },
                              chartOptions.grid = {
                                row: {
                                  colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                  opacity: 0.5
                                },
                              },
                              chartOptions.xaxis = {
                                categories: arrUsia,
                              }
                              chart.updateOptions(chartOptions);
                          }
                      });
                  });
              });
              </script>

                <!-- <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#lineChart"), {
                      series: [{
                        name: "berat",
                        data: [5, 7, 8, 9, 10, 13, 14]
                      },
                      {
                        name: "tinggi",
                        data: [7, 8, 9, 12, 13, 15, 11]
                      }],
                      chart: {
                        height: 400,
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
                          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                          opacity: 0.5
                        },
                      },
                      xaxis: {
                        categories: ['3 bulan', '6 bulan', '9 bulan', '12 bulan', '15 bulan', '18 bulan', '21 bulan', '24 bulan'],
                      }
                    }).render();
                  });
                </script> -->
              </div>              
              <!-- End Line Chart -->

            </div>

          </div>
        </div><!-- End Reports -->

        <!-- Perkembangan -->
        <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">
              <h5 class="card-title">Perkembangan <span>| 5 hasil cek perkembangan terakhir</span></h5>

              <table id="tperkembangan" class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Usia Perkembangan</th>
                    <th scope="col">Hasil Cek Perkembangan</th>
                    <th scope="col">Tanggal Cek Perkembangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
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
                    <div id="keluhan">belum ada data</div>
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Penanganan</div>
                    <div id="penanganan">belum ada data</div>
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Catatan tambahan</div>
                    <div id="catatan">belum ada data</div>
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Waktu</div>
                    <div id="waktu">belum ada data</div>
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
                    <div id="mkeluhan">belum ada data</div>
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Penanganan</div>
                    <div id="mpenanganan">belum ada data</div>
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Catatan tambahan</div>
                    <div id="mcatatan">belum ada data</div>
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Dokter atau Bidan</div>
                    <div id="mdokter">belum ada data</div>
                  </div>
                  <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Waktu</div>
                    <div id="mwaktu">belum ada data</div>
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