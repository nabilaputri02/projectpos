<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = transaksi::count();
        if ($request->filled('q')) {
            $query = $query->where('id', 'LIKE', '%' . $request->q . '%');
        }
        if ($request->filled('tanggal_mulai')) {
            $query = $query->where('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_selesai')) {
            $query = $query->where('created_at', '<=', $request->tanggal_selesai);
        }

    
        $transaksi = transaksi::All();
        $totalpenjualan = transaksi::sum('total');
        $title = "Laporan Penjualan";
        
        if ($request->page == 'laporan') {
            return view('laporan.laporan', compact('transaksi', 'totalpenjualan', 'title'));
        }

        return view('laporan.laporan', compact('transaksi', 'totalpenjualan', 'title'));
    }
}
