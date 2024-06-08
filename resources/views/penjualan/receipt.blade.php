<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Receipt</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400&display=swap" rel="stylesheet">
    <style>
@page{
    margin:0;
    border:0;
    size:80mm,100%;
   
}    
body{
    font-size: 9pt;
    font-family: 'Inconsolata', monospace;
    text-align: justify;
}
</style>
</head>
<body>

<p>invoice:{{ $datatransaksi->invoice}}<br>
pelanggan:{{ $datatransaksi->nama}}<br>
Cashier:{{ Auth::user()->name}}<br>
Tanggal:{{$datatransaksi->created_at->format('d M Y H:m')}}</p>
<table>
    <thead>
        <tr>
            <td>Produk</td>
            <td>Qty</td>
            <td>Harga</td>
            <td>Amount</td>
        </tr>
    </thead>
@foreach($datadetiltransaksi as $dod)
<tr>
            <td>{{ $dod->produk->nama }}</td>
            <td>{{$dod->qty}}</td>
            <td>@money($dod->harga)</td>
            <td>@money($dod->harga*$dod->qty)</td>
        </tr>

@endforeach
<tr>
    <td colspan="3">Total:</td>
    <td>@money($datatransaksi->total)</td>
</tr>
</table>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){
        window.print();
        setInterval(myURL,5000);
    });
    function myURL() {
        document.location.href = "{{ route('penjualan') }}";
        // clearInterval(interval);
    }
   
    </script>
</body>
</html>
