@extends('layout/admin')

@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Voucher Baru</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Voucher</h6>
                </div>
                <div class="card-body">
                    <form action="/dashboard/voucher" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kode_voucher">Kode Voucher</label>
                            <input type="text" class="form-control @error('kode_voucher') is-invalid @enderror"
                                id="kode_voucher" name="kode_voucher" value="{{ old('kode_voucher') }}">
                            @error('kode_voucher')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nilai_diskon">Nilai Diskon</label>
                            <input type="number" class="form-control @error('nilai_diskon') is-invalid @enderror"
                                id="nilai_diskon" name="nilai_diskon" value="{{ old('nilai_diskon') }}">
                            @error('nilai_diskon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="batas_waktu">Batas Waktu</label>
                            <input type="datetime-local" class="form-control @error('batas_waktu') is-invalid @enderror"
                                id="batas_waktu" name="batas_waktu" value="{{ old('batas_waktu') }}">
                            @error('batas_waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="aktif">Aktif</option>
                                <option value="kedaluwarsa">Tidak Aktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <input type="hidden" name="karyawan_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-primary">Buat Voucher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
