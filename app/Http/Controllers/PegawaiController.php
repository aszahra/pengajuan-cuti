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
        $pegawai = Pegawai::paginate(5);
        $jabatan = Jabatan::all();
        return view('page.pegawai.index')->with([
            'pegawai' => $pegawai,
            'jabatan' => $jabatan
        ]);
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

        return back()->with('message_delete', 'Data Pegawai Sudah ditambahkan');
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

        return back()->with('message_delete', 'Data Pegawai Sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
