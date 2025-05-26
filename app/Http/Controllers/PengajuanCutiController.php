<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\DetailPengajuanCuti;
use App\Models\Pegawai;
use App\Models\PengajuanCuti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengajuanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PengajuanCuti::with('detail_pengajuan_cuti')->paginate(5);
        // $data = PengajuanCuti::paginate(5);
        $pegawai = Pegawai::all();
        $cuti = Cuti::all();
        return view('page.pengajuancuti.index')->with([
            'data' => $data,
            'pegawai' => $pegawai,
            'cuti' => $cuti,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        $cuti = Cuti::all();
        return view('page.pengajuancuti.create')->with([
            'pegawai' => $pegawai,
            'cuti' => $cuti,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengajuan = PengajuanCuti::create([
            'id_pegawai' => $request->input('id_pegawai'),
            // 'tanggal_pengajuan' => $request->input('tanggal_pengajuan'),
            'status' => $request->input('status'),
            'keterangan' => $request->input('keterangan'),
            'tanggal_pengajuan' => Carbon::now(),
        ]);

        // try {
        //     DetailPengajuanCuti::create([
        //         'id_pengajuan_cuti' => $pengajuan->id,
        //         'id_cuti' => $request->input('id_cuti'),
        //         'tanggal_mulai' => $request->input('tanggal_mulai'),
        //         'tanggal_selesai' => $request->input('tanggal_selesai'),
        //         'jumlah' => $request->input('jumlah'),
        //         'sisa_cuti' => $request->input('sisa_cuti')
        //     ]);
        //     dd("Detail tersimpan");
        // } catch (\Exception $e) {
        //     dd("Gagal simpan detail:", $e->getMessage());
        // }


        DetailPengajuanCuti::create([
            'id_pengajuan_cuti' => $pengajuan->id,
            'id_cuti' => $request->input('id_cuti'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'jumlah' => $request->input('jumlah'),
            'sisa_cuti' => $request->input('sisa_cuti')
        ]);

        return redirect()
            ->route('pengajuancuti.index')
            ->with('message', 'Data sudah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = PengajuanCuti::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $data = PengajuanCuti::findOrFail($id);
        $data->status = $request->status;
        $data->save();

        return redirect()
            ->route('pengajuancuti.index')
            ->with('message', 'Data sudah ditambahkan');
    }

    public function cetakSatu($id)
    {
        $data = PengajuanCuti::with(['pegawai', 'detail_pengajuan_cuti'])->findOrFail($id);

        return view('page.laporan.print', compact('data'));
    }
}
