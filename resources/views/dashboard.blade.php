<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Pengajuan Cuti') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">

        <!-- Section: Statistik Pengajuan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="text-lg font-bold">Total Pengajuan</h3>
                <p class="text-2xl font-semibold text-blue-600">15</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="text-lg font-bold">Cuti Disetujui</h3>
                <p class="text-2xl font-semibold text-green-600">3</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h3 class="text-lg font-bold">Cuti Ditolak</h3>
                <p class="text-2xl font-semibold text-red-600">4</p>
            </div>
        </div>

        <!-- Section: Daftar Pengajuan Terbaru -->
        <div class="mt-6">
            <h3 class="text-xl font-semibold mb-2">Pengajuan Terbaru</h3>
            <div class="flex space-x-2 mb-4">
                <input type="text" id="searchInput" placeholder="Cari nama..." class="border p-2 rounded-md w-1/3"
                    oninput="filterTable()">
                <select id="statusFilter" class="border p-2 rounded-md" onchange="filterTable()">
                    <option value="">Semua Status</option>
                    <option value="pending">Menunggu</option>
                    <option value="approved">Disetujui</option>
                    <option value="rejected">Ditolak</option>
                </select>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <table id="leaveRequestsTable" class="min-w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th onclick="sortTable(0)" class="border p-3 text-left cursor-pointer">No</th>
                            <th onclick="sortTable(1)" class="border p-3 text-left cursor-pointer">Nama</th>
                            <th onclick="sortTable(2)" class="border p-3 text-left cursor-pointer">Tanggal Mulai</th>
                            <th onclick="sortTable(3)" class="border p-3 text-left cursor-pointer">Tanggal Selesai</th>
                            <th onclick="sortTable(4)" class="border p-3 text-left cursor-pointer">Jenis Cuti</th>
                            <th onclick="sortTable(5)" class="border p-3 text-left cursor-pointer">Status</th>
                            <th class="border p-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data dummy akan dimuat di sini -->
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div id="pagination" class="mt-4 flex justify-center space-x-2">
                <!-- Tombol pagination akan ditambahkan secara dinamis -->
            </div>
        </div>
    </div>

    <!-- Script untuk interaksi -->
    <script>
        // Data dummy untuk tabel
        const leaveRequests = [{
                id: 1,
                name: 'Aceng Ziran Fauji',
                startDate: '2025-03-01',
                endDate: '2025-03-05',
                leaveType: 'Cuti Tahunan',
                status: 'pending'
            },
            {
                id: 2,
                name: 'Aisyah Siti Zahra',
                startDate: '2025-03-02',
                endDate: '2025-03-06',
                leaveType: 'Cuti Sakit',
                status: 'approved'
            },
            {
                id: 3,
                name: 'Andika Herviantino Pratama',
                startDate: '2025-03-03',
                endDate: '2025-03-07',
                leaveType: 'Cuti Besar',
                status: 'rejected'
            },
            {
                id: 4,
                name: 'Arafian Hafiz',
                startDate: '2025-03-04',
                endDate: '2025-03-08',
                leaveType: 'Cuti Menikah',
                status: 'pending'
            },
            {
                id: 5,
                name: 'Dimas Novi Fitriyansyah',
                startDate: '2025-03-05',
                endDate: '2025-03-09',
                leaveType: 'Cuti Studi',
                status: 'pending'
            },
            {
                id: 6,
                name: 'Emil Awaliadi',
                startDate: '2025-03-06',
                endDate: '2025-03-10',
                leaveType: 'Cuti Tahunan',
                status: 'pending'
            },
            {
                id: 7,
                name: 'Fazhari Rizky Rahmathun',
                startDate: '2025-03-07',
                endDate: '2025-03-11',
                leaveType: 'Cuti Besar',
                status: 'rejected'
            },
            {
                id: 8,
                name: 'Kelvin Leonardo',
                startDate: '2025-03-08',
                endDate: '2025-03-12',
                leaveType: 'Cuti Menikah',
                status: 'pending'
            },
            {
                id: 9,
                name: 'Muhamad Ali Akbar Abil Aziz',
                startDate: '2025-03-09',
                endDate: '2025-03-13',
                leaveType: 'Cuti Sakit',
                status: 'approved'
            },
            {
                id: 10,
                name: 'Muhamad Arfan Maulan',
                startDate: '2025-03-10',
                endDate: '2025-03-14',
                leaveType: 'Cuti Tahunan',
                status: 'pending'
            },
            {
                id: 11,
                name: 'Muhamad Irfan Sujono',
                startDate: '2025-03-11',
                endDate: '2025-03-15',
                leaveType: 'Cuti Studi',
                status: 'pending'
            },
            {
                id: 12,
                name: 'Muhammad Farhan Saefulloh',
                startDate: '2025-03-12',
                endDate: '2025-03-16',
                leaveType: 'Cuti Besar',
                status: 'rejected'
            },
            {
                id: 13,
                name: 'Muhammad Rasyid Ridho',
                startDate: '2025-03-13',
                endDate: '2025-03-17',
                leaveType: 'Cuti Menikah',
                status: 'pending'
            },
            {
                id: 14,
                name: 'Puji Haryadi',
                startDate: '2025-03-14',
                endDate: '2025-03-18',
                leaveType: 'Cuti Sakit',
                status: 'pending'
            },
            {
                id: 15,
                name: 'Rian Afrizal',
                startDate: '2025-03-15',
                endDate: '2025-03-19',
                leaveType: 'Cuti Tahunan',
                status: 'approved'
            },
            {
                id: 16,
                name: 'Rizky Al-Ikhsan',
                startDate: '2025-03-16',
                endDate: '2025-03-20',
                leaveType: 'Cuti Besar',
                status: 'rejected'
            },
            {
                id: 17,
                name: 'Sinta Aulia Wardani',
                startDate: '2025-03-17',
                endDate: '2025-03-21',
                leaveType: 'Cuti Menikah',
                status: 'pending'
            },
            {
                id: 18,
                name: 'Tazkia Hidayatuloh Al Mahrom',
                startDate: '2025-03-18',
                endDate: '2025-03-22',
                leaveType: 'Cuti Studi',
                status: 'pending'
            },
            {
                id: 19,
                name: 'Yogi Febriandi',
                startDate: '2025-03-19',
                endDate: '2025-03-23',
                leaveType: 'Cuti Tahunan',
                status: 'pending'
            }
        ];

        let currentPage = 1;
        const rowsPerPage = 10;

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
                    <td class="border p-3">${request.name}</td>
                    <td class="border p-3">${request.startDate}</td>
                    <td class="border p-3">${request.endDate}</td>
                    <td class="border p-3">${request.leaveType}</td>
                    <td class="border p-3 ${getStatusClass(request.status)}">${getStatusText(request.status)}</td>
                    <td class="border p-3">
                        <div class="flex space-x-2">
                            <button 
                                class="bg-green-600 text-white px-2 py-1 rounded-md ${request.status !== 'pending' ? 'opacity-50 cursor-not-allowed' : ''}" 
                                onclick="${request.status === 'pending' ? `confirmAction(${request.id}, 'approve')` : ''}"
                                ${request.status !== 'pending' ? 'disabled' : ''}>
                                Setujui
                            </button>
                            <button 
                                class="bg-red-600 text-white px-2 py-1 rounded-md ${request.status !== 'pending' ? 'opacity-50 cursor-not-allowed' : ''}" 
                                onclick="${request.status === 'pending' ? `confirmAction(${request.id}, 'reject')` : ''}"
                                ${request.status !== 'pending' ? 'disabled' : ''}>
                                Tolak
                            </button>
                        </div>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            renderPagination(data);
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

        // Konfirmasi aksi sebelum menyetujui atau menolak
        function confirmAction(id, action) {
            if (confirm(`Apakah Anda yakin ingin ${action === 'approve' ? 'menyetujui' : 'menolak'} pengajuan ini?`)) {
                if (action === 'approve') {
                    approveRequest(id);
                } else if (action === 'reject') {
                    rejectRequest(id);
                }
            }
        }

        // Aksi setujui pengajuan
        function approveRequest(id) {
            const request = leaveRequests.find(req => req.id === id);
            if (request) {
                request.status = 'approved';
                alert(`Pengajuan cuti oleh ${request.name} berhasil disetujui.`);
                filterTable(); // Perbarui tabel setelah aksi
            }
        }

        // Aksi tolak pengajuan
        function rejectRequest(id) {
            const request = leaveRequests.find(req => req.id === id);
            if (request) {
                request.status = 'rejected';
                alert(`Pengajuan cuti oleh ${request.name} berhasil ditolak.`);
                filterTable(); // Perbarui tabel setelah aksi
            }
        }

        // Filter tabel berdasarkan pencarian dan status
        function filterTable() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;

            const filteredData = leaveRequests.filter(request => {
                const matchesSearch = request.name.toLowerCase().includes(searchValue);
                const matchesStatus = statusFilter === '' || request.status === statusFilter;
                return matchesSearch && matchesStatus;
            });

            currentPage = 1; // Reset ke halaman pertama saat filter diterapkan
            renderTable(filteredData);
        }

        // Sorting tabel
        function sortTable(columnIndex) {
            let sortedData = [...leaveRequests];
            if (columnIndex === 0) {
                sortedData.sort((a, b) => a.id - b.id); // Sort by ID (No)
            } else if (columnIndex === 1) {
                sortedData.sort((a, b) => a.name.localeCompare(b.name)); // Sort by Name
            } else if (columnIndex === 2) {
                sortedData.sort((a, b) => new Date(a.startDate) - new Date(b.startDate)); // Sort by Start Date
            } else if (columnIndex === 3) {
                sortedData.sort((a, b) => new Date(a.endDate) - new Date(b.endDate)); // Sort by End Date
            } else if (columnIndex === 4) {
                sortedData.sort((a, b) => a.leaveType.localeCompare(b.leaveType)); // Sort by Leave Type
            } else if (columnIndex === 5) {
                sortedData.sort((a, b) => a.status.localeCompare(b.status)); // Sort by Status
            }
            renderTable(sortedData);
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

        // Render tabel saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            renderTable(leaveRequests);
        });
    </script>
</x-app-layout>
