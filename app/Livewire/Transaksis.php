<?php

namespace App\Livewire;


use App\Models\transaksi;
use App\Models\detiltransaksi;
use App\Models\produk;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Transaksis extends Component
{
    public $total;
    public $transaksi_id;
    public $produk_id;
    public $qty=1;
    public $uang;
    public $kembali;

    public function render()
    {
       $transaksi=transaksi::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();

       $this->total=$transaksi->total;
       $this->kembali=$this->uang-$this->total;
       return view('livewire.Transaksis')
       ->with("data",$transaksi)
       ->with("dataproduk",produk::where('stok','>','0')->get())
       ->with("datadetiltransaksi",detiltransaksi::where('transaksi_id','=',$transaksi->id)->get());
    }

    public function store()
    {
        $this->validate([

            'produk_id'=>'required'
        ]);
        $transaksi=transaksi::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();
        $this->transaksi_id=$transaksi->id;
        $produk=produk::where('id','=',$this->produk_id)->get();
        $harga=$produk[0]->price;
        detiltransaksi::create([
            'transaksi_id'=>$this->transaksi_id,
            'produk_id'=>$this->produk_id,
            'qty'=>$this->qty,
            'price'=>$harga
        ]);

        $total=$transaksi->total;
        $total=$total+($harga*$this->qty);
        transaksi::where('id','=',$this->transaksi_id)->update([
            'total'=>$total
        ]);
        $this->produk_id=NULL;
        $this->qty=1;
    }

    public function delete($detiltransaksi_id)
    {
        $detiltransaksi=detiltransaksi::find($detiltransaksi_id);
        $detiltransaksi->delete();

        //update total
        $detiltransaksi=detiltransaksi::select('*')->where('transaksi_id','=',$this->transaksi_id)->get();
        $total=0;
        foreach($detiltransaksi as $od){
            $total+=$od->qty*$od->price;
        }

        try{
            transaksi::where('id','=',$this->transaksi_id)->update([
                'total'=>$total
            ]);
        }catch(Exception $e){
            dd($e);
        }
    }

    public function receipt($id)
    {
        //update stok
        $detiltransaksi=detiltransaksi::select('*')->where('transaksi_id','=',$id)->get();
        //dd($detiltransaksi);
        foreach ($detiltransaksi as $od){
            $stoklama = produk::select('stok')->where('id','=',$od->produk_id)->sum('stok');
            $stok = $stoklama - $od->qty;
            try{
                produk::where('id','=',$od->produk_id)->update([
                    'stok' => $stok
                ]);
            }catch (Exception $e){
                dd($e);
            }
        }
        return Redirect::route('cetakReceipt')->with(['id' => $id]);
    }
    
}