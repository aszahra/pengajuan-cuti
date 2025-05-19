<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PENGAJUAN CUTI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                DAFTAR PENGAJUAN CUTI
                            </div>
                            <div>
                                <a href="{{ route('pengajuancuti.create') }}"
                                    class="bg-blue-700 p-1 text-white rounded-xl px-4 hover:bg-sky-400">Add</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            @if (session('success'))
                                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NAMA PEGAWAI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL PENGAJUAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL MULAI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL SELESAI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            STATUS
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = $data->firstItem();
                                    @endphp
                                    @foreach ($data as $d)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100 text-center">
                                                {{ $no++ }}
                                            </th>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $d->pegawai->nama }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100 text-center">
                                                {{ \Carbon\Carbon::parse($d->tanggal_pengajuan)->translatedFormat('d F Y') }}
                                                {{-- {{ $d->tanggal_pengajuan }} --}}
                                            </td>

                                            @foreach ($d->detail_pengajuan_cuti as $detail)
                                                <td class="px-6 py-4 bg-gray-100 text-center">
                                                    {{ \Carbon\Carbon::parse($detail->tanggal_mulai)->translatedFormat('d F Y') }}
                                                    {{-- {{ $detail->tanggal_mulai }} --}}
                                                </td>
                                                <td class="px-6 py-4 bg-gray-100 text-center">
                                                    {{ \Carbon\Carbon::parse($detail->tanggal_selesai)->translatedFormat('d F Y') }}
                                                    {{-- {{ $detail->tanggal_selesai }} --}}
                                                </td>
                                            @endforeach

                                            <td class="px-6 py-4 bg-gray-100 text-center">
                                                @if ($d->status == 'Disetujui')
                                                    <span
                                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full">{{ $d->status }}</span>
                                                @elseif ($d->status == 'Ditolak')
                                                    <span
                                                        class="bg-red-100 text-red-800 px-3 py-1 rounded-full">{{ $d->status }}</span>
                                                @else
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full">{{ $d->status }}</span>
                                                @endif
                                            </td>

                                            <td class="px-6 py-4 bg-gray-100 text-center flex justify-center gap-2">
                                                <button onclick="showModalDetail({{ $d->id }})"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    Lihat Detail
                                                </button>

                                                @if ($d->status == 'Disetujui')
                                                    <a href="{{ route('pengajuancuti.cetak.satu', $d->id) }}"
                                                        target="_blank"
                                                        class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded-md text-xs text-white">
                                                        Cetak
                                                    </a>
                                                @else
                                                    <button disabled
                                                        class="bg-gray-300 text-gray-600 px-3 py-1 rounded-md text-xs">
                                                        Cetak
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Detail Pengajuan Cuti</h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="flex flex-col p-4 space-y-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Pegawai :
                        </label>
                        <label>
                            {{ $d->pegawai->nama }}
                        </label>
                        <p id="nama" class="text-gray-800 text-sm bg-gray-100 rounded-lg p-2.5"></p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Jenis Cuti :</label>
                        <p id="jenis_cuti" class="text-gray-800 text-sm bg-gray-100 rounded-lg p-2.5"></p>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pengajuan :
                        </label>
                        <p id="tanggal_pengajuan" class="text-gray-800 text-sm bg-gray-100 rounded-lg p-2.5"></p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Mulai :
                        </label>
                        <p id="tanggal_mulai" class="text-gray-800 text-sm bg-gray-100 rounded-lg p-2.5"></p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Selesai :
                        </label>
                        <p id="tanggal_selesai" class="text-gray-800 text-sm bg-gray-100 rounded-lg p-2.5"></p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Status :
                        </label>
                        <p id="status" class="text-gray-800 text-sm bg-gray-100 rounded-lg p-2.5"></p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Keterangan :
                        </label>
                        <p id="keterangan" class="text-gray-800 text-sm bg-gray-100 rounded-lg p-2.5"></p>
                    </div>
                </div>
                <div class="flex p-7">
                    <form action="{{ route('update.status', $d->id) }}" method="POST" class="flex gap-2">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Disetujui" id="statusInput">

                        <button type="submit"
                            class="bg-green-500 hover:bg-green-400 text-white font-semibold px-6 py-2 rounded"
                            onclick="document.getElementById('statusInput').value='Disetujui'; return confirmSetuju();">
                            Setujui
                        </button>

                        <button type="submit"
                            class="bg-red-500 hover:bg-red-400 text-white font-semibold px-6 py-2 rounded"
                            onclick="document.getElementById('statusInput').value='Ditolak'; return confirmTolak();">
                            Tolak
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    function showModalDetail(id) {
        fetch(`/pengajuancuti/${id}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('nama').textContent = data.nama;
                document.getElementById('jenis_cuti').textContent = data.jenis_cuti;
                document.getElementById('tanggal_pengajuan').textContent = data.tanggal_pengajuan;
                document.getElementById('tanggal_mulai').textContent = data.tanggal_mulai;
                document.getElementById('tanggal_selesai').textContent = data.tanggal_selesai;
                document.getElementById('status').textContent = data.status;
                document.getElementById('keterangan').textContent = data.keterangan;
                document.getElementById('sourceModal').classList.remove('hidden');
            });
    }

    function sourceModalClose() {
        document.getElementById('sourceModal').classList.add('hidden');
    }
</script>

<script>
    function confirmSetuju() {
        return confirm("Apakah Anda yakin ingin menyetujui permintaan ini?");
    }

    function confirmTolak() {
        return confirm("Apakah Anda yakin ingin menolak permintaan ini?");
    }
</script>
