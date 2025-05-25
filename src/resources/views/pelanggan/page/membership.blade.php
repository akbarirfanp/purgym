<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/membership.css">
</head>

<div class="header" style="background-image: url('/assets/img/banner/yey.jpg'); background-size: cover; background-position: center; color: rgb(255, 255, 255); padding-top: 50px; padding-bottom: 50px;">
    <a style="color: inherit; font-family: var(--ff-catamaran); font-size: 100px; font-weight: var(--fw-900); display: flex; align-items: center; margin-inline-start: auto; margin-inline-end: auto; justify-content: center;">
        <div style="display: flex; align-items: center;">
            <img src="/assets/img/banner/gym.svg" alt="Gym Icon" style="width: 180px; height: 120px; margin-right: 20px;">
            <span class="span" style="font-size: 3rem;">MEMBERSHIP</span>
        </div>
    </a>
</div>


<body id="top">
    <section class="section class bg-dark has-bg-image" id="class" aria-label="class"
        style="background-image: url('/assets/img/icon/classes-bg.png')">   
    <div class="pricing-table-container">
        <div class="pricing-header">
            <h2>Tentukan Mana Pilihanmu!</h2>
        </div>
        <div class="pricing-table">
            <div class="table">
                <div class="content">
                    <h3>Pemula</h3>
                    <div class="price-container">
                        <span class="price basic-price">95K</span>
                        <span class="plan-duration">/bulan</span>
                    </div>
                    <div class="description">
                        Cocok buat kamu yang mau icip icip dan membiasakan diri dulu
                    </div>
                    <ul class="features">
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Akses ke semua peralatan Gym </li>
                        <li><s>Gratis Kelas 1 kali setiap minggu</s></li>
                        <li><s>Gratis 1 kali sesi Personal Training</s></li>
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Biaya Lebih Hemat</li>
                    </ul>
                    <a href="{{ route('pemula', ['id' => $data->id]) }}" class="btn">Daftar</a>
                </div>
                <img class="table-bg" src="/assets/img/icon/bg-shape1.svg" alt="">
            </div>
            <div class="table best-value">
                <span class="value">Populer</span>
                <div class="content">
                    <h3>Menengah</h3>
                    <div class="price-container">
                        <span class="price professional-price">120K</span>
                        <span class="plan-duration">/bulan</span>
                    </div>
                    <div class="description">
                        Rencana yang sangat mantap untuk kamu yang telah memantapkan hati
                    </div>
                    <ul class="features">
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Akses ke semua peralatan Gym</li>
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Gratis Kelas 1 kali setiap minggu</li>
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Gratis 1 kali sesi Personal Training</li>
                        <li><s>Biaya Lebih Hemat</s></li>
                    </ul>
                    <a href="{{ route('menengah', ['id' => $data->id]) }}" class="btn">Daftar</a>
                </div>
                <img class="table-bg" src="/assets/img/icon/bg-shape2.svg" alt="">
            </div>
            <div class="table">
                <div class="content">
                    <h3>Calon Atlet</h3>
                    <div class="price-container">
                        <span class="price business-price">325K</span>
                        <span class="plan-duration">/3 bulan</span>
                    </div>
                    <div class="description">
                        Buat kamu yang sudah menjadikan GYM sebagai rumah kedua
                    </div>
                    <ul class="features">
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Akses ke semua peralatan Gym</li>
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Gratis Kelas 1 kali setiap minggu</li>
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Gratis 1 kali sesi Personal Training</li>
                        <li><img src="/assets/img/icon/check-icon.svg" alt="Check Icon">‎ Biaya Lebih Hemat</li>
                    </ul>
                    <a href="{{ route('calonAtlet', ['id' => $data->id]) }}" class="btn">Daftar</a>
                </div>
                <img class="table-bg" src="/assets/img/icon/bg-shape1.svg" alt="">
            </div>
        </div>
    </div>

    <footer class="footer" id="footer">
        <div class="section footer-top bg-dark has-bg-image" style="background-image: url('./assets/images/footer-bg.png')">
        <div class="container">
            <div class="footer-brand">
            <div style="display: flex; align-items: center;">
                <img src="/assets/img/banner/gym.svg" alt="Gym Icon" style="width: 180px; height: 90px; margin-right: 20px;">
                <span class="span" style="font-size: 3rem; color: black; font-family: sans-serif;"></span>
            </div>
            <p class="footer-brand-text">
                Kecuali saat Hari raya, Walau tanggal merah kami tetap Buka setiap hari.
            </p>
            <div class="wrapper">
            </div>
            </div>
            <ul class="footer-list">
            <li>
                <p class="footer-list-title has-before">Our Links</p>
            </li>
            <li>
                <a href="index.html#home" class="footer-link">Home</a>
            </li>
            <li>
                <a href="index.html#about" class="footer-link">About Us</a>
            </li>
            <li>
                <a href="index.html#video" class="footer-link">Tutorial</a>
            </li>
            <li>
                <a href="index.html#class" class="footer-link">Classes</a>
            </li>
            <li>
                <a href="index.html#alat" class="footer-link">GYM Gear</a>
            </li>
            <li>
                <a href="index.html#blog" class="footer-link">Blog</a>
            </li>
            </ul>
            <ul class="footer-list">
            <li>
                <p class="footer-list-title has-before">Kontak Kami</p>
            </li>
            <li class="footer-list-item">
                <div class="icon">
                <ion-icon name="location" aria-hidden="true"></ion-icon>
                </div>
                <address class="address footer-link">
                Jl. Mandor Goweng RT05/RW03 No.21
                </address>
            </li>
            <li class="footer-list-item">
                <div class="icon">
                <ion-icon name="call" aria-hidden="true"></ion-icon>
                </div>
                <div>
                <a href="https://wa.link/jzpgul" class="footer-link">085173143834</a>
                <a href="https://wa.link/jzpgul" class="footer-link">087828053352</a>
                </div>
            </li>
            <li class="footer-list-item">
                <div class="icon">
                <ion-icon name="mail" aria-hidden="true"></ion-icon>
                </div>
                <div>
                <a href="mailto:purbodwi9@gmail.com" class="footer-link">purbodwi9@gmail.com</a>
                <a href="mailto:services@fitlife.com" class="footer-link">services@fitlife.com</a>
                </div>
            </li>
            </ul>
        </div>
        </div>
    </footer>
</body>
</html>
