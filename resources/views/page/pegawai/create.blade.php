<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full text-center text-xl">
                                FORM INPUT PEGAWAI
                            </div>
                        </div>
                    </div>
                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('pegawai.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">NIP
                                    </label>
                                    <input type="text" id="nip" name="nip"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan NIP (10 digit)" pattern="\d{10}" maxlength="10" required
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)">
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        Lengkap</label>
                                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                                        :value="old('nama')" required autocomplete="name" 
                                        placeholder="Masukkan nama lengkap" />
                                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                </div>
                                {{-- <div class="mb-5 w-full">
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        Pegawai</label>
                                    <input type="text" id="nama" name="nama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan nama pegawai disini..." required>
                                </div> --}}
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="mb-5 w-full relative">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" required />

                                    <button type="button" onclick="togglePassword()"
                                        class="absolute right-3 top-9 text-gray-600 focus:outline-none">
                                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <input type="hidden" name="role" value="Karyawan">
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_jabatan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="id_jabatan" id="id_jabatan" placeholder="Pilih Jabatan">
                                        <option value="" disabled selected required>Pilih...</option>
                                        @foreach ($jabatan as $k)
                                            <option value="{{ $k->id }}">{{ $k->level }} -
                                                {{ $k->departemen->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Kelamin</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option value="" disabled selected>Pilih...</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                        HP</label>
                                    <input name="no_hp" id="no_hp" type="tel" minlength="12"
                                        maxlength="15" pattern="\d{12,15}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan nomor hp..." required>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="base-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                        Pegawai</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="status_pegawai" id="status_pegawai" required>
                                        <option value="" disabled selected>Pilih...</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Cuti">Cuti</option>
                                        <option value="Non-aktif">Non-aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <input name="alamat" type="text" id="alamat"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan Alamat..." required>
                                </div>
                            </div>
                            <div class="text-right mt-5">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function togglePassword() {
        const password = document.getElementById("password");
        const icon = document.getElementById("eyeIcon");

        if (password.type === "password") {
            password.type = "text";
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.969 9.969 0 012.042-3.368m1.527-1.527A9.969 9.969 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.969 9.969 0 01-1.565 2.635M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18" />
            `;
        } else {
            password.type = "password";
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
            `;
        }
    }
</script>
