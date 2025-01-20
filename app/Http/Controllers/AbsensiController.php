<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
 // Import PDF facade

class AbsensiController extends Controller
{
    // Menampilkan index (semua data absensi)
    public function index()
    {
        \Carbon\Carbon::setLocale('id');

        $data = Absensi::all(); // Ambil semua data absensi
        return view('absensi.index', [
            'title' => 'Data Absensi',
            'data' => $data
        ]);
    }

    // Menampilkan halaman form untuk membuat data absensi baru
    public function create(): View
    {
        return view('absensi.create', [
            'title' => 'Tambah Data Absensi',
        ]);
    }

    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'nama' => 'required',
        'statuskehadiran' => 'nullable|string',
        'keterangan' => 'nullable|string',
    ]);

    // Simpan data ke database
    Absensi::create($validated);

    // Flash message tanpa redirect
    session()->flash('success', 'Data absensi berhasil disimpan!');

    // Tetap di halaman yang sama
    return view('absensi.create', compact('validated'));
}


    // Menampilkan form untuk mengedit data absensi
    public function edit(Absensi $absensi): View
    {
        return view('absensi.edit', compact('absensi'), [
            'title' => 'Ubah Data Absensi',
        ]);
    }

    // Mengupdate data absensi setelah form diubah
    public function update(Request $request, Absensi $absensi): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
            'statuskehadiran' => 'required',
            'keterangan' => 'required',
        ]);
    
        $absensi->update($request->all());
    
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diubah.');
    }

    // Menampilkan detail data absensi
    public function show(Absensi $absensi): View
    {
        return view('absensi.show', [
            'title' => 'Detail Data Absensi',
            'absensi' => $absensi,
        ]);
    }
    
    // Menghapus data absensi berdasarkan ID
    public function destroy(int $id): RedirectResponse
    {
        Absensi::destroy($id);
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus');
    }

    // Fungsi untuk mencetak data absensi individual sebagai PDF
    public function printPDF($id)
    {
        // Ambil data absensi berdasarkan ID
        $data = Absensi::findOrFail($id);
    
        // Buat PDF dengan data spesifik
        $pdf = Pdf::loadView('absensi.pdf', compact('data'));
    
        // Download PDF dengan nama file dinamis
        return $pdf->download('data-absensi-' . $data->nama . '-' . $data->created_at->format('Ymd') . '.pdf');
    }

    public function cetakSemua()
    {
        $absensi = Absensi::orderBy('created_at', 'DESC')->get();
    
        $pdf = Pdf::loadView('absensi.semua', ['absensi' => $absensi])
                  ->setPaper('a4', 'portrait'); // Atur ukuran dan orientasi kertas
    
        return $pdf->download('laporan_semua_absensi.pdf');
    }
    
}
