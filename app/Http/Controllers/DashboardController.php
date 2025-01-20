<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Hitung jumlah data di masing-masing tabel
        $pegawaiCount = Pegawai::count();
        $userCount = User::count();
        $absensiCount = Absensi::count();

        // Kirim data ke view
        return view('dashboard', compact('pegawaiCount', 'userCount', 'absensiCount'));
    }
}
