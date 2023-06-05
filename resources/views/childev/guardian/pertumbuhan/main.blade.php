@extends('childev.guardian.pertumbuhan.index')

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
    <a class="nav-link" href="\pertumbuhan">
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
  <h1>Pertumbuhan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="\dashboard">Home</a></li>
      <li class="breadcrumb-item active">Pertumbuhan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!-- Nama Anak -->
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    <div class="row md-12">
      <div class="col-md-12">
      <select class="form-select" aria-label="Default select example" style="margin-top:3px; margin-bottom:3px" id ="filterSelect">
          <option selected>--Pilih Data Anak--</option>
          @foreach($anak as $data_anak)
          <option value="{{$data_anak->id}}">{{$data_anak->nama_anak}}</option>
          @endforeach
        </select>
      </div>
    </div>
</div> <!-- Nama Anak -->

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
                  <h5 class="card-title">Tinggi Badan</h5>

                  <div class="d-flex align-items-center">                    
                    <div class="ps-3">
                      <h6 id="tinggi" style="color: #4154f1">-</h6>
                      <span class="text-muted small pt-2 ps-1">sentimeter</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Tinggi Badan Card -->

            <!-- Berat Badan Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Berat Badan</h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6 id="berat" style="color: #2eca6a">-</h6>
                      <span class="text-muted small pt-2 ps-1">Kilogram</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Berat Badan Card -->

            <!-- Lingkar Kepala Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Lingkar Kepala</h5>
                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6 id="lingkar" style="color: #ff771d">-</h6>
                      <span class="text-muted small pt-2 ps-1">sentimeter</span>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Berat Badan dan Tinggi Badan</h5>

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

                            // Data Pertumbuhan
                            $.ajax({
                                url: "{{ route('pertumbuhan-data') }}",
                                type: "GET",
                                data: { selectedOption: selectedOption },
                                success: function (response) {
                                  console.log(response[0]);
                                  $('#tinggi').empty().append("-");
                                  $('#berat').empty().append("-");
                                  $('#lingkar').empty().append("-");
                                  
                                  $.each(response, function(index, item) {
                                      
                                      $('#tinggi').empty();
                                      $('#berat').empty();
                                      $('#lingkar').empty();
                                      
                                      $('#tinggi').append(item.tinggi);
                                      $('#berat').append(item.berat);
                                      $('#lingkar').append(item.lingkar_kepala);
                                  })
                                }
                            });                            

                            $.ajax({
                                url: "{{ route('pertumbuhan-filter') }}",
                                type: "GET",
                                data: { selectedOption: selectedOption },
                                success: function (response) {
                                  console.log(response[0]);
                                  var arrBerat = [];
                                  var arrTinggi = [];
                                  var arrLingkar = [];
                                  var arrUsia = [];
                                  response.forEach((data) => {
                                          arrBerat.push(data.berat)
                                          arrTinggi.push(data.tinggi)
                                          arrLingkar.push(data.lingkar_kepala)
                                          arrUsia.push(data.usia)
                                          });
                                    chartOptions.series =  [{
                                        name: "Berat (Kg)",
                                        data: arrBerat
                                    },
                                    {
                                        name: "Tinggi (Cm)",
                                        data: arrTinggi
                                    },
                                    {
                                        name: "Lingkar Kepala (Cm)",
                                        data: arrLingkar
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

            <!-- Button -->
            <div class="d-grid gap-2 mt-3">
                <a href="\tambah_data_pertumbuhan" class="btn btn-success" type="button">Tambah Data Pertumbuhan</a>
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