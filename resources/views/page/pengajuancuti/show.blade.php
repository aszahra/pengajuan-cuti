@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Detail Pengajuan Cuti</h1>

        <div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    {{-- <thead
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
                                ACTION
                            </th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $d)
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                            <tr>
                                <td>Aisyah</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>Zahra</td>
                                <td>21</td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100 text-center">
                                    {{ $no++ }}
                                </th>
                                <td class="px-6 py-4 bg-gray-100">
                                    {{ $d->pegawai->nama }}
                                </td>
                                <td class="px-6 py-4 bg-gray-100 text-center">
                                    {{ $d->tanggal_pengajuan }}
                                </td>
                                <td class="px-6 py-4 bg-gray-100 text-center">
                                    {{ $d->tanggal_mulai }}
                                </td>
                                <td class="px-6 py-4 bg-gray-100 text-center">
                                    {{ $d->tanggal_selesai }}
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

        <div class="flex justify-between">
            <form action="{{ route('pengajuancuti.setujui', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-semibold px-6 py-2 rounded">
                    Setujui
                </button>
            </form>

            <form action="{{ route('pengajuancuti.tolak', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-semibold px-6 py-2 rounded">
                    Tolak
                </button>
            </form>
        </div>
    </div>
@endsection
