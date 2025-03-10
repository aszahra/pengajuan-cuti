<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cuti = Cuti::paginate(5);
            return view('page.cuti.index')->with([
                'cuti' => $cuti,
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
                'jumlah_cuti' => $request->input('jumlah_cuti'),
            ];

            Cuti::create($data);

            // return back()->with('message_delete', 'Data Cuti Sudah ditambahkan');

            return redirect()
                ->route('cuti.index')
                ->with('message_insert', 'Data Cuti Sudah ditambahkan');
        } catch (\Exception $e) {
            return redirect()
                ->route('cuti.index')
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
        $data = [
            'nama' => $request->input('nama'),
            'jumlah_cuti' => $request->input('jumlah_cuti'),
        ];

        $datas = Cuti::findOrFail($id);
        $datas->update($data);

        return back()->with('message_delete', 'Data Cuti Sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Cuti::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Cuti Sudah dihapus');
    }
}
