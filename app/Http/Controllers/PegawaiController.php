<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pegawai = Pegawai::paginate(5);
            $jabatan = Jabatan::all();
            return view('page.pegawai.index')->with([
                'pegawai' => $pegawai,
                'jabatan' => $jabatan
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'id_jabatan' => $request->input('id_jabatan'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'no_hp' => $request->input('no_hp'),
                'alamat' => $request->input('alamat'),
                'status_pegawai' => $request->input('status_pegawai'),
            ];
    
            Pegawai::create($data);

            // return back()->with('message_delete', 'Data Pegawai Sudah ditambahkan');

            return redirect()
                ->route('pegawai.index')
                ->with('message_insert', 'Data Pegawai Sudah ditambahkan');
        } catch (\Exception $e) {
            return redirect()
                ->route('pegawai.index')
                ->with('error_message', 'Terjadi kesalahan saat menambahkan data:
            ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        try {
            $data = [
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'id_jabatan' => $request->input('id_jabatan'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'no_hp' => $request->input('no_hp'),
                'alamat' => $request->input('alamat'),
                'status_pegawai' => $request->input('status_pegawai'),
            ];
    
            $datas = Pegawai::findOrFail($id);
            $datas->update($data);

            // return back()->with('message_delete', 'Data Pegawai Sudah di update');

            return redirect()
                ->route('pegawai.index')
                ->with('message_update', 'Data Pegawai Sudah di update');
        } catch (\Exception $e) {
            return redirect()
                ->route('pegawai.index')
                ->with('error_message', 'Terjadi kesalahan saat menambahkan data:
            ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
