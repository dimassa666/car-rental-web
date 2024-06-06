@extends('layout/admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Voucher</h1>

    <a href="/dashboard/voucher/create" class="btn btn-primary mb-3">Buat Voucher</a>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Voucher</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode voucher</th>
                            <th>Nilai diskon</th>
                            <th>Batas waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($voucher as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-uppercase">{{ $item->kode_voucher }}</td>
                                <td>{{ $item->nilai_diskon }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->batas_waktu)->locale('id')->isoFormat('D MMMM Y | HH:mm') }}
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="/dashboard/voucher/{{ $item->voucher_id }}" class="badge bg-info"><i
                                            class="fas fa-eye text-white"></i></a>
                                    <a href="/dashboard/voucher/{{ $item->voucher_id }}/edit" class="badge bg-warning"><i
                                            class="fas fa-edit text-white"></i></a>
                                    <form action="/dashboard/voucher/{{ $item->voucher_id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Apakah data ingin dihapus?')">
                                            <i class="fas fa-ban text-white"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
