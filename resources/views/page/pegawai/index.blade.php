<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PEGAWAI') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div>DATA PEGAWAI</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                    {{-- FORM ADD PEGAWAI --}}
                    <div class="w-1/2 bg-gray-100 p-4 rounded-xl">
                        <div class="mb-5">
                            INPUT DATA PEGAWAI
                        </div>
                        <form action="{{ route('pegawai.store') }}" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                                <input name="nip" type="number" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan nomor induk pegawai..">
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Pegawai</label>
                                <input name="nama" type="text" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan nama pegawai...">
                            </div>
                            <div class="mb-5">
                                <label for="id_jabatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="id_jabatan" placeholder="Pilih Jabatan">
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
                                    name="jenis_kelamin">
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
                                    value="{{ date('Y-m-d') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                    HP</label>
                                <input name="no_hp" type="number" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan nomor hp...">
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input name="alamat" type="text" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Alamat...">
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                    Pegawai</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="status_pegawai">
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Cuti">Cuti</option>
                                    <option value="Non-aktif">Non-aktif</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SIMPAN</button>
                        </form>
                    </div>
                    {{-- TABLE PEGAWAI --}}
                    <div class="w-1/2">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                                    data-modal-target="sourceModal" data-nip="{{ $k->nip }}" data-nama="{{ $k->nama }}"
                                                    data-id_jabatan="{{ $k->id_jabatan }}"
                                                    data-jenis_kelamin="{{ $k->jenis_kelamin }}"
                                                    data-tanggal_lahir="{{ $k->tanggal_lahir }}"
                                                    data-no_hp="{{ $k->no_hp }}"
                                                    data-alamat="{{ $k->alamat }}"
                                                    data-status_pegawai="{{ $k->status_pegawai }}"
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
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
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
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">NIP
                                </label>
                            <input type="text" id="nip" name="nip"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan jumlah cuti disini...">
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Pegawai</label>
                            <input type="text" id="nama" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan jumlah cuti disini...">
                        </div>
                        <div class="">
                            <label for="id_jabatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                name="id_jabatan" id="id_jabatan" placeholder="Pilih Jabatan">
                                <option value="" disabled selected>Pilih...</option>
                                @foreach ($jabatan as $k)
                                    <option value="{{ $k->id }}">{{ $k->level }} -
                                        {{ $k->departemen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                name="jenis_kelamin" id="jenis_kelamin">
                                <option value="" disabled selected>Pilih...</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ date('Y-m-d') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                HP</label>
                            <input name="no_hp" id="no_hp" type="number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan nomor hp...">
                        </div>
                        <div class="">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input name="alamat" type="text" id="alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alamat...">
                        </div>
                        <div class="">
                            <label for="base-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Pegawai</label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                name="status_pegawai" id="status_pegawai">
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

        let url = "{{ route('pegawai.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE PEGAWAI ${nama}`;

        // Mengisi nilai input teks
        document.getElementById('nip').value = nip;
        document.getElementById('nama').value = nama;
        document.getElementById('tanggal_lahir').value = tanggal_lahir;
        document.getElementById('alamat').value = alamat;
        document.getElementById('no_hp').value = no_hp;

        // Mengisi nilai select dan memperbarui select2
        const jabatanSelect = document.getElementById('id_jabatan');
        const jenisKelaminSelect = document.getElementById('jenis_kelamin');
        const statusPegawaiSelect = document.getElementById('status_pegawai');

        jabatanSelect.value = id_jabatan;
        $(jabatanSelect).trigger('change'); // Perbarui select2

        jenisKelaminSelect.value = jenis_kelamin;
        $(jenisKelaminSelect).trigger('change'); // Perbarui select2

        console.log("Status Pegawai:", status_pegawai); // Debugging
        statusPegawaiSelect.value = status_pegawai;
        $(statusPegawaiSelect).trigger('change'); // Perbarui select2

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);

        // Menambahkan CSRF token
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        // Menambahkan method PATCH
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
        let tanya = confirm(`Apakah anda yakin untuk menghapus Pegawai ${nama} ?`);
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

{{-- <script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const nama = button.dataset.nama;
        const id_jabatan = button.dataset.id_jabatan; // Jabatan dari dataset
        const jenis_kelamin = button.dataset.jenis_kelamin; // Jenis Kelamin dari dataset
        const tanggal_lahir = button.dataset.tanggal_lahir;
        const no_hp = button.dataset.no_hp;
        const alamat = button.dataset.alamat;
        const status_pegawai = button.dataset.status_pegawai; // Status Pegawai dari dataset
        let url = "{{ route('pegawai.update', ':id') }}".replace(':id', id);
        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE PEGAWAI ${nama}`;
        // Set nilai input biasa
        document.getElementById('id').value = id;
        document.getElementById('nama').value = nama;
        document.getElementById('tanggal_lahir').value = tanggal_lahir;
        document.getElementById('no_hp').value = no_hp;
        document.getElementById('alamat').value = alamat;
        // Fungsi untuk memilih opsi pada <select>
        const setSelectValue = (selectId, value) => {
            const selectElement = document.getElementById(selectId);
            if (selectElement) {
                // Reset semua opsi
                Array.from(selectElement.options).forEach(option => {
                    option.selected = false;
                });
                // Cari dan pilih opsi yang sesuai
                const selectedOption = Array.from(selectElement.options).find(option => option.value === value);
                if (selectedOption) {
                    selectedOption.selected = true;
                }
                // Debugging: Periksa apakah nilai ditemukan
                console.log(`Selected Option for ${selectId}:`, selectedOption);
                // Perbarui Select2 jika digunakan
                $(selectElement).val(value).trigger('change');
            }
        };
        // Set nilai untuk elemen <select>
        setSelectValue('id_jabatan', id_jabatan); // Jabatan
        setSelectValue('jenis_kelamin', jenis_kelamin); // Jenis Kelamin
        setSelectValue('status_pegawai', status_pegawai); // Status Pegawai
        // Update atribut form
        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        // Tambahkan CSRF token
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);
        // Tambahkan method PATCH
        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);
        // Toggle modal visibility
        status.classList.toggle('hidden');
    };

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const pegawaiDelete = async (id, nama) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus Pegawai ${nama} ?`);
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
</script> --}}
