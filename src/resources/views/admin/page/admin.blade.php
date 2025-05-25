@extends('admin.layout.index')

@section('content')
    <div class="card">
        <div class="card-body d-flex flex-row justify-content-between">
            <div class="card-header bg-transparent">
                <button class="btn btn-info" id="addData">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Admin</span>
                </button>
            </div>
            <form action="{{ url('/admin/admin_management') }}" method="get" class="form-inline">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Cari..." name="search" value="{{ Request::get('search') }}" aria-label="search">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card rounded-full">

        <div class="card-body">
            <table class="table table-responsive table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tahun Lahir</th>
                        <th>Gender</th>
                        <th>Telepon</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->isEmpty())
                        <tr class="text-center">
                            <td colspan="9">Tidak ada Admin</td>
                        </tr>
                    @else
                        <?php $y = $data->firstItem() ?>
                        @foreach ($data as $x)
                            <tr class="align-middle">
                                <td>{{ $y }}</td>
                                    <td>{{ $x->name }}</td>
                                    <td>{{ $x->email }}</td>
                                    <td>{{ $x->tahun_kelahiran }}</td>
                                    <td>{{ $x->jenis_kelamin }}</td>
                                    <td>{{ $x->tlp }}</td>
                                    <td> 
                                        <span class="badge text-bg-{{ $x->role == 'admin' ? 'info' : 'success' }}">{{ $x->role == 'admin' ? 'Admin' : 'User' }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-info editModal" data-id="{{$x->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger deleteData" data-id="{{ $x->id }}">
                                            <i class="fas fa-trash-alt"></i>
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
                    Menampilkan {{ $data->count() }} admin dari total {{ $data->total() }} admin
                </div>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="tampilData" style="display: none;"></div>
    <div class="tampilEditData" style="display: none;"></div>

    @if(session('success'))
        <div id="swalContainer" data-message="{{ session('success') }}"></div>
    @elseif(session('errors'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('errors') }}',
                icon: 'error',
            });
        </script>
    @endif

    <script>
        $('#addData').click(function() {
            $.ajax({
                url: '{{ route('addModalAdmin') }}',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#adminTambah').modal("show");
                }
            });
        });

        $('.editModal').click(function (e) { 
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "{{route('showAdmin', ['id'=> ':id'])}}".replace(':id',id),
                success: function (response) {
                    $('.tampilEditData').html(response).show();
                    $('#editAdmin').modal("show");
                }
            });
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr("content"),
            }
        })

        $(document).ready(function() {
            var successMessage = $('#swalContainer').data('message');
            if(successMessage) {
                Swal.fire('Berhasil!', successMessage, 'success');
            }
        });

        $('.deleteData').click(function (e) { 
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: "Apakah anda yakin",
                text: "ingin menghapus admin ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('destroyDataAdmin', ['id' => ':id']) }}".replace(':id', id),
                        success: function (response) {
                            Swal.fire('Berhasil!', 'Admin telah dihapus.', 'success').then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Berhasil!', 'Admin telah dihapus.', 'success').then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });
    </script>
@endsection