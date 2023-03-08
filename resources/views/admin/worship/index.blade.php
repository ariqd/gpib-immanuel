<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ibadah') }}
            </h2>
            <a type="button" href="{{ route('admin.worships.create') }}"
                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                Tambah
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-4 px-6">
                                        Nama
                                    </th>
                                    <td scope="col" class="py-4 px-6 font-bold">
                                        Tanggal
                                    </td>
                                    <td scope="col" class="py-4 px-6 font-bold">
                                        Waktu
                                    </td>
                                    <td scope="col" class="py-4 px-6 font-bold">
                                        Tiket Dibeli
                                    </td>
                                    <td scope="col" class="py-4 px-6 font-bold">
                                        Kehadiran
                                    </td>
                                    <td scope="col" class="py-4 px-6 font-bold">

                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($worships as $worship)
                                    @php
                                        $worship_date = \Carbon\Carbon::parse($worship->worship_date);

                                        $bookings = App\Models\Booking::with('user')
                                            ->where('worship_id', $worship->id)
                                            ->get();
                                        $count = 0;

                                        foreach ($bookings as $booking) {
                                            $booking_id = $booking->booking_id;
                                            $seat = $booking->booking_seat;

                                            $doesAttend = App\Models\Attendance::where([['booking_id', '=', $booking_id], ['attendance_seat', '=', $seat]])->count();

                                            if ($doesAttend) {
                                                $count++;
                                            }
                                        }
                                    @endphp
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $worship->worship_name }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $worship_date->isoFormat('dddd, D MMMM Y') }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ date('G:i', strtotime($worship->worship_time)) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $worship->bookings->count() }}/50
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $count }}/{{ $worship->bookings->count() }}
                                        </td>
                                        <th scope="row" class="py-4 px-6">
                                            <a type="button" href="{{ route('admin.worships.show', $worship->id) }}"
                                                class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                                                Detail Kehadiran
                                            </a>
                                            <a type="button" href="{{ route('admin.worships.edit', $worship->id) }}"
                                                class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                                                Edit
                                            </a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
