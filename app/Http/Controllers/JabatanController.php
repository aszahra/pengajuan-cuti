<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::paginate(5);
        $departemen = Departemen::all();
        return view('page.jabatan.index')->with([
            'jabatan' => $jabatan,
            'departemen' => $departemen
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
            'id_departemen' => $request->input('id_departemen'),
            'level' => $request->input('level'),
        ];

        Jabatan::create($data);

        return back()->with('message_delete', 'Data Jabatan Sudah dihapus');
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
            'id_departemen' => $request->input('id_departemen'),
            'level' => $request->input('level'),
        ];

        $datas = Jabatan::findOrFail($id);
        $datas->update($data);

        return back()->with('message_delete', 'Data Jabatan Sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Jabatan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Jabatan Sudah dihapus');
    }
}
