<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ @$carousel ? 'Edit' : 'Tambah' }} Gambar
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 p-4">
                    <form action="{{ @$carousel ? route('admin.carousel.update', @$carousel->id) : route('admin.carousel.store') }}"
                        autocomplete="off" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ @$carousel ? method_field('PUT') : '' }}

                        <div class="mb-6">
                            <div class="mb-3 w-96">
                                <label for="formFile_image"
                                    class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                @if (@$carousel)
                                    <img src="{{ asset('uploads/carousel/image/' . @$carousel->carousel_image) }}"
                                        alt="{{ @$carousel->carousel_title }}" />
                                    <label for="formFile_image"
                                        class="block mt-4 mb-2 text-sm font-medium text-gray-900">{{ @$carousel ? 'Ganti' : '' }}
                                        Gambar
                                    </label>
                                @endif
                                <input name="carousel_image"
                                    class="form-control
                                  block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    type="file" id="formFile_image">
                            </div>
                        </div>

                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                            Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
