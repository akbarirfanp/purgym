<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurGYM {{$title}}</title>
    <link rel="shortcut icon" href="assets/img/banner/gym.svg" type="image/svg+xml">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600;700;800;900&family=Rubik:wght@400;500;800&display=swap" rel="stylesheet">
    <link rel="preload" as="image" href="assets/img/banner/hero-banner.png">
    <link rel="preload" as="image" href="assets/img/banner/hero-circle-one.png">
    <link rel="preload" as="image" href="assets/img/banner/hero-circle-two.png">
    <link rel="preload" as="image" href="assets/img/banner/heart-rate.svg">
    <link rel="preload" as="image" href="assets/img/banner/calories.svg">
</head>

<body id="top">
    <header class="header" data-header>
        @include('pelanggan.componen.navbar')
    </header>

    <main>
        @yield('content')
    </main>

    <section>
        @include('pelanggan.componen.footer')
    </section>

    <script src="assets/js/script.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

</body>




</html>