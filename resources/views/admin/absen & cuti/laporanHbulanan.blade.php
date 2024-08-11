<x-navbar-admin>
<div class="content-wrapper ">
    <h1 class="mb-4">Laporan Bulanan Absensi: {{ $laporan['bulan'] }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Ringkasan</h5>
            <p class="card-text">Total Hari Kerja: {{ $laporan['total_hari_kerja'] }} hari</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Absensi Karyawan</h5>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/admin/karyawan/absensi">
                    Laporan Absensi
                </button>
                <div class=" dropdown-content" aria-labelledby="dropdownMenuButton">
                   
                    <a class="btn btn-primary dropdown-item" href="/admin/karyawan/absensi">Absensi</a>
                    <a class="btn btn-primary dropdown-item" href="/admin/absensi/laporan-bulanan">Laporan Bulanan</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Jumlah Kehadiran</th>
                            <th>Jumlah Ketidakhadiran</th>
                            <th>Persentase Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporan['laporan_karyawan'] as $karyawan)
                            <tr>
                                <td>{{ $karyawan['id_karyawan'] }}</td>
                                <td>{{ $karyawan['nama_karyawan'] }}</td>
                                <td>{{ $karyawan['jumlah_kehadiran'] }}</td>
                                <td>{{ $karyawan['jumlah_ketidakhadiran'] }}</td>
                                <td>{{ number_format($karyawan['persentase_kehadiran'], 2) }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div></x-navbar-admin>