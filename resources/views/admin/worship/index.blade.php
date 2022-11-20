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
                                    <th scope="col" class="py-4 px-6">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="py-4 px-6">
                                        Waktu
                                    </th>
                                    <th scope="col" class="py-4 px-6">
                                        Kursi Terisi
                                    </th>
                                    <th scope="col" class="py-4 px-6">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($worships as $worship)
                                    @php($worship_date = \Carbon\Carbon::parse($worship->worship_date))
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
                                        <th scope="row" class="py-4 px-6">
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
