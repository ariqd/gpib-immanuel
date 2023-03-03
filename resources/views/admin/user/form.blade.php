<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ @$user ? 'Edit' : 'Tambah' }} User
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 p-4">
                    <form action="{{ @$user ? route('admin.users.update', @$user->id) : route('admin.users.store') }}"
                        autocomplete="off" method="POST">
                        @csrf
                        {{ @$user ? method_field('PUT') : '' }}

                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="text" id="name" name="name"
                                {{ @$user && !@$user->is_created_by_admin ? 'disabled' : '' }}
                                class="bg-{{ @$user && !@$user->is_created_by_admin ? 'gray-300' : 'white' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Nama" required value="{{ @$user->name }}">
                        </div>

                        <div class="mb-6">
                            <label for="new_email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="new_email" id="new_email" autocomplete="nope" aria-autocomplete="none"
                                role="presentation" name="email"
                                {{ @$user && !@$user->is_created_by_admin ? 'disabled' : '' }}
                                class="bg-{{ @$user && !@$user->is_created_by_admin ? 'gray-300' : 'white' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Email" required value="{{ @$user->email }}">
                        </div>

                        @if (!@$user)
                            <div class="mb-6">
                                <label for="new_password"
                                    class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="new_password" id="new_password" autocomplete="new_password"
                                    aria-autocomplete="none" name="password"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Password" required>
                            </div>
                        @endif

                        <div class="mb-6">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select {{ @$user && !@$user->is_created_by_admin ? 'disabled' : '' }}
                                class="bg-{{ @$user && !@$user->is_created_by_admin ? 'gray-300' : 'white' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="role" id="role">
                                <option value="2" {{ @$user && @$user->role_id == 2 ? 'selected' : '' }}>
                                    Jemaat
                                </option>
                                <option value="3" {{ @$user && @$user->role_id == 3 ? 'selected' : '' }}>
                                    Simpatisan
                                </option>
                                <option value="1" {{ @$user && @$user->role_id == 1 ? 'selected' : '' }}>
                                    Admin
                                </option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">No.
                                Handphone</label>
                            <input type="text" id="phone" autocomplete="nope" aria-autocomplete="none"
                                role="presentation" name="user_phone"
                                {{ @$user && !@$user->is_created_by_admin ? 'disabled' : '' }}
                                class="bg-{{ @$user && !@$user->is_created_by_admin ? 'gray-300' : 'white' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="No. Handphone" required value="{{ @$user->user_phone }}">
                        </div>

                        <div class="mb-6">
                            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                Lahir</label>
                            <input type="date" id="birthdate" autocomplete="nope" aria-autocomplete="none"
                                max="{{ date('Y-m-d') }}" role="presentation" name="user_birthdate"
                                {{ @$user && !@$user->is_created_by_admin ? 'disabled' : '' }}
                                class="bg-{{ @$user && !@$user->is_created_by_admin ? 'gray-300' : 'white' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Tanggal Lahir" required value="{{ @$user->user_birthdate }}">
                        </div>

                        <div class="mb-6">
                            <label for="user_church" class="block mb-2 text-sm font-medium text-gray-900">Asal Gereja
                                {{ @$user && !@$user->is_created_by_admin ? '' : '/ Sektor (opsional)' }}</label>
                            <input type="text" id="user_church" autocomplete="nope" aria-autocomplete="none"
                                role="presentation" name="user_church"
                                {{ @$user && !@$user->is_created_by_admin ? 'disabled' : '' }}
                                class="bg-{{ @$user && !@$user->is_created_by_admin ? 'gray-300' : 'white' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Asal Gereja" value="{{ @$user->user_church }}">
                        </div>

                        <div class="mb-6">
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                Kelamin</label>
                            @if (!@$user)
                                <div class="flex items-center mb-4">
                                    <input
                                        {{ @$user->user_gender == 'Pria' ? 'checked' : (@$user->user_gender == 'Wanita' ? 'disabled' : '') }}
                                        id="gender-1" type="radio" value="Pria" name="user_gender"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                    <label for="gender-1" class="ml-2 text-sm font-medium text-gray-900">
                                        Pria
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        {{ @$user->user_gender == 'Wanita' ? 'checked' : (@$user->user_gender == 'Pria' ? 'disabled' : '') }}
                                        id="gender-2" type="radio" value="Wanita" name="user_gender"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                    <label for="gender-2" class="ml-2 text-sm font-medium text-gray-900">
                                        Wanita
                                    </label>
                                </div>
                            @else
                                <p>{{ @$user->user_gender }}</p>
                            @endif
                        </div>

                        <div class="mb-6">
                            <label for="user_vaccine" class="block mb-2 text-sm font-medium text-gray-900">Vaksin
                                Terakhir</label>
                            <select {{ @$user && !@$user->is_created_by_admin ? 'disabled' : '' }}
                                class="bg-{{ @$user && !@$user->is_created_by_admin ? 'gray-300' : 'white' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="user_vaccine" id="user_vaccine">
                                <option value="Vaksin Booster"
                                    {{ @$user && @$user->user_vaccine == 'Vaksin Booster' ? 'selected' : '' }}>
                                    Vaksin Booster
                                </option>
                                <option value="Vaksin 2"
                                    {{ @$user && @$user->user_vaccine == 'Vaksin 2' ? 'selected' : '' }}>
                                    Vaksin 2
                                </option>
                                <option value="Vaksin 1"
                                    {{ @$user && @$user->user_vaccine == 'Vaksin 1' ? 'selected' : '' }}>
                                    Vaksin 1
                                </option>
                                <option value="Belum Vaksin"
                                    {{ @$user && @$user->user_vaccine == 'Belum Vaksin' ? 'selected' : '' }}>
                                    Belum Vaksin
                                </option>
                            </select>
                        </div>

                        @if (@$user && !@$user->is_created_by_admin)
                            <div class="mb-6">
                                <label for="role"
                                    class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                                <div class="flex items-center mb-4">
                                    <input {{ @$user->is_approved ? 'checked' : '' }} id="status-1" type="radio"
                                        value="1" name="status"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                    <label for="status-1" class="ml-2 text-sm font-medium text-gray-900">
                                        Approved
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input {{ !@$user->is_approved ? 'checked' : '' }} id="status-2" type="radio"
                                        value="0" name="status"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                    <label for="status-2" class="ml-2 text-sm font-medium text-gray-900">
                                        Not Approved
                                    </label>
                                </div>
                            </div>
                        @endif

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
