<x-navbar-admin>
    <!-- resources/views/cuti/index.blade.php -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2>Data Karyawan</h2>
            <a href="{{ route('admin.karyawan.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>No HP</th>
                        <th>Email User</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nik }}</td>
                            <td>{{ $k->name }}</td>
                            <td>{{ $k->jabatan }}</td>
                            <td>{{ $k->no_hp }}</td>
                            <td>{{ $k->user->email ?? 'Email tidak tersedia' }}</td>
                            <td>{{ $k->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                            <td>
                                <a href="{{ route('admin.karyawan.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.karyawan.destroy', $k->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-navbar-admin>
