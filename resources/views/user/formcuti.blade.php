<x-app-layout>
    <div class="container mx-auto p-6 max-w-lg">
        <h2 class="text-2xl font-semibold mb-6">Pengajuan Cuti</h2>
        <a href="{{ route('user.cuti') }}" class="bg-blue-500 hover:bg-blue-700 text-blue">Riwayat Cuti</a>
        <form action="{{ route('formcuti.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="id_jenis_cuti" class="block text-sm font-medium text-gray-700 mb-1">Jenis Cuti</label>
                <select name="id_jenis_cuti" id="id_jenis_cuti" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($jenisCuti as $item)
                        <option value="{{ $item->id_jenis_cuti }}">{{ $item->nama_jenis_cuti }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Karyawan</label>
                <select name="id_karyawan" id="id_karyawan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                
                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
        
                </select>
            </div>
            <div>
                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>