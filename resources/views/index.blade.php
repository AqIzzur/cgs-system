@extends('main')
@section('content')
@php
$tanggal = date('d-m-Y ');
@endphp
<section id="header" class="pt-4">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6 col mb-3 mb-md-0">
                <div class="date rounded-start-5 rounded-end-3 bg-success bg-opacity-50 d-flex">
                    <div class="date-circle me-2 d-flex justify-content-center align-items-center bg-white">
                        <i class="fa fa-calendar-days fa-xl fa-fade"></i>
                    </div>
                    <h4 class="m-auto me-lg-3 me-2 text-tgl text-dark">{{ $tanggal }}</h4>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col d-flex justify-content-end">
                <div class="date ms-auto rounded-start-3 rounded-end-5 bg-info bg-opacity-50 d-flex ">
                    <h4 class="m-auto text-dark mx-2 text-tgl"><span id="real-time"></span></h4>
                    <div class="date-circle d-flex justify-content-center align-items-center bg-white">
                        <i class="fa-regular fa-clock fa-xl fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center text-utama">
            <div class="col-lg-8 col-md-12 col-sm-12 pt-5 text-sm-center text-lg-start">
                <h2 class="text-utama2 poppins-regular">Team Creative</h2>
                <h1 class="text-utama1 fw-bold poppins-regular">Cipta Graha Software</h1>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 text-center">
                <img class="logo-cgs1 rounded-3 " src="{{ asset('asset/image/cgs_team.png') }}" alt="Logo CGS">
            </div>
        </div>
        <div class="row button-sign mt-4">
            <div class="col-12 d-flex justify-content-between gap-3">
                <a href="/login" class="btn btn-primary btn-sign bg-opacity-50 fw-bold py-2 px-3 text-uppercase text-decoration-none">
                    <i class="fa fa-sign-in"></i> Sign In
                </a>
                <a href="/register" class="btn btn-primary btn-sign bg-opacity-50 fw-bold py-2 px-3 text-uppercase text-decoration-none">
                    <i class="fa fa-user-plus"></i> Sign Up
                </a>
            </div>
        </div>
    </div>
</section>

<section id="body" class="pb-5 pt-5 ">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="fw-bold text-center welcome poppins-bold">Welcome Team CGS</h1>
                <hr class="border border-dark border-3 mx-auto" style="width: 35%; ">
            </div>
        </div>
        <div class="row mt-md-5 mt-sm-2">
            <div class="col-lg-10 col-md-12 mx-auto">
                <div class="text-left poppins-regular text-dark welcome-description" style="">
                    <span class="text-bg-warning">System Team Creative CGS</span> adalah sebuah sistem yang dirancang khusus untuk mempermudah proses pelaporan dan pengelolaan aktivitas kreatif di Cipta Graha Software. Sistem ini memungkinkan anggota tim untuk melaporkan progres pekerjaan mereka secara real-time, memantau status tugas yang sedang berjalan, serta berbagi feedback atau ide-ide baru secara efisien. Dengan fitur yang mudah digunakan dan integrasi yang seamless, sistem ini membantu meningkatkan koordinasi, transparansi, dan produktivitas dalam tim creative CGS, memastikan setiap proyek berjalan sesuai rencana dan memenuhi standar kualitas yang tinggi.
                </div>
            </div>
        </div>
    </div>
</section>

<section id="img-slider" class="pb-3">
    <div class="container py-4">
        <div class="slider-container rounded">
            <div class="swiper-container image-slider img-slide">
                <div class="swiper-wrapper">
                    {{-- <div class="swiper-slide">
                        <div class="image-container">
                            <img class="img-responsive" src="{{ asset('asset/image/20.jpg') }}" alt="alternative">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-container">
                            <img class="img-responsive" src="{{ asset('asset/image/21.jpg') }}" alt="alternative">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-container">
                            <img class="img-responsive" src="{{ asset('asset/image/22.jpg') }}" alt="alternative">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-container">
                            <img class="img-responsive" src="{{ asset('asset/image/23.jpg') }}" alt="alternative">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-container">
                            <img class="img-responsive" src="{{ asset('asset/image/24.jpg') }}" alt="alternative">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-container">
                            <img class="img-responsive" src="{{ asset('asset/image/25.jpg') }}" alt="alternative">
                        </div>
                    </div> --}}
                    @foreach(range(20, 30) as $img)
                        <div class="swiper-slide">
                            <div class="image-container">
                                <img class="img-fluid" src="{{ asset('asset/image/'.$img.'.jpg') }}" alt="Image {{ $img }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="footer" class="bg-dark text-white">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-6 col-md-12 footer-logo">
                <img class="logo-cgs2 rounded img-fluid" src="{{ asset('asset/image/logo-cgs.png') }}" alt="Logo CGS">
                <h2 class="poppins-regular mt-3 text-white ">Cipta Graha Software - Solusi Terbaik Bisnis Anda</h2>
                <h4 style="" class=" text-white">Perum Wiratama 1 No.4, Pekuncen, Kec. Wiradesa <br> Kabupaten Pekalongan, Jawa Tengah 51153</h4>
            </div>
            <div class="col-lg-6 col-md-12 text-center  mt-3 mt-lg-0">
                <iframe class="rounded border border-success border-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.032481053019!2d109.6257864749962!3d-6.886712893112283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70265ac7f7b3cd%3A0x8231cc2a3cee2797!2sCV.%20Cipta%20Graha%20Software!5e0!3m2!1sid!2sid!4v1735145506031!5m2!1sid!2sid" width="305" height="150"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="mt-3 ">
                    @php
                        $sosmed = [
                            ['url' => 'https://www.youtube.com/@ciptagrahasoftware', 'icon' => 'yt.png'],
                            ['url' => 'https://api.whatsapp.com/send/?phone=6282124242386', 'icon' => 'wa2.png'],
                            ['url' => 'https://www.facebook.com/CiptaGrahaSoftware', 'icon' => 'fb2.png'],
                            ['url' => 'https://www.instagram.com/ciptagrahasoftware', 'icon' => 'ig2.png'],
                            ['url' => 'https://www.ciptagrahasoftware.com', 'icon' => 'web1.png']
                        ];
                    @endphp
                    @foreach($sosmed as $media)
                        <a href="{{ $media['url'] }}" class="mx-2 text-decoration-none" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('asset/icon-sosmed/'.$media['icon']) }}"  alt="" class="icon-sos2">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="{{ route('main.login_admin') }}" class="text-decoration-none pb-3"><p class="text-center poppins-regular text-white mb-3">&copy; 2024 M. Izzur Rohman. All rights reserved.</p></a>
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