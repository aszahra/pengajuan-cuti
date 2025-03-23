<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Pegawai') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Section: Statistik Pengajuan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <h3 class="text-lg font-bold">Total Pengajuan</h3>
                    <p id="totalRequests" class="text-2xl font-semibold text-blue-600 pt-3">0</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <h3 class="text-lg font-bold">Cuti Disetujui</h3>
                    <p id="approvedCount" class="text-2xl font-semibold text-green-600 pt-3">0</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <h3 class="text-lg font-bold">Cuti Ditolak</h3>
                    <p id="rejectedCount" class="text-2xl font-semibold text-red-600 pt-3">0</p>
                </div>
            </div>
            <!-- Section: Daftar Pengajuan Terbaru -->
            <div class="mt-6">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <table id="leaveRequestsTable" class="min-w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3 text-left">No</th>
                                <th class="border p-3 text-left">Tanggal Mulai</th>
                                <th class="border p-3 text-left">Tanggal Selesai</th>
                                <th class="border p-3 text-left">Jenis Cuti</th>
                                <th class="border p-3 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Data pengajuan akan dimuat di sini -->
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div id="pagination" class="mt-4 flex justify-center space-x-2">
                    <!-- Tombol pagination akan ditambahkan secara dinamis -->
                </div>
            </div>
        </div>
    </div>
    <!-- Script untuk interaksi -->
    <script>
        // Data dummy untuk tabel (contoh data pengajuan pegawai)
        const leaveRequests = [
            { id: 1, startDate: '2025-03-01', endDate: '2025-03-05', leaveType: 'Cuti Tahunan', status: 'pending' },
            { id: 2, startDate: '2025-03-02', endDate: '2025-03-06', leaveType: 'Cuti Sakit', status: 'approved' },
            { id: 3, startDate: '2025-03-03', endDate: '2025-03-07', leaveType: 'Cuti Besar', status: 'rejected' },
            { id: 4, startDate: '2025-03-04', endDate: '2025-03-08', leaveType: 'Cuti Menikah', status: 'pending' },
            { id: 5, startDate: '2025-03-05', endDate: '2025-03-09', leaveType: 'Cuti Studi', status: 'pending' }
        ];
        let currentPage = 1;
        const rowsPerPage = 5;

        // Render data ke tabel
        function renderTable(data) {
            const tableBody = document.getElementById('tableBody');
            tableBody.innerHTML = ''; // Kosongkan tabel sebelum render
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedData = data.slice(start, end);
            paginatedData.forEach((request, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="border p-3">${start + index + 1}</td>
                    <td class="border p-3">${request.startDate}</td>
                    <td class="border p-3">${request.endDate}</td>
                    <td class="border p-3">${request.leaveType}</td>
                    <td class="border p-3 ${getStatusClass(request.status)}">${getStatusText(request.status)}</td>
                `;
                tableBody.appendChild(row);
            });
            renderPagination(data);
            updateStats(); // Perbarui statistik setelah render tabel
        }

        // Fungsi untuk mendapatkan teks status
        function getStatusText(status) {
            switch (status) {
                case 'pending':
                    return 'Menunggu';
                case 'approved':
                    return 'Disetujui';
                case 'rejected':
                    return 'Ditolak';
                default:
                    return '';
            }
        }

        // Fungsi untuk mendapatkan kelas warna status
        function getStatusClass(status) {
            switch (status) {
                case 'pending':
                    return 'text-yellow-600';
                case 'approved':
                    return 'text-green-600';
                case 'rejected':
                    return 'text-red-600';
                default:
                    return '';
            }
        }

        // Render pagination
        function renderPagination(data) {
            const paginationContainer = document.getElementById('pagination');
            paginationContainer.innerHTML = '';
            const totalPages = Math.ceil(data.length / rowsPerPage);
            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.className =
                    `px-3 py-1 rounded-md ${i === currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800'}`;
                button.onclick = () => {
                    currentPage = i;
                    renderTable(data);
                };
                paginationContainer.appendChild(button);
            }
        }

        // Fungsi untuk memperbarui statistik kartu
        function updateStats() {
            const totalRequests = leaveRequests.length;
            const approvedCount = leaveRequests.filter(req => req.status === 'approved').length;
            const rejectedCount = leaveRequests.filter(req => req.status === 'rejected').length;
            document.getElementById('totalRequests').textContent = totalRequests;
            document.getElementById('approvedCount').textContent = approvedCount;
            document.getElementById('rejectedCount').textContent = rejectedCount;
        }

        // Render tabel saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            renderTable(leaveRequests);
        });
    </script>
</x-app-layout>