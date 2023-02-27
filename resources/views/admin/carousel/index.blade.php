<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tata Ibadah & Warta') }}
            </h2>
            <a type="button" href="{{ route('admin.carousel.create') }}"
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
                                        Gambar
                                    </th>
                                    <th scope="col" class="py-4 px-6">
                                        Tanggal Dibuat
                                    </th>
                                    <th scope="col" class="py-4 px-6">
                                        Tanggal Diperbarui
                                    </th>
                                    <th scope="col" class="py-4 px-6">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousel as $image)
                                    <tr class="bg-white border-b">
                                        <td scope="col" class="py-4 px-6 d-flex align-items-center">
                                            <img src="{{ asset('uploads/carousel/image/' . @$image->carousel_image) }}"
                                                width="200" />
                                        </td>
                                        <td scope="col" class="py-4 px-6 text-center">{{ $image->created_at }}</td>
                                        <td scope="col" class="py-4 px-6 text-center">{{ $image->updated_at }}</td>
                                        <td scope="col">
                                            <a type="button" href="{{ route('admin.carousel.edit', $image->id) }}"
                                                class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.carousel.destroy', $image->id) }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button
                                                    id="btnDelete"class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none delete-user">Hapus</button>
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
    </div>

    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            $('.delete-user').click(function(e) {
                e.preventDefault() // Don't post the form, unless confirmed
                if (confirm('Apa anda yakin akan menghapus gambar?')) {
                    // Post the form
                    $(e.target).closest('form').submit() // Post the surrounding form
                }
            });
        </script>
    </x-slot>
</x-app-layout>
