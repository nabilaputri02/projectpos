<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PelangganController extends Controller
{
    //

    public function index()
    {
        return view('pelanggan.tabel',["title"=>"pelanggan","data"=>pelanggan::all()
    ]);
    }

    public function create():View
    {
        return view('pelanggan.tambah')->with(["title"=>"Tambah Data pelanggan"]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "telepon"=>"required",
            "alamat"=>"nullable"
        ]);

        pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success','Data pelanggan Berhasil Ditambahkan');
    }

    public function edit(pelanggan $pelanggan):View
    {
        return view('pelanggan.edit',compact('pelanggan'))->with(["title"=>"Ubah Data pelanggan"]);
    }

    public function update(Request $request,pelanggan $pelanggan):RedirectResponse
    {
        $request->validate([
        "nama"=>"required",
        "alamat"=>"nullable",
        "telepon"=>"required"
       
    ]);

    $pelanggan->update($request->all());

    return redirect()->route('pelanggan.index')
                     ->with('updated','Data Pelanggan Berhasil Diubah');
    }

    public function show(pelanggan $pelanggan):View
    {
        return view('pelanggan.tampil',compact('pelanggan'))
               ->with(["title"=>"Data pelanggan"]);                               
    }
}