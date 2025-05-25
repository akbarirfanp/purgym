<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/modal.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title fs-5">{{$title}}</h1>
                    </div>
                    <form action="{{ route('processPemula', $data->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="bank" class="col-sm-5 col-form-label">Pilih Bank</label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="bank" name="bank" onchange="updateRekening()">
                                        <option value="" hidden>Pilih Bank</option>
                                        <option value="BCA" data-rekening="123456789">BCA</option>
                                        <option value="BRI" data-rekening="987654321">BRI</option>
                                        <option value="Mandiri" data-rekening="1122334455">Mandiri</option>
                                        <option value="Jago" data-rekening="9988776655">Jago</option>
                                        <option value="BSI" data-rekening="4433221100">BSI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_rek" class="col-sm-5 col-form-label">No Rekening</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <div id="no_rek"></div>
                                    </div>
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
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

        function updateRekening() {
            var select = document.getElementById("bank");
            var selectedOption = select.options[select.selectedIndex];
            var rekening = selectedOption.getAttribute("data-rekening");
            document.getElementById("no_rek").innerText = rekening;
        }
    </script>
</body>
</html>
```