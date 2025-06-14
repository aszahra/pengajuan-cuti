<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PEGAWAI') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('message_insert'))
                <div class="flex justify-end p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Success</span>
                    <div>
                        <span class="font-medium">Sukses!</span> {{ session('message_insert') }}
                    </div>
                </div>
            @endif

            @if (session('message_update'))
                <div class="flex justify-end p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                    role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Success</span>
                    <div>
                        <span class="font-medium">Sukses!</span> {{ session('message_update') }}
                    </div>
                </div>
            @endif

            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between"> --}}

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                <div class="flex items-center justify-between font-bold">
                    <div class="">
                        DAFTAR PEGAWAI
                    </div>
                    <div>
                        <a href="{{ route('pegawai.create') }}"
                            class="bg-blue-700 p-1 text-white rounded-xl px-4 hover:bg-sky-400">Tambah Data</a>
                    </div>
                </div>
                {{-- <div class="p-4">
                    <div>DATA PEGAWAI</div>
                </div> --}}
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                    {{-- FORM ADD PEGAWAI --}}
                    {{-- <div class="w-1/2 bg-gray-100 p-4 rounded-xl">
                        <div class="mb-5">
                            INPUT DATA PEGAWAI
                        </div>
                        <form action="{{ route('pegawai.store') }}" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="nip"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                                <input name="nip" type="text" id="nip"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukkan 10 digit NIP" pattern="\d{10}" maxlength="10" required
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)">
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Pegawai</label>
                                <input name="nama" type="text" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan nama pegawai..." required>
                            </div>
                            <div class="mb-5">
                                <label for="id_jabatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="id_jabatan" placeholder="Pilih Jabatan" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    @foreach ($jabatan as $k)
                                        <option value="{{ $k->id }}">
                                            {{ $k->departemen->nama }} - {{ $k->level }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="jenis_kelamin" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                </select>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="tanggal_lahir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                    HP</label>
                                <input name="no_hp" type="tel" id="base-input" minlength="12" maxlength="15"
                                    pattern="\d{12,15}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan nomor hp..." required>
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input name="alamat" type="text" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Alamat..." required>
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                    Pegawai</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="status_pegawai" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Cuti">Cuti</option>
                                    <option value="Non-aktif">Non-aktif</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SIMPAN</button>
                        </form>
                    </div> --}}
                    {{-- TABLE PEGAWAI --}}
                    <div class="">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NIP
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NAMA PEGAWAI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            JABATAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            JENIS KELAMIN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL LAHIR
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NO HP
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ALAMAT
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            STATUS PEGAWAI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pegawai as $key => $k)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $pegawai->perPage() * ($pegawai->currentPage() - 1) + $key + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $k->nip }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->jabatan->departemen->nama }} - {{ $k->jabatan->level }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->jenis_kelamin }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->tanggal_lahir }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->no_hp }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->alamat }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->status_pegawai }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" data-id="{{ $k->id }}"
                                                    data-modal-target="sourceModal" data-nip="{{ $k->nip }}"
                                                    data-nama="{{ $k->nama }}"
                                                    data-id_jabatan="{{ $k->id_jabatan }}"
                                                    data-jenis_kelamin="{{ $k->jenis_kelamin }}"
                                                    data-tanggal_lahir="{{ $k->tanggal_lahir }}"
                                                    data-no_hp="{{ $k->no_hp }}" data-alamat="{{ $k->alamat }}"
                                                    data-status_pegawai="{{ $k->status_pegawai }}"
                                                    data-email="{{ $k->user->email ?? '' }}"
                                                    onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                    </svg>
                                                </button>
                                                <button
                                                    onclick="return pegawaiDelete('{{ $k->id }}','{{ $k->nama }}')"
                                                    class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash3-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $pegawai->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal"> --}}
    <<div class="fixed inset-0 z-50 overflow-y-auto hidden" id="sourceModal">
        <div class="flex items-start justify-center min-h-screen pt-20 px-4">
            <div class="fixed inset-0 bg-black opacity-50"></div>
            <div class="relative w-full flex justify-center">
                <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                            Update Sumber Database
                        </h3>
                        <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                            data-modal-hide="defaultModal">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form method="POST" id="formSourceModal">
                        @csrf
                        <div class="flex flex-col  p-4 space-y-6">
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
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        Pegawai</label>
                                    <input type="text" id="nama" name="nama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan jumlah cuti disini..." required>
                                </div>
                            </div>

                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                    <input type="email" id="email" name="email" readonly
                                        class="bg-gray-100 cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Email tidak dapat diubah">
                                </div>
                                <div class="mb-5 w-full relative">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="bg-gray-100 cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Password tidak dapat diubah">
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
                                </div>
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
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                        HP</label>
                                    <input name="no_hp" id="no_hp" type="tel" minlength="12"
                                        maxlength="15" pattern="\d{12,15}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan nomor hp..." required>
                                </div>
                            </div>

                            <div class="">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input name="alamat" type="text" id="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Alamat..." required>
                            </div>
                            <div class="">
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
                        <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                            <button type="submit" id="formSourceButton"
                                class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                            <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                                class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>

<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const nip = button.dataset.nip;
        const nama = button.dataset.nama;
        const id_jabatan = button.dataset.id_jabatan;
        const jenis_kelamin = button.dataset.jenis_kelamin;
        const tanggal_lahir = button.dataset.tanggal_lahir;
        const no_hp = button.dataset.no_hp;
        const alamat = button.dataset.alamat;
        const status_pegawai = button.dataset.status_pegawai;
        const email = button.dataset.email;
        document.getElementById('email').value = email;

        document.getElementById('password').value = '';



        let url = "{{ route('pegawai.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update Pegawai ${nama}?`;

        document.getElementById('nip').value = nip;
        document.getElementById('nama').value = nama;
        document.getElementById('tanggal_lahir').value = tanggal_lahir;
        document.getElementById('alamat').value = alamat;
        document.getElementById('no_hp').value = no_hp;

        const jabatanSelect = document.getElementById('id_jabatan');
        const jenisKelaminSelect = document.getElementById('jenis_kelamin');
        const statusPegawaiSelect = document.getElementById('status_pegawai');

        jabatanSelect.value = id_jabatan;
        $(jabatanSelect).trigger('change');

        jenisKelaminSelect.value = jenis_kelamin;
        $(jenisKelaminSelect).trigger('change');

        console.log("Status Pegawai:", status_pegawai);
        statusPegawaiSelect.value = status_pegawai;
        $(statusPegawaiSelect).trigger('change');

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);

        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }
    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const pegawaiDelete = async (id, nama) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus Pegawai ${nama}?`);
        if (tanya) {
            try {
                const response = await axios.post(`/pegawai/${id}`, {
                    '_method': 'DELETE',
                    '_token': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                });
                if (response.status === 200) {
                    alert('Pegawai berhasil dihapus');
                    location.reload();
                } else {
                    alert('Gagal menghapus pegawai. Silakan coba lagi.');
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan saat menghapus pegawai. Silakan cek konsol untuk detail.');
            }
        }
    };
</script>

<script>
    setTimeout(() => {
        const alert = document.querySelector('[role="alert"]');
        if (alert) {
            alert.remove();
        }
    }, 3000);
</script>

<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const nipInput = this.querySelector('input[name="nip"]');
            if (nipInput && nipInput.value.length !== 10) {
                e.preventDefault();
                alert('NIP harus terdiri dari tepat 10 digit angka.');
                nipInput.focus();
                return false;
            }
            return true;
        });
    });

    function validateNIP(input) {
        input.value = input.value.replace(/[^0-9]/g, '').slice(0, 10);
    }
</script>

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
