<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{ 
public function index()
    {
        return view('user.index',[
            "title"=>"Data User",
            "data"=>User::all()
        ]); 
    }
   

    public function create()
    {
        return view('user.create')->with([
            "title" => "Tambah Data User"]);
    }

    public function store(Request $request)
{
    // Validasi data yang diterima
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:4',
    ]);

    // Membuat pengguna baru
    $user = new User();
    $user->name = $validatedData['name'];
    $user->username = $validatedData['username'];
    $user->password = Hash::make($validatedData['password']); // Enkripsi password
    $user->save(); // Menyimpan ke database

    // Mengalihkan ke halaman index dengan pesan sukses
    return redirect()->route('user.index')->with('success', 'Petugas berhasil ditambahkan.');
}


    
    
}

