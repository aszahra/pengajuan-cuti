<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $departemen = Departemen::paginate(5);
            return view('page.departemen.index')->with([
                'departemen' => $departemen,
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
                'nama' => $request->input('nama'),
                'deskripsi' => $request->input('deskripsi'),
            ];

            Departemen::create($data);

            // return back()->with('message_delete', 'Data Departemen Sudah ditambahkan');

            return redirect()
                ->route('departemen.index')
                ->with('message_insert', 'Data departemen berhasil ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
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
                'nama' => $request->input('nama'),
                'deskripsi' => $request->input('deskripsi'),
            ];

            $datas = Departemen::findOrFail($id);
            $datas->update($data);

            // return back()->with('message_delete', 'Data Departemen Sudah di update');

            return redirect()
                ->route('departemen.index')
                ->with('message_update', 'Data departemen berhasil di update');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Departemen::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Departemen Sudah dihapus');
        } catch (\Exception $e) {
            // return back()->with('error_message', 'Terjadi kesalahan saat menghapus data:
            // ' . $e->getMessage());
            return view('error.index');
        }
    }
}
