<?php

namespace App\Livewire;
use App\Models\transaksi;
use Livewire\Component;
use App\Models\pelanggan;
use Illuminate\Support\Facades\Auth;

class Penjualan extends Component
{
    public $pelanggan_id;
    public function render()
    {
        return view('Livewire.Penjualan',['data'=>pelanggan::orderBy('id','desc')->get()
    ]);
    }

    public function store()
    {
        $this->validate([
            'pelanggan_id'=>'required'
        ]);
         
        transaksi::create([
            'invoice'=>$this->invoice(),
            'pelanggan_id'=>$this->pelanggan_id,
            'user_id'=>Auth::user()->id,
            'total'=>'0'
        ]);
        $this->pelanggan_id=NULL;
        return redirect()->to('transaksi');
    }

    public function invoice()
    {
        $transaksi=transaksi::orderBy('created_at','DESC');
        if($transaksi->count()>0){
            $transaksi=$transaksi->first();
            $explode=explode('-',$transaksi->invoice);
            return 'INV-'.$explode[1]+1;
        }
        return 'INV-1';
    }
   
}
