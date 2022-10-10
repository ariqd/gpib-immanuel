<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tambah User
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="bg-red-200 overflow-hidden shadow-sm sm:rounded-lg p-4 mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 p-4">
                    <form action="{{ route('admin.users.store') }}" autocomplete="off" method="POST">
                        @csrf

                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="text" id="name" name="name"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Nama" required>
                        </div>

                        <div class="mb-6">
                            <label for="new_email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="new_email" id="new_email" autocomplete="nope" aria-autocomplete="none"
                                role="presentation" name="email"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Email" required>
                        </div>

                        <div class="mb-6">
                            <label for="new_password"
                                class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="new_password" id="new_password" autocomplete="new_password"
                                aria-autocomplete="none" name="password"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Password" required>
                        </div>

                        <div class="mb-6">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="role" id="role">
                                <option value="1">Admin</option>
                                <option value="2" selected>Jemaat</option>
                                <option value="3">Simpatisan</option>
                            </select>
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
