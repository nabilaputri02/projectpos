<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use Illuminate\View\View;
use App\Models\detiltransaksi;

class CetakController extends Controller
{
    //
    public function receipt():View
    {
        $id= session()->get('id');

        $transaksi=transaksi::find($id);
        //dd($transaksi)
        $transaksiDetail=detiltransaksi::where('transaksi_id',$id)->get();
        return view('penjualan.receipt')->with([
            'data transaksi'=>$transaksi,
            'data transaksiDetail'=>$transaksiDetail
        ]);
    }
}
