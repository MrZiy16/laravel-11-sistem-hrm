    <x-navbar-admin>
<div class="content-wrapper">
    <h1 class="h3 mb-2 text-gray-800">Daftar Gaji Karyawan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Gaji</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.gaji.gaji.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Gaji
            </a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Jumlah Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gaji as $g)
                            <td>
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $g->karyawan->name }}</td>
                            <td>{{ $g->jabatan }}</td>
                            <td>Rp {{ number_format($g->jumlah_gaji, 0, ',', '.') }}</td>
                            <td>
                                <a href=" {{ route('admin.gaji.edit', $g->id_gaji) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.gaji.destroy', $g->id_gaji) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i> Hapus
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
</div>
</x-navbar-admin>