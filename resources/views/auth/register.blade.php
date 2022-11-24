<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <h1 class="text-xl">GPIB Immanuel</h1>
            </a>

            <div class="flex justify-center mt-4">
                <h1>Register</h1>
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nama')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="phone" :value="__('No. Handphone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="user_church" :value="__('Asal Gereja')" />

                <x-input id="user_church" class="block mt-1 w-full" type="text" name="user_church" :value="old('user_church')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="birthdate" :value="__('Tanggal Lahir')" />

                <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')"
                    max="{{ date('Y-m-d') }}" required />
            </div>

            <div class="mt-4">
                <x-label for="gender" :value="__('Jenis Kelamin')" />

                <div class="flex mt-2">
                    <div class="flex items-center">
                        <input id="inline-radio" name="gender" type="radio" value="Pria" name="inline-radio-group"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="inline-radio"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pria</label>
                    </div>
                    <div class="flex items-center ml-4">
                        <input id="inline-2-radio" name="gender" type="radio" value="Wanita" name="inline-radio-group"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="inline-2-radio"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wanita</label>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <x-label for="vaccine" :value="__('Vaksin Terakhir')" />
                <div class="flex mt-2">

                    <select id="vaccine" name="vaccine"
                        class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option selected disabled value="">Pilih status vaksin terakhir</option>
                        <option value="Vaksin Booster">Vaksin Booster</option>
                        <option value="Vaksin 2">Vaksin 2</option>
                        <option value="Vaksin 1">Vaksin 1</option>
                        <option value="Belum Vaksin">Belum Vaksin</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-end mt-8">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah terdaftar?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
