@extends('authentication.index')

@section('register_form')

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                  <img src="img/logo-childev.png" alt="">
                  <span class="d-none d-lg-block">Childev</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Daftar</h5>
                    <!-- <p class="text-center small">Enter your personal details to create account</p> -->
                  </div>

                  <form class="row g-3 needs-validation" action="/post_daftar" method="POST" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nama</label>
                      <input type="text" name="nama_lengkap" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Mohon masukkan nama anda</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Mohon masukkan alamat email anda</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Mohon masukkan password anda</div>
                      <!-- <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div> -->
                    </div>

                    <div class="col-12">
                      <label for="yourConfirmPassword" class="form-label">Konfirmasi Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="yourConfirmPassword" required>
                      <div class="invalid-feedback">Mohon masukkan konfirmasi password anda</div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div> -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                    </div>
                    <div class="col-12" style="text-align:center">
                      <p class="small mb-0">Sudah punya akun? <a href="/login">Masuk disini!</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <!-- <div class="credits"> -->
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              <!-- </div> -->

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  @endsection