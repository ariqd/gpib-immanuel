<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $worship->worship_name . ' - ' . $worship_date->isoFormat('dddd, D MMMM Y') . ' pukul ' . date('G:i', strtotime($worship->worship_time)) }}
            </h2>
            <a type="button" href="{{ route('admin.worships.index') }}"
                class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between">
                <div class="container mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white border-b border-gray-200 py-8">
                            <div class="text-center">
                                <div class="text-4xl">{{ count($man) }}</div>
                                <div>Jemaat Pria</div>
                            </div>

                            <table class="w-full text-sm text-gray-500 mt-8">
                                <tbody>
                                    @foreach ($man as $booking)
                                        <tr class="bg-white border-b {{ $loop->iteration ? 'border-t' : '' }}">
                                            <td scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $booking->booking_name }}
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                {{ $booking->booking_church }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white border-b border-gray-200 py-8">
                            <div class="text-center">
                                <div class="text-4xl">{{ count($woman) }}</div>
                                <div>Jemaat Wanita</div>
                            </div>

                            <table class="w-full text-sm text-gray-500 mt-8">
                                <tbody>
                                    @foreach ($woman as $booking)
                                        <tr class="bg-white border-b {{ $loop->iteration ? 'border-t' : '' }}">
                                            <td scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $booking->booking_name }}
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                {{ $booking->booking_church }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
