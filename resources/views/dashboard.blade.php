<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Pengajuan Cuti') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="text-lg font-bold">Total Pengajuan</h3>
                <p class="text-2xl font-semibold text-blue-600">10</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="text-lg font-bold">Cuti Disetujui</h3>
                <p class="text-2xl font-semibold text-green-600">5</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="text-lg font-bold">Cuti Ditolak</h3>
                <p class="text-2xl font-semibold text-red-600">2</p>
            </div>
        </div>
        
        <div class="mt-6">
            <h3 class="text-xl font-semibold mb-2">Pengajuan Terbaru</h3>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-left">Nama</th>
                            <th class="border p-3 text-left">Tanggal</th>
                            <th class="border p-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-3">John Doe</td>
                            <td class="border p-3">2025-02-17</td>
                            <td class="border p-3 text-yellow-600">Menunggu</td>
                        </tr>
                        <tr>
                            <td class="border p-3">Jane Smith</td>
                            <td class="border p-3">2025-02-16</td>
                            <td class="border p-3 text-green-600">Disetujui</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
