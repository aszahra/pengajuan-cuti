<!DOCTYPE html>
<html>
<head>
    <title>Surat Pengajuan Cuti</title>
    <style>
        body { 
            font-family: 'Times New Roman', Times, serif; 
            padding: 20px; 
            margin-top: 0;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
        }
        td, th { 
            padding: 5px; 
            font-size: 12px;
        }
        .kop { 
            text-align: center; 
            border-bottom: 2px solid black; 
            padding-bottom: 10px; 
            margin-bottom: 20px;
        }
        .tanda-tangan { 
            margin-top: 40px; 
            text-align: right; 
        }
        p {
            margin: 5px 0;
            font-size: 12px;
        }
        .header-section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="kop">
        <h3>PT. AISYAH SITI ZAHRA</h3>
        <p>Jl. Jalan Ke Taman Mini, Provinsi Cakep</p>
        <p>Telepon: (021) 12345678 | Email: asz@zahra.com</p>
    </div>

    <p style="text-align: right;">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>

    <p>Kepada Yth:</p>
    <p>HRD PT. AISYAH SITI ZAHRA<br>di Tempat</p>

    <p>Dengan hormat,</p>

    <p>Saya yang bertanda tangan di bawah ini:</p>
    <div class="header-section">
        <table>
            <tr>
                <td style="width: 200px;">Nama</td>
                <td>: {{ $data->pegawai->nama }}</td>
            </tr>
            <tr>
                <td style="width: 200px;">Jabatan</td>
                <td>: {{ $data->pegawai->jabatan->departemen->nama }} - {{ $data->pegawai->jabatan->level }}</td>
            </tr>
            <tr>
                <td>Tanggal Pengajuan</td>
                <td>: {{ \Carbon\Carbon::parse($data->tanggal_pengajuan)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: {{ $data->status }}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>: {{ $data->keterangan }}</td>
            </tr>
            <tr>
                <td>Jenis Cuti</td>
                <td>: {{ $data->cuti->nama ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <p>Dengan ini mengajukan cuti dengan rincian sebagai berikut:</p>

    <table border="1">
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Tanggal Mulai</th>
                <th style="text-align: center;">Tanggal Selesai</th>
                <th style="text-align: center;">Jumlah Hari</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalHari = 0;
            @endphp
            @foreach($data->detail_pengajuan_cuti as $i => $detail)
                @php
                    $tanggalMulai = \Carbon\Carbon::parse($detail->tanggal_mulai);
                    $tanggalSelesai = \Carbon\Carbon::parse($detail->tanggal_selesai);
                    $jumlahHari = $tanggalMulai->diffInDays($tanggalSelesai) + 1; 
                    $totalHari += $jumlahHari; 
                @endphp
                <tr>
                    <td style="text-align: center;">{{ $i + 1 }}</td>
                    <td style="text-align: center;">{{ $tanggalMulai->translatedFormat('d F Y') }}</td>
                    <td style="text-align: center;">{{ $tanggalSelesai->translatedFormat('d F Y') }}</td>
                    <td style="text-align: center;">{{ $jumlahHari }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total Jumlah Hari Cuti: {{ $totalHari }} Hari</strong></p>

    <p>Demikian surat pengajuan ini saya sampaikan. Besar harapan saya agar permohonan ini dapat dikabulkan. Atas perhatian dan kebijaksanaan Bapak/Ibu, saya ucapkan terima kasih.</p>

    <!-- TANDA TANGAN -->
    <div class="tanda-tangan">
        <p>Hormat saya,</p>
        <br><br><br>
        <p><strong>{{ $data->pegawai->nama }}</strong></p>
    </div>

</body>
</html>
