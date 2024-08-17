<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Attendance Information</h2>

            <!-- Display success message -->
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display error message -->
            @if (session('error'))
                <div class="alert alert-danger mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Display attendance data -->
            <div class="mb-6">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Employee ID</th>
                            <th class="px-4 py-2 text-left">Date</th>
                            <th class="px-4 py-2 text-left">Check-in Time</th>
                            <th class="px-4 py-2 text-left">Check-out Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensi as $attendance)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $attendance->tanggal }}</td>
                                <td class="border px-4 py-2">{{ $attendance->waktu_masuk }}</td>
                                <td class="border px-4 py-2">{{ $attendance->waktu_pulang ?? '-' }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('updateAbsen')}}" method='POST'>  @csrf
            <button type="submit" class="w-full px-4 py-2 text-lg font-bold text-black bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md">
                update Attendance
            </button></form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Form to submit attendance -->
        <form action="{{ route('absen') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="w-full px-4 py-2 text-lg font-bold text-black bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md">
                Submit Attendance
            </button>
        </form>
    </div>
</x-app-layout>
