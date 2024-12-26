@extends('main')
@section('content')
@php
$tanggal = date('d-m-Y ');
// $timestamp    = date('H:i:s');
// $time    = time('')                               
@endphp
<section id="header" class="pt-4">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="date rounded-start-5 rounded-end-3 bg-success bg-opacity-50 d-flex">
                            <div class="date-circle me-3 d-flex justify-content-center align-items-center bg-white">
                                <i class="fa fa-calendar-days fa-xl fa-fade"></i>
                            </div>
                            <h4 class=" m-auto me-3 text-dark">{{ $tanggal }} </h4>
                        </div>
                    </div>
                    <div class="col d-flex">
                        {{-- <h4 class="text-end"><span id="real-time" class="text-primary"></span></h4> --}}
                        <div class=" date ms-auto rounded-start-3 rounded-end-5 bg-info bg-opacity-50 d-flex">
                            <h4 class=" m-auto mx-3 text-dark"><span id="real-time" class=""></h4>
                            <div class="date-circle  d-flex justify-content-center align-items-center bg-white">
                                <i class="fa-regular fa-clock fa-xl fa-spin"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row text-utama">
                <div class="col-10 pt-5">
                    <h2 class="text-utama2 poppins-regular">Team Creative</h3>
                    <h1 class="text-utama1 fw-bold poppins-regular">Cipta Graha Software</h2>
                </div>
                <div class="col-2">
                    {{-- <p id="real-time"></p> --}}
                    <img class="logo-cgs1 rounded-3" src="{{ asset('asset/image/logo-cgs.png') }}" alt="">
                </div>
            </div>
            
            <div class="row button-sign">
                <div class="col-12 d-flex justify-content-between ">
                    <a href="#" class="btn btn-primary bg-opacity-50 fw-bold btn1 p-3 text-uppercase">Sign In</a>
                    <a href="#" class="btn btn-primary bg-opacity-50 fw-bold btn2 p-3 text-uppercase">Sign Up</a>
    
                </div>

            </div>
        </div>
    </section>
{{-- <section id="welcome"></section> --}}
<section id="body" class="pb-5  pt-5">
    <div class="container">
    <div class="row">
        <div class="col">
            <h1 class="fw-bold text-center poppins-bold">Welcome Team CGS</h1>
            <hr class="border border-dark border-3 mx-auto" style="width: 35%; margin-top:-10px;">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="text-justify poppins-reguler text-white" style="font-size: 20px">"System Team Creative CGS" adalah sebuah sistem yang dirancang khusus untuk mempermudah proses pelaporan dan pengelolaan aktivitas kreatif di Cipta Graha Software. Sistem ini memungkinkan anggota tim untuk melaporkan progres pekerjaan mereka secara real-time, memantau status tugas yang sedang berjalan, serta berbagi feedback atau ide-ide baru secara efisien. Dengan fitur yang mudah digunakan dan integrasi yang seamless, sistem ini membantu meningkatkan koordinasi, transparansi, dan produktivitas dalam tim creative CGS, memastikan setiap proyek berjalan sesuai rencana dan memenuhi standar kualitas yang tinggi.</div>
        </div>
    </div>
    <div class="row button-asset mt-5">
        <div class="col-12 d-flex justify-content-between ">
            <a href="#" class="btn btn-secondary bg-opacity-50 fw-bold btn-aset p-3 text-uppercase">Asset</a>
            <a href="#" class="btn btn-secondary bg-opacity-50 fw-bold btn-hasil p-3 text-uppercase">Hasil</a>

        </div>

    </div>
</div>
</section>

<section id="img-slider">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</section>

<section id="footer" class="">
    <div class="container">
    <div class="row py-4">
        <div class="col">
            <img class="logo-cgs2 rounded" src="{{ asset('asset/image/logo-cgs.png') }}" alt="">
            <h2 class="poppins-regular mt-3 text-white" style="font-size: 20px">Cipta Graha Software - Solusi Terbaik Bisnis Anda</h2>
            <h4 class="text-white" style="font-size:12px">Perum Wiratama 1 No.4, Pekuncen, Kec. Wiradesa <br> Kabupaten Pekalongan, Jawa Tengah 51153</h4>
        </div>
        <div class="col d-flex justify-content-end flex-column">
            <iframe class="ms-auto text-end rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.032481053019!2d109.6257864749962!3d-6.886712893112283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70265ac7f7b3cd%3A0x8231cc2a3cee2797!2sCV.%20Cipta%20Graha%20Software!5e0!3m2!1sid!2sid!4v1735145506031!5m2!1sid!2sid" 
            width="305" 
            height="150.4" 
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="ms-auto  mt-3">
                <a href="https://www.youtube.com/@ciptagrahasoftware" class=" me-4 text-decoration-none">
                    <img src="{{ asset('asset/icon-sosmed/yt.png') }}" alt="" class="icon-sos1">
                </a>
                <a href="https://api.whatsapp.com/send/?phone=6282124242386&text&type=phone_number&app_absent=0" class="me-4 text-decoration-none">
                    <img src="{{ asset('asset/icon-sosmed/wa2.png') }}" alt="" class="icon-sos2 ">
                </a>
                <a href="https://www.facebook.com/CiptaGrahaSoftware" class="me-4 text-decoration-none">

                    <img src="{{ asset('asset/icon-sosmed/fb2.png') }}" alt="" class="icon-sos2 ">
                </a>
                <a href="https://www.instagram.com/ciptagrahasoftware?igsh=MThlNno4d2N1Z3Ficg==" class="me-4 text-decoration-none">

                    <img src="{{ asset('asset/icon-sosmed/ig2.png') }}" alt="" class="icon-sos2 ">
                </a>
                <a href="https://www.ciptagrahasoftware.com" class="text-decoration-none">
                    <img src="{{ asset('asset/icon-sosmed/web1.png') }}" alt="" class="icon-sos2 ">

                </a>
            </div>
        </div>
    </div>
    <p class="text-center poppins-regular text-white mb-3">
        © 2024 M. Izzur Rohman  . All rights reserved.
    </p>
    </div>
</section>




    <script>
        function updateClock() {
            const now = new Date();
            const time = now.toLocaleTimeString('en-GB'); // Format H:i:s
            document.getElementById('real-time').textContent = time;
        }

        // Jalankan setiap detik
        setInterval(updateClock, 1000);

        // Panggil pertama kali
        updateClock();
    </script>
@endsection