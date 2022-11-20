<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ @$news ? 'Edit' : 'Tambah' }} Berita
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 p-4">
                    <form action="{{ @$news ? route('admin.news.update', @$news->id) : route('admin.news.store') }}"
                        autocomplete="off" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ @$news ? method_field('PUT') : '' }}

                        <div class="mb-6">
                            <div class="mb-3 w-96">
                                <label for="formFile_image"
                                    class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>
                                @if (@$news)
                                    <img src="{{ asset('uploads/news/image/' . @$news->news_image) }}"
                                        alt="{{ @$news->news_title }}" />
                                    <label for="formFile_image"
                                        class="block mt-4 mb-2 text-sm font-medium text-gray-900">{{ @$news ? 'Ganti' : '' }}
                                        Gambar
                                    </label>
                                @endif
                                <input name="news_image"
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

                        <div class="mb-6">
                            <label for="news_title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                            <input type="text" id="news_title" name="news_title"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Judul" required
                                value="{{ @$news ? @$news->news_title : old('news_title') }}">
                        </div>

                        <div class="mb-6">
                            <label for="news_content" class="block mb-2 text-sm font-medium text-gray-900">Isi</label>
                            <textarea id="news_content" name="news_content" rows="6"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Isi" required>{{ @$news ? @$news->news_content : old('news_content') }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Jenis</label>
                            <div class="flex items-center mb-4">
                                <input {{ @$news->news_type == 'Tata Ibadah' ? 'checked' : '' }} id="type-1"
                                    type="radio" value="Tata Ibadah" name="news_type"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="type-1" class="ml-2 text-sm font-medium text-gray-900">
                                    Tata Ibadah
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input {{ @$news->news_type == 'Warta' ? 'checked' : '' }} id="type-2" type="radio"
                                    value="Warta" name="news_type"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="type-2" class="ml-2 text-sm font-medium text-gray-900">
                                    Warta
                                </label>
                            </div>
                        </div>

                        <div class="mb-6">
                            <div class="mb-3 w-96">
                                <label for="formFile_pdf" class="block mb-2 text-sm font-medium text-gray-900">
                                    File PDF
                                </label>
                                @if (@$news)
                                    <p>{{ @$news->news_file }}</p>
                                    <label for="formFile_pdf" class="block mt-4 mb-2 text-sm font-medium text-gray-900">
                                        {{ @$news ? 'Ganti' : '' }} File PDF
                                    </label>
                                @endif
                                <input name="news_file"
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
                                    type="file" id="formFile_pdf">
                            </div>
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
