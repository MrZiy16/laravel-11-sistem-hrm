<x-navbar-admin>


    <div class="content-wrapper">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Gaji</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gaji.update', $gaji->id_gaji) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_karyawan">Nama Karyawan</label>
                    <select class="form-control @error('id_karyawan') is-invalid @enderror" id="id_karyawan" name="id_karyawan"  value="{{ old('id_karyawan', $gaji->id_karyawan) }}" >
                        <option value="">Pilih Nama Karyawan</option>
                        @foreach ($karyawan as $k)
                            <option value="{{ $k->id }}" {{ $gaji->id_karyawan == $k->id ? 'selected' : '' }}>{{ $k->name }}</option>
                        @endforeach
                    </select>
                    @error('id_karyawan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan"  value="{{ old('jabatan', $gaji->jabatan) }}">
                        <option value="staff" {{ $gaji->jabatan =='staff'?'selected' : '' }}>Staff</option>
                        <option value="keamanan" {{ $gaji->jabatan == 'keamanan'?'selected' : '' }}>Keamanan</option>
</select>        
                </div>
                <div class="form-group">
                    <label for="jumlah_gaji">Jumlah Gaji</label>
                    <input type="number" class="form-control @error('jumlah_gaji') is-invalid @enderror" id="jumlah_gaji" name="jumlah_gaji" placeholder="Masukkan Jumlah Gaji" value="{{ old('jumlah_gaji', $gaji->jumlah_gaji) }}" required>
                    @error('jumlah_gaji')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.gaji.gaji') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
    
</x-navbar-admin>