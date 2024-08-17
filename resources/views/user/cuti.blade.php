<x-app-layout>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h1 class="text-3xl font-bold">Data Pengajuan Cuti</h1>

                <div class="mt-4">
        

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                           
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nama Cuti</th>
                                <th class="px-4 py-2">Nama Karyawan</th>
                                <th class="px-4 py-2">Tanggal Mulai</th>
                                <th class="px-4 py-2">Tanggal Selesai</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuti as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $item->jenisCuti->nama_jenis_cuti }}</td>
                                    <td class="border px-4 py-2">{{ $item->karyawan->name }}</td>
                                    <td class="border px-4 py-2">{{ $item->tanggal_mulai }}</td>
                                    <td class="border px-4 py-2">{{ $item->tanggal_selesai }}</td>
                                    <td class="border px-4 py-2">{{ $item->Cuti->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>