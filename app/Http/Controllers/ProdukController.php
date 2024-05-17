<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProdukController extends Controller
{
    public function index()
    {
        $produk=produk::all();
        return view('produk.index',[
            "title"=>"produk",
            "data"=>$produk
        ]);
    }

    public function create():View
    {
        return view('produk.create')->with([
            "title"=> "Tambah Data produk",
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "harga"=>"required"
        
        ]);

        produk::create($request->all());
        return redirect()->route('produk.index')->with('success','Data Produk Berhasil Ditambahkan');
    }

    public function edit(produk $produk):View
    {
        return view('produk.edit',compact('produk'))->with([
            "title" => "Ubah Data Produk",
        ]);
    }

    public function update(produk $produk, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "stok"=>"required",
            "harga"=>"required"
        ]);

        $produk->update($request->all());
        return redirect()->route('produk.index')->with('Updated','Data Produk Berhasil Diubah');
    }

    public function show():View
    {
        $produk=produk::all();
        return view('produk.show')->with([
            "title" => "Tampil Data Produk",
            "data"=>$produk
        ]);
    }

    public function destroy($id):RedirectResponse
    {

        produk::where('id',$id)->delete();
        return redirect()->route('produk.index')->with('deleted','Data Produk Berhasil Dihapus');
    }
}
