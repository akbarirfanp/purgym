{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PurGym Register</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('storePelanggan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" autocomplete="additional-name" id="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="tahun_kelahiran">Tahun Kelahiran</label>
                <input type="date" name="tahun_kelahiran" id="tahun_kelahiran" value="{{ old('tahun_kelahiran') }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required>
                    <option hidden>Pilih Jenis Kelamin</option>
                    <option value="Laki laki" {{ old('jenis_kelamin') == 'Laki laki' ? 'selected' : '' }}>Laki laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tlp">Nomor Telepon</label>
                <input type="text" name="tlp" id="tlp" value="{{ old('tlp') }}" required>
            </div>
            <div class="form-group">
                <button type="submit">Daftar Sekarang</button>
            </div>
        </form>
    </div>
</body>
</html>

 --}}








<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>PurGym Login</title>

    <!-- Icons font CSS-->
    <link href="/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/assets/css/register.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Register</h2>
                    <form action="{{ route('storePelanggan') }}" method="POST">
                    @csrf
                        <div class="input-group">
                            <input class="input--style-1" type="text" id="name" placeholder="NAMA" name="name" value="{{ old('name') }}" autocomplete="off" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" id="email" placeholder="EMAIL" name="email" value="{{ old('email') }}" autocomplete="off" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" id="password" placeholder="PASSWORD" name="password" value="{{ old('password') }}" autocomplete="off" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="" type="date" placeholder="TAHUN KELAHIRAN" id="tahun_kelahiran" name="tahun_kelahiran">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="jenis_kelamin" name="jenis_kelamin">
                                            <option disabled="disabled" selected="selected">Pilih Jenis Kelamin</option>
                                            <option value="Laki laki" {{ old('jenis_kelamin') == 'Laki laki' ? 'selected' : '' }}>Laki laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="NOMOR TELEPON" autocomplete="off" id="tlp" name="tlp">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/select2/select2.min.js"></script>
    <script src="/assets/vendor/datepicker/moment.min.js"></script>
    <script src="/assets/vendor/datepicker/daterangepicker.js"></script>
    <script src="/assets/js/global.js"></script>

</body>

</html>