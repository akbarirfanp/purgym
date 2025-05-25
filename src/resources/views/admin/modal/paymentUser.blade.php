<link rel="stylesheet" href="/assets/css/modal.css">
<div class="modal fade" id="showPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($matchedFiles as $file)
                    <div class="col-12 text-center">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $name }}, {{ $tanggal }}, {{ $jam }}</h1>
                        <img src="{{ asset('storage/bukti-pembayaran/' . basename($file)) }}" style="max-width: 100%; height: auto; margin-bottom: 70px;">
                    </div>
                    @endforeach
                </div>
            </div>            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
