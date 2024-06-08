@extends('layout/admin')

@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kendaraan</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Kendaraan</h6>
                </div>
                <div class="card-body">
                    <form action="/dashboard/kendaraan/{{ $kendaraan->kendaraan_id }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                                name="kategori">
                                <option value="mobil"
                                    {{ old('kategori', $kendaraan->kategori) === 'mobil' ? 'selected' : '' }}>Mobil</option>
                                <option value="minibus"
                                    {{ old('kategori', $kendaraan->kategori) === 'minibus' ? 'selected' : '' }}>Minibus
                                </option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis">
                                <!-- Options will be populated by JavaScript -->
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk"
                                name="merk" value="{{ old('merk', $kendaraan->merk) }}">
                            @error('merk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe"
                                name="tipe" value="{{ old('tipe', $kendaraan->tipe) }}">
                            @error('tipe')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="transmisi">Transmisi</label>
                            <select class="form-control @error('transmisi') is-invalid @enderror" id="transmisi"
                                name="transmisi">
                                <option value="otomatis"
                                    {{ old('transmisi', $kendaraan->transmisi) === 'otomatis' ? 'selected' : '' }}>Otomatis
                                </option>
                                <option value="manual"
                                    {{ old('transmisi', $kendaraan->transmisi) === 'manual' ? 'selected' : '' }}>Manual
                                </option>
                            </select>
                            @error('transmisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun_produksi">Tahun Produksi</label>
                            <input type="text" class="form-control @error('tahun_produksi') is-invalid @enderror"
                                id="tahun_produksi" name="tahun_produksi"
                                value="{{ old('tahun_produksi', $kendaraan->tahun_produksi) }}">
                            @error('tahun_produksi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa</label>
                            <input type="number" class="form-control @error('harga_sewa') is-invalid @enderror"
                                id="harga_sewa" name="harga_sewa" value="{{ old('harga_sewa', $kendaraan->harga_sewa) }}">
                            @error('harga_sewa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="plat_nomor">Plat Nomor</label>
                            <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror"
                                id="plat_nomor" name="plat_nomor" value="{{ old('plat_nomor', $kendaraan->plat_nomor) }}">
                            @error('plat_nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="tersedia"
                                    {{ old('status', $kendaraan->status) === 'tersedia' ? 'selected' : '' }}>Tersedia
                                </option>
                                <option value="tidak"
                                    {{ old('status', $kendaraan->status) === 'tidak' ? 'selected' : '' }}>Tidak Tersedia
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <img src="{{ asset('storage/' . $kendaraan->foto) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                    id="foto" name="foto" onchange="previewImage()">
                                <label class="custom-file-label" for="foto">Pilih file</label>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kategoriSelect = document.getElementById('kategori');
            const jenisSelect = document.getElementById('jenis');

            const jenisOptions = {
                mobil: ['suv', 'mpv', 'sedan', 'sport', 'convertible', 'elektrik', 'lcgc'],
                minibus: ['minibus']
            };

            function updateJenisOptions() {
                const selectedKategori = kategoriSelect.value;
                const availableJenis = jenisOptions[selectedKategori];

                jenisSelect.innerHTML = '';
                availableJenis.forEach(jenis => {
                    const option = document.createElement('option');
                    option.value = jenis;
                    option.textContent = jenis.charAt(0).toUpperCase() + jenis.slice(1);
                    option.selected = jenis === "{{ old('jenis', $kendaraan->jenis) }}";
                    jenisSelect.appendChild(option);
                });
            }

            kategoriSelect.addEventListener('change', updateJenisOptions);
            updateJenisOptions();

            const fotoInput = document.getElementById('foto');
            fotoInput.addEventListener('change', function() {
                const fileName = this.files[0].name;
                const nextSibling = this.nextElementSibling;
                nextSibling.innerHTML = fileName;
                previewImage();
            });

            function previewImage() {
                const image = document.querySelector('#foto');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        });
    </script>
@endsection
