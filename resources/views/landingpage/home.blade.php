@extends('landingpage.index')

@section('landing_page')

<!-- header section starts  -->

<header class="header">

    <a href="/" class="logo"> <i class="fas fa-solid fa-stethoscope"></i> Childev </a>

    <nav class="navbar">
        <a href="/">Beranda</a>
        <a href="#services">Tentang Kami</a>
        <a href="#about">Layanan Kami</a>        
        <a href="/register">Daftar</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Pantaulah Perkembangan Anak Anda Bersama Kami</h3>
        <p style="text-transform: none">Bergabunglah dengan kami agar Anda dapat memantau perkembangan dan pertumbuhan anak dengan lebih baik</p>
        <!-- @if (!auth()->user()) -->
            <a href="/masuk" class="btn-login"> Masuk <span class="fas fa-chevron-right"></span> </a>
            <a href="/daftar" class="btn-signup">Daftar<span class="fas fa-chevron-right"></span> </a>
        <!-- @endif -->
    </div>

    <div class="image">
        <img src="img/image-home-childev.png" alt="home.image">
    </div>

</section>

<!-- home section ends -->

<!-- icons section starts  -->

{{-- <section class="icons-container">

    <div class="icons">
        <i class="fas fa-user-md"></i>
        <h3>140+</h3>
        <p>doctors at work</p>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <h3>1040+</h3>
        <p>satisfied patients</p>
    </div>

    <div class="icons">
        <i class="fas fa-procedures"></i>
        <h3>500+</h3>
        <p>training facilities</p>
    </div>

    <div class="icons">
        <i class="fas fa-hospital"></i>
        <h3>80+</h3>
        <p>available hospitals</p>
    </div>

</section> --}}

<!-- icons section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading"> <span>Tentang Kami</span></h1>

    <div class="box-container">
        
        <div class="box">
            <i class="fas fa-hospital-user"></i>
            <h3>Pertumbuhan dan Perkembangan</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <!-- <a href="/physiotherapy" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a> -->
        </div>

        <div class="box">
            <i class="fas fa-book"></i>
            <h3>Catatan Kesehatan Pribadi</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <!-- <a href="/free-checkup" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a> -->
        </div>

        <div class="box">
            <i class="fas fa-book-medical"></i>
            <h3>Rekam Medis</h3>
            <h3></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <!-- <a href="/expert-doctor" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a> -->
        </div>

        {{-- <div class="box">
            <i class="fas fa-briefcase-medical"></i>
            <h3>Total Care</h3>
            <p>treatment in the inpatient rehabilitation setting has been shown to provide a higher level of care and achieve better results versus other types of rehabilitation programs.</p>
            <a href="/rehabilitation-facility" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>Rehabilitation Facility</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Total care</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div> --}}

    </div>

</section>

<!-- services section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>Layanan Kami </span> </h1>

    <div class="row">

        <div class="image">
            <img src="img/image-about-new.png" alt="">
        </div>

        <div class="content">
            <h3>Layanan Kesehatan Tingkat 1</h3>
            <p style="font-size: 13pt; text-align:justify; text-transform: none">Childev akan menghubungkan anda dengan layanan kesehatan tingkat 1 sehingga Anak Anda dapat terus dipantau oleh tenaga medis.</p>
            <!-- <a href="/about-us" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a> -->
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- blogs section starts  -->

{{-- <section class="blogs" id="blogs">

    <h1 class="heading"> our <span>blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/blog-1.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>blog title goes here</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/blog-2.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>blog title goes here</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/blog-3.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>blog title goes here</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

    </div>

</section> --}}

<!-- blogs section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3><i class="fas fa-solid fa-stethoscope" style="margin-right:5%"></i> Childev </h3>
            <p style="font-size: 8pt; text-align:justify; text-transform: none">Childev membantu ayah bunda dalam pemantauan pertumbuhan dan perkembanan anak. Nantikan kami di layanan kesehatan tingkat 1 daerah Anda!</p>
        </div>

        <div class="box" style="visibility:hidden">
            <!-- <h3>our services</h3>
            <a href="/physiotherapy"> <i class="fas fa-chevron-right"></i> Pasca Stroke Physiotherapy </a>
            <a href="/free-checkup"> <i class="fas fa-chevron-right"></i> Free Checkup </a>
            <a href="/expert-doctor"> <i class="fas fa-chevron-right"></i> Expert Doctors </a>
            <a href="/rehabilitation-facility"> <i class="fas fa-chevron-right"></i> Total Care </a> -->
        </div>

        <div class="box" style="visibility:hidden">
            <!-- <h3>contact info</h3>
            <a href="https://api.whatsapp.com/send?text={{urlencode(url()->current()) }}"> <i class="fas fa-phone"></i> +62-031-5923644 </a>
            <a href="#"> <i class="fas fa-envelope"></i> enkaku@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Surabaya, Indonesia </a> -->
        </div>

        <div class="box" style="visibility:hidden">
            <!-- <h3>Layanan Kesehatan Tingkat 1 kami</h3>
            <p style="font-size: 8pt; text-align:justify; text-transform: none">Puskesmas  Mulyorejo</p>        
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a> -->
        </div>

    </div>

</section>

<!-- footer section ends -->

<!-- custom js file link  -->
    
@endsection
