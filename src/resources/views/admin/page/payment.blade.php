@extends('admin.layout.index')

@section('content')
<div class="card">
    <div class="card-body d-flex flex-row justify-content-between">
        <form action="{{ url('/admin/payment_detaild') }}" method="get" class="form-inline">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="Cari..." name="search" value="{{ Request::get('search') }}" aria-label="search">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>
<div class="card rounded-full">

    <div class="card-body">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Januari</th>
                    <th>Februari</th>
                    <th>Maret</th>
                    <th>April</th>
                    <th>Mei</th>
                    <th>Juni</th>
                    <th>Juli</th>
                    <th>Agustus</th>
                    <th>September</th>
                    <th>Oktober</th>
                    <th>November</th>
                    <th>Desember</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->isEmpty())
                    <tr class="text-center">
                        <td colspan="15">Tidak ada Member</td>
                    </tr>
                @else
                    <?php $y = $data->firstItem() ?>
                    @foreach ($data as $x)
                        <tr class="align-middle">
                            <td>{{ $y }}</td>
                            <td>{{ $x->name }}</td>
                            @for ($i = 1; $i <= 12; $i++)
                                <?php
                                    $payment_date = strtotime($x->payment_date);
                                    $expired_date = strtotime($x->expired_date);
                                    $current_year = date('Y');
                                    $current_month_start = strtotime($current_year . '-' . $i . '-01');
                                    $class = '';
                                    if ($payment_date && $expired_date && $current_month_start >= $payment_date && $current_month_start <= $expired_date) {
                                        if (date('Y', $payment_date) == $current_year) {
                                            $class = 'bg-success text-white';
                                        } elseif (date('Y', $payment_date) == $current_year + 1) {
                                            $class = 'bg-primary text-white';
                                        }
                                    }
                                    $next_year = $current_year + 1;
                                    $next_month_start = strtotime($next_year . '-' . $i . '-01');
                                    if ($payment_date && $expired_date && $next_month_start >= $payment_date && $next_month_start <= $expired_date) {
                                        $class = 'bg-primary text-white';
                                    }
                                ?>
                                <td class="{{ $class }}"></td>
                            @endfor
                            <td>
                                <button class="btn btn-info editModal" data-id="{{ $x->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <?php $y++ ?>
                    @endforeach
                @endif
            </tbody>                                                
        </table>
        <div class="pagination d-flex flex-row justify-content-between">
            <div class="showData">
                Menampilkan {{ $data->count() }} member dari total {{ $data->total() }} member
            </div>
            <div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
<div class="showData" style="display: none;"></div>


<script>
    $('.editModal').click(function (e) { 
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: "{{route('showPayment', ['id'=> ':id'])}}".replace(':id',id),
            success: function (response) {
                $('.showData').html(response).show();
                $('#showPayment').modal("show");
            }
        });
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr("content"),
        }
    })
</script>
@endsection
{{-- mengapa ketika saya mengupdate data tanda hijau sebelumnya di ganti ke data yang baru? buatlah ketika datanya di update maka tidak akan menghilangkan tanda hijau sebelumnya . 
DAN JANGAN TAMBAH DATA LAIN SEPERTI PAID_MONTH --}}

{{--  --}}

