<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ @$worship ? 'Edit' : 'Tambah' }} Ibadah
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 p-4">
                    <form action="{{ @$worship ? route('admin.worships.update', @$worship->id) : route('admin.worships.store') }}"
                        autocomplete="off" method="POST">
                        @csrf
                        {{ @$worship ? method_field('PUT') : '' }}

                        <div class="mb-6">
                            <label for="worship_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Ibadah</label>
                            <input type="text" id="worship_name" name="worship_name"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Nama Ibadah" required value="{{ @$worship->worship_name }}">
                        </div>

                        <div class="mb-6">
                            <label for="worship_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Ibadah</label>
                            <input type="date" id="worship_date" name="worship_date" min="<?= date('Y-m-d'); ?>"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5"
                                placeholder="Tanggal Ibadah" required value="{{ @$worship->worship_date }}">
                        </div>

                        <div class="mb-6">
                            <label for="worship_time" class="block mb-2 text-sm font-medium text-gray-900">Waktu Ibadah</label>
                            <input type="time" id="worship_time" name="worship_time"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5"
                                placeholder="Waktu Ibadah" required value="{{ @$worship->worship_time }}">
                        </div>

                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
