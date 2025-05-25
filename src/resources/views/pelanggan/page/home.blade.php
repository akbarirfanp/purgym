@extends('pelanggan.layout.index')

@section('content')
@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: '{{ session('success') }}',
            icon: 'success',
        });
    </script>
@endif

    <main>
        <article>
            <section class="section hero bg-dark has-after has-bg-image" id="home" aria-label="hero" data-section
                style="background-image: url('assets/img/banner/hero-bg.png')">
                <div class="container">
                <div class="hero-content">
                    <p class="hero-subtitle">
                    <strong class="strong">DO IT</strong>NOW!
                    </p>
                    <h1 class="h1 hero-title">Persehat Raga perkuat Jiwa!</h1>
                    <p class="section-text">
                    Menjaga Kebugaran Tubuh adalah bentuk dari Mencintai Diri Sendiri, Hidup yang Nikmat dimulai tubuh yang Sehat. 
                    </p>
                    @if(Auth::check())
                    <a href="{{ route('membership', ['id' => Auth::user()->id]) }}" class="btn btn-primary">Daftar Membership</a>
                    @else
                    <a href="#" class="btn btn-primary" onclick="alert('Silakan login terlebih dahulu untuk mendaftar membership'); return false;">Daftar Membership</a>
                    @endif
                </div>
                <div class="hero-banner">
                    <img src="assets/img/banner/hero-banner.png" width="300" height="423" alt="hero banner" class="w-100">
                    <img src="assets/img/banner/hero-circle-one.png" width="666" height="666" aria-hidden="true" alt=""
                    class="circle circle-1">
                    <img src="assets/img/banner/hero-circle-two.png" width="666" height="666" aria-hidden="true" alt=""
                    class="circle circle-2">
                    <img src="assets/img/banner/heart-rate.svg" width="255" height="270" alt="heart rate"
                    class="abs-img abs-img-1">
                    <img src="assets/img/banner/calories.svg" width="348" height="224" alt="calories" class="abs-img abs-img-2">
                </div>
                </div>
            </section>


            <section class="section about" id="about" aria-label="about">
                <div class="container">
                <div class="about-banner has-after">
                    <img src="assets/img/banner/fotoaisyah.png" width="660" height="648" loading="lazy" alt="about banner"
                    class="w-100">
                    <img src="assets/img/banner/about-circle-one.png" width="660" height="534" loading="lazy" aria-hidden="true"
                    alt="" class="circle circle-1">
                    <img src="assets/img/banner/about-circle-two.png" width="660" height="534" loading="lazy" aria-hidden="true"
                    alt="" class="circle circle-2">
                    <img src="assets/img/logo/fitness.png" width="650" height="154" loading="lazy" alt="fitness"
                    class="abs-img w-100">
                </div>
                <div class="about-content">
                    <p class="section-subtitle">About Us</p>
                    <h2 class="h2 section-title">Welcome To PurGYM</h2>
                    <p class="section-text" align="justify">
                    Yuk, kenalan sama PurGym! tempat gym kece yang bakal bikin kamu betah! Di PurGym, kamu bakal dapetin semua fasilitas top tanpa bikin kantong Bolong. 
                    Cocok buat semua level kebugaran. Mulai dari alat-alat canggih sampe kelas-kelas seru dengan instruktur pro, semua lengkap ada di sini. 
                    Mulailah petualangan menuju hidup sehat yang bikin kamu makin keren!
                    </p>
                    <p class="section-text">
                    Kuy lebih kepoin kami dan jangan ragu juga berkunjung Harian. Ada juga Konsultasi gratis kapanpun untuk member bersama
                    </p>
                    <div class="wrapper">
                    <div class="about-coach">
                        <figure class="coach-avatar">
                        <img src="assets/img/banner/about-coach.png" width="65" height="65" loading="lazy" alt="Trainer">
                        </figure>
                        <div>
                        <h3 class="h3 coach-name">Meidi Robinson</h3>
                        <p class="coach-title">Body Builder Coach</p>
                        </div>
                    </div>
                    @if(Auth::check())
                    <a href="{{ route('membership', ['id' => Auth::user()->id]) }}" class="btn btn-primary">Konsultasi</a>
                    @else
                    <a href="#" class="btn btn-primary" onclick="alert('Silakan login terlebih dahulu untuk mendaftar membership'); return false;">Konsultasi</a>
                    @endif
                    </div>
                </div>
                </div>
            </section>


            <section class="section video" aria-label="video" id="video">
                <div class="container">
                <div class="video-card has-before has-bg-image"
                    style="background-image: url('assets/img/banner/video-banner.jpg')">
                    <h2 class="h2 card-title">Mari Eksplorasi</h2>
                    <a href="https://youtube.com/playlist?list=PLCwjKeC5hsqNTFskUFCp9DOGxlmq9kEvT&si=154a00Vu4-EmTiAb" target="_blank" rel="noopener noreferrer">
                    <button class="play-btn" aria-label="play video">
                        <ion-icon name="play-sharp" aria-hidden="true"></ion-icon>
                    </button>
                    </a>
                    <a href="https://youtube.com/playlist?list=PLCwjKeC5hsqNTFskUFCp9DOGxlmq9kEvT&si=z2X6t-IcIz47Ze4J" class="btn-link has-before">Tonton Playlist Tutorial Gym di Youtube Kami</a>
                </div>
                </div>
            </section>


            <section class="section class bg-dark has-bg-image" aria-label="class" style="background-image: url('assets/img/classes-bg.png')">
                <div class="container">
                <p class="section-subtitle">Kelas yang Tersedia</p>
                <h2 class="h2 section-title text-center" id="class">Berbagai jalan untuk berbagai Tujuan</h2>
                <ul class="class-list has-scrollbar">
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/class-1.jpg" width="416" height="240" loading="lazy" alt="Weight Lifting"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/class-icon-1.png" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Weight Lifting</a>
                            </h3>
                        </div>
                        <p class="card-text" align="justify">
                            Latihan fisik yang menggunakan beban berat untuk membangun kekuatan, massa otot, dan meningkatkan kesehatan tubuh anda secara keseluruhan.
                        </p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Class Full</p>
                            <span class="progress-value">85%</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/class-2.jpg" width="416" height="240" loading="lazy" alt="Cardio & Strenght"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/class-icon-2.png" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Cardio & Strenght</a>
                            </h3>
                        </div>
                        <p class="card-text" align="justify">
                            Pelatihan Kombinasi latihan fisik yang menggabungkan aktivitas kardiovaskular untuk meningkatkan kebugaran jantung dan pembakaran kalori dengan latihan kekuatan untuk memperkuat otot tubuh.
                        </p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Class Full</p>
                            <span class="progress-value">70%</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 70%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/class-3.jpg" width="416" height="240" loading="lazy" alt="Power Yoga"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/class-icon-3.png" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Power Yoga</a>
                            </h3>
                        </div>
                        <p class="card-text" align="justify">
                            Relaksasi Yoga yang dinamis dan intens yang dapat memperkuat tubuh serta meningkatkan fleksibilitas  melalui gerakan dan nafas yang teratur. Olahraga penuh ketenangan.
                        </p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Class Full</p>
                            <span class="progress-value">90%</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 90%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/class-4.jpg" width="416" height="240" loading="lazy" alt="The Fitness Pack"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/class-icon-4.png" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">The Fitness Pack</a>
                            </h3>
                        </div>
                        <p class="card-text" align="justify">
                            Menyajikan pengalaman latihan komprehensif dengan beragam peralatan dan instruktur berpengalaman, Jadwal yang proporsional untuk membantu anda meraih kebugaran optimal.
                        </p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Class Full</p>
                            <span class="progress-value">60%</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                </ul>
                <br>
                <br>
                <p class="section-subtitle">Alat Alat Fitness Unggulan</p>
                <h2 class="h2 section-title text-center" id="alat">Nikmati Kelengkapan dalam GYM</h2>
                <ul class="class-list has-scrollbar">
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/bench-press.jpg" width="416" height="240" loading="lazy" alt="Cardio & Strenght"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title" >Bench Press</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Alat latihan yang digunakan untuk menguatkan otot dada, bahu, dan trisep. Dapat membantu anda untuk meningkatkan kekuatan otot, membentuk dada yang kuat, serta meningkatkan stabilitas dan postur tubuh.</p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">8 unit</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 80%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/smith-machine.png" width="416" height="240" loading="lazy" alt="Cardio & Strenght"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Smith Machine</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Alat ini menawarkan keunggulan yang luar biasa. Memberikan kesempatan untuk mencapai target kebugaran tanpa risiko cedera serta dapat menambah keamanan saat melakukan latihan beban seperti squat, bench press, atau shoulder press.</p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">5 unit</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 50%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/treadmill.jpg" width="416" height="240" loading="lazy" alt="Power Yoga"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Treadmill</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Dengan berbagai kecepatan dan kemiringan yang dapat disesuaikan, treadmill membantu anda dalam meningkatkan kesehatan kardiovaskular, membakar kalori, dan meningkatkan kebugaran secara keseluruhan.</p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">9 unit</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 90%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/leg-press.jpg" width="416" height="240" loading="lazy" alt="The Fitness Pack"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Leg Press Machine</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Alat ini memungkinkan anda untuk melatih otot kaki dengan menekan beban menggunakan kaki Anda. Dengan variasi berat yang dapat disesuaikan, alat ini membantu membangun kekuatan dan massa otot pada kaki anda. </p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">6 unit</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/cable-machine.png" width="416" height="240" loading="lazy" alt="The Fitness Pack"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Cable Machine</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Disertai dengan kabel dan pulley, alat ini memiliki keunggulan dalam variasi posisi dan berat yang fleksibel. Anda dapat menguatkan dan membentuk tubuh secara menyeluruh, memperbaiki postur, dan meningkatkan fleksibilitas.</p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">6 unit</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/seated-row.jpg" width="416" height="240" loading="lazy" alt="The Fitness Pack"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Seated Row</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Alat latihan yang dirancang khusus untuk menguatkan otot punggung dan bahu anda. Dengan posisi duduk yang stabil dan handle yang terhubung ke beban dengan melakukan gerakan menarik yang mengarahkan siku ke belakang.</p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">4 unit</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/dip-bar.jpg" width="416" height="240" loading="lazy" alt="The Fitness Pack"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Dip Bar</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Alat latihan yang memungkinkan anda melakukan latihan dip yang efektif untuk menguatkan otot dada, trisep, dan bahu. Dimana anda menahan tubuh dengan kedua tangan di pegangan dan mengangkat diri Anda sendiri dengan lengan Anda.</p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">6 Pasang</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/rowing-machine.jpg" width="416" height="240" loading="lazy" alt="The Fitness Pack"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Rowing Machine</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Alat ini cocok untuk melatih otot utama anda dengan penarikan pegangan, menggerakkan kursi bolak-balik yang memicu pembakaran kalori tinggi, peningkatan kesehatan kardiovaskular, dan pengembangan otot holistik.</p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">7 unit</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 70%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="class-card">
                        <figure class="card-banner img-holder" style="--width: 416; --height: 240;">
                        <img src="assets/img/banner/monkey-bar.png" width="416" height="240" loading="lazy" alt="The Fitness Pack"
                            class="img-cover">
                        </figure>
                        <div class="card-content">
                        <div class="title-wrapper">
                            <img src="assets/img/icon/check-icon.svg" width="52" height="52" aria-hidden="true" alt=""
                            class="title-icon">
                            <h3 class="h3">
                            <a class="card-title">Monkey Bar</a>
                            </h3>
                        </div>
                        <p class="card-text">
                            Dengan struktur yang memungkinkan untuk bergantung dan bergerak antara tiang, alat ini tidak hanya melatih kekuatan, dan kelincahan. Tetapi juga meningkatkan fleksibilitas, dan merangsang pertumbuhan otot secara efektif.</p>
                        <div class="card-progress">
                            <div class="progress-wrapper">
                            <p class="progress-label">Jumlah</p>
                            <span class="progress-value">Cukup untuk 15 orang</span>
                            </div>
                            <div class="progress-bg">
                            <div class="progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
            </section>


            <section class="section blog" id="blog" aria-label="blog">
                <div class="container">
                <p class="section-subtitle">Artikel Kami</p>
                <h2 class="h2 section-title text-center">Pembahasan Terkini</h2>
                <ul class="blog-list has-scrollbar">
                    <li class="scrollbar-item">
                    <div class="blog-card">
                        <div class="card-banner img-holder" style="--width: 440; --height: 270;">
                        <img src="assets/img/banner/deadlift.jpg" width="440" height="270" loading="lazy"
                            alt="Olahraga Deadlift: Definisi, Cara Melakukan, dan Manfaatnya untuk Tubuh" class="img-cover">
                        <time class="card-meta" datetime="2024-05-10">10 May 2024</time>
                        </div>
                        <div class="card-content">
                        <h3 class="h3">
                            <a href="{{ route('artikel1') }}" class="card-title">Olahraga Deadlift: Definisi, Cara Melakukan, dan Manfaatnya untuk Tubuh</a>
                        </h3>
                        <p class="card-text">
                            Deadlift adalah gerakan yang dominan pada bagian pinggul dan berfungsi untuk melatih otot tubuh bagian bawah dengan tujuan untuk meningkatkan massa otot dan meningkatkan kebugaran.
                        </p>
                        <a href="{{ route('artikel1') }}" class="btn-link has-before" onclick="window.location.href='{{ route('artikel1') }}'">Read More</a>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="blog-card">
                        <div class="card-banner img-holder" style="--width: 440; --height: 270;">
                        <img src="assets/img/banner/Buah-buahan.jpg" width="440" height="270" loading="lazy"
                            alt="Konsumsi Lebih Banyak Buah, Ini 4 Hal yang Perlu Kamu Ketahui tentang Diet Fruitarian" class="img-cover">
                        <time class="card-meta" datetime="2024-05-10">10 May 2024</time>
                        </div>
                        <div class="card-content">
                        <h3 class="h3">
                            <a href="{{ route('artikel2') }}" class="card-title">Konsumsi Lebih Banyak Buah, Ini 4 Hal yang Perlu Kamu Ketahui tentang Diet Fruitarian</a>
                        </h3>
                        <p class="card-text">
                            Hampir mirip seperti vegetarian, pengikut diet fruitarian hanya mengonsumsi buah-buahan, kacang-kacangan, dan biji-bijian.
                        </p>
                        <a href="{{ route('artikel2') }}" class="btn-link has-before" onclick="window.location.href='{{ route('artikel3') }}'">Read More</a>
                        </div>
                    </div>
                    </li>
                    <li class="scrollbar-item">
                    <div class="blog-card">
                        <div class="card-banner img-holder" style="--width: 440; --height: 270;">
                        <img src="assets/img/banner/burpee.webp" width="440" height="270" loading="lazy"
                            alt="Burpee, Latihan Efektif untuk Perkuat Otot Tubuh" class="img-cover">
                        <time class="card-meta" datetime="2024-05-10">11 May 2024</time>
                        </div>
                        <div class="card-content">
                        <h3 class="h3">
                            <a href="{{ route('artikel3') }}" class="card-title">Burpee, Latihan Efektif untuk Perkuat Otot Tubuh</a>
                        </h3>
                        <p class="card-text">
                            Burpee adalah rangkaian gerakan yang melibatkan hampir semua bagian tubuh yang dilakukan secara berulang. Latihan ini biasanya terdiri dari gerakan squat, plank, push-up, jump back to squat, dan jumping.
                        </p>
                        <a href="{{ route('artikel3') }}" class="btn-link has-before" onclick="window.location.href='{{ route('artikel3') }}'">Read More</a>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
            </section>
        </article>
    </main>


    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="caret-up-sharp" aria-hidden="true"></ion-icon>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr("content"),
            }
        });
    </script>
@endsection