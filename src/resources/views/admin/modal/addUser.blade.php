<link rel="stylesheet" href="/assets/css/modal.css">
<div class="modal fade" id="userTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$title}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('addUser') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3 row">
                <label for="name" class="col-sm-5 col-form-label">Nama</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="name" name="nama">
                </div>
                </div>
                <div class="mb-3 row">
                <label for="email" class="col-sm-5 col-form-label">Email</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-5 col-form-label">Password</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="fa-solid fa-eye-slash"></i></button>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahun_kelahiran" class="col-sm-5 col-form-label">Tahun Kelahiran</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control" id="tahun_kelahiran" name="tahun_kelahiran">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis_kelamin" class="col-sm-5 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-7">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="" hidden>Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Femboy">Femboy</option>
                        <option value="Non Binary">Non Binary</option>
                        <option value="Walmart Bag">wallmart Bag</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tlp" class="col-sm-5 col-form-label">Telephone</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="tlp" name="tlp">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="type" class="col-sm-5 col-form-label">Tipe</label>
                <div class="col-sm-7">
                    <select class="form-control" id="tipe" name="tipe">
                        <option value="" hidden>Pilih Tipe</option>
                        <option value="Guest">Guest</option>
                        <option value="Pemula">Pemula</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Calon Atlet">Calon Atlet</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="payment_date" class="col-sm-5 col-form-label">Payment Date</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control" id="payment_date" name="payment_date">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="expired_date" class="col-sm-5 col-form-label">Expired Date</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control" id="expired_date" name="expired_date">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bukti" class="col-sm-5 col-form-label">Bukti Pembayaran</label>
                <div class="col-sm-7">
                    <div class="foto-container">
                        <div class="preview-container">
                            <img class="preview" style="display: none;" onclick="selectNewImage()">
                        </div>
                        <label for="inputFoto" class="plus-btn">
                            <i class="fas fa-plus"></i>
                            <input type="file" class="form-control d-none" accept=".png, .jpg, .jpeg" id="inputFoto" name="bukti" onchange="previewImg(this)">
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function previewImg(input) {
        const fotoIn = input.files[0];
        const fotoContainer = input.closest('.foto-container');
        const preview = fotoContainer.querySelector('.preview');
        const plusBtn = fotoContainer.querySelector('.plus-btn');

        if (fotoIn) {
            const oFReader = new FileReader();
            oFReader.readAsDataURL(fotoIn);

            oFReader.onload = function(oFREvent) {
                preview.style.display = 'block';
                preview.src = oFREvent.target.result;
                plusBtn.style.display = 'none';
            }
        }
    }

    function selectNewImage() {
        document.getElementById('inputFoto').click();
    }

    document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const eyeIcon = '<i class="fa-solid fa-eye"></i>';
    const eyeSlashIcon = '<i class="fa-solid fa-eye-slash"></i>';

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        this.innerHTML = eyeIcon;
    } else {
        passwordInput.type = 'password';
        this.innerHTML = eyeSlashIcon;
    }
    });
</script>