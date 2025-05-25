@php
use Carbon\Carbon;
@endphp
<div class="container">
    <link rel="stylesheet" href="assets/css/dropdown.css">
    <a href="#home" style="text-decoration: none;">
        <div style="display: flex; align-items: center;">
            <img src="assets/img/banner/gym.svg" alt="Gym Icon" style="width: 150px; height: 65px; margin-right: 20px;">
            <span class="span" style="font-size: 3rem; color: black; font-family: sans-serif;"></span>
        </div>
    </a>
    <nav class="navbar" data-navbar>
        <ul class="navbar-list">
            <li>
                <a href="#alat" class="navbar-link" data-nav-link>Set GYM</a>
            </li>
            <li>
                <a href="#about" class="navbar-link" data-nav-link>About</a>
            </li>
            <li>
                <a href="#class" class="navbar-link" data-nav-link>Kelas</a>
            </li>
            <li>
                <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
            </li>
            <li>
                <a href="#footer" class="navbar-link" data-nav-link>Kontak Kami</a>
            </li>
        </ul>
    </nav>
    
    @guest
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
    @endguest

    @auth
    @php
        $expiredDate = Carbon::parse(Auth::user()->expired_date)->addMonth();
    @endphp

        <div class="action">
            <div class="profile" onclick="menuToggle();">
                <img src="{{ asset('assets/img/banner/fotoaisyah.png') }}">
            </div>
            <p class="ac-name" onclick="menuToggle();">{{ Auth::user()->name }}</p>
            <div class="menu">
                <h3>{{ Auth::user()->name }}<br><span>
                    {{ Auth::user()->role == 'admin' ? 'Admin' : '' }}
                    @if(Auth::user()->tipe == 'guest')
                        <strong>Belum Berlangganan</strong>
                    @else
                        @if(in_array(Auth::user()->tipe, ['Pemula', 'Menengah', 'Calon Atlet']))
                            {{ Auth::user()->tipe }}
                            <br>
                            <strong>Berlaku sampai {{ $expiredDate->format('Y-m-d') }}</strong>
                        @endif
                    @endif
                </span></h3>
                <ul>
                    @if(Auth::user()->role == 'admin')
                        <li><img src="/assets/img/icon/admin.png"><a href="/admin/dashboard">Halaman Admin</a></li>
                    @endif
                    <li><img src="/assets/img/icon/log-out.png"><a href="{{ route('logout') }}">Keluar</a></li>
                </ul>
            </div>
        </div>    
    @endauth

    <script>
        function menuToggle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
    }
    </script>
</div>