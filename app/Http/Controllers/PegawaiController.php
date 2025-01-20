<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    // Menampilkan daftar pegawai
    public function index()
    {
        \Carbon\Carbon::setLocale('id');

        $data = Pegawai::all(); // Ambil semua data pegawai
        return view('pegawai.index', [
            'title' => 'Data pegawai',
            "data"=>Pegawai::all()

        ]);
    }

    // Menampilkan form tambah data pegawai
    public function create()
    {
        return view('pegawai.create')->with([
            "title" => "Tambah Data pegawai"
        ]);
    }

   

public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
       'nama' => 'required',
        'nip' => 'required',     
        'pangkat' => 'required',
        'jabatan' => 'required',

    ]);

    // Simpan data ke database
    Pegawai::create($validated);


    // Redirect dengan pesan sukses
    return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan.');
}
    

     // }
     public function show($id)
{
    // Contoh: Ambil data pegawai berdasarkan ID
    $pegawai = Pegawai::findOrFail($id);

    // Return view dengan data pegawai
    return view('pegawai.show', compact('pegawai'));
}


    // Menghapus data pegawai berdasarkan ID
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);  // Cari data berdasarkan ID

        try {
            $pegawai->delete();  // Hapus data
            return redirect()->route('pegawai.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('pegawai.index')->with('error', 'Gagal menghapus data.');
        }
    }
    public function edit($id)
    {
        // Find the employee by id
        $pegawai = Pegawai::findOrFail($id);

        // Return the edit view with the employee data
        return view('pegawai.edit', compact('pegawai'));
    }

    // Update employee data (update)
    public function update(Request $request, $id)
    {
        // Validate the incoming form data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string',
            'pangkat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        // Find the employee to update
        $pegawai = Pegawai::findOrFail($id);

        // Update the employee's data
        $pegawai->update([
            'nama' => $validatedData['nama'],
            'nip' => $validatedData['nip'],
            'pangkat' => $validatedData['pangkat'],
            'jabatan' => $validatedData['jabatan'],
        ]);

        // Redirect to the employee list with a success message
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil diperbarui.');
    }
}

