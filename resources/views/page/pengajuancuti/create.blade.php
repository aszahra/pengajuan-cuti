<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengajuan Cuti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full text-center text-xl">
                                FORM INPUT PENGAJUAN CUTI
                            </div>
                        </div>
                    </div>
                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('pengajuancuti.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_pegawai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Pegawai</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="id_pegawai" placeholder="Pilih Pegawai" required>
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($pegawai as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_cuti"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Cuti</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="id_cuti" placeholder="Pilih Jenis Cuti" required>
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($cuti as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="tanggal_mulai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Mulai</label>
                                    <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="tanggal_selesai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Selesai</label>
                                    <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="jumlah"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                        Cuti</label>
                                    <input type="number" id="jumlah" name="jumlah" readonly
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                    </label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        id="status" name="status" data-placeholder="Pilih Status">
                                        <option value="">Pilih...</option>
                                        <option value="Disetujui" disabled>Disetujui</option>
                                        <option value="Menunggu" selected>Menunggu</option>
                                        <option value="Ditolak" disabled>Ditolak</option>
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="keterangan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                    <input type="text" id="keterangan" name="keterangan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const tanggalMulai = document.getElementById('tanggal_mulai');
        const tanggalSelesai = document.getElementById('tanggal_selesai');
        const jumlahCuti = document.getElementById('jumlah');

        tanggalMulai.addEventListener('change', function() {
            tanggalSelesai.min = this.value;
            if (tanggalSelesai.value < this.value) {
                tanggalSelesai.value = this.value;
            }
            hitungJumlahCuti();
        });

        tanggalSelesai.addEventListener('change', function() {
            if (this.value < tanggalMulai.value) {
                alert("Tanggal selesai tidak boleh sebelum tanggal mulai!");
                this.value = tanggalMulai.value;
            }
            hitungJumlahCuti();
        });

        function hitungJumlahCuti() {
            if (tanggalMulai.value && tanggalSelesai.value) {
                const start = new Date(tanggalMulai.value);
                const end = new Date(tanggalSelesai.value);
                const timeDiff = end - start;
                const daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) + 1;
                jumlahCuti.value = daysDiff > 0 ? daysDiff : 0;
            }
        }

        window.addEventListener('DOMContentLoaded', function() {
            tanggalSelesai.min = tanggalMulai.value;
            hitungJumlahCuti();
        });
    </script>


</x-app-layout>
