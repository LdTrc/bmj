<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table.static{
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA BEST SUPPLIER</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Best Supplier</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>City</th>
                <th>Location</th>
                <th>Delivery</th>
                <th>Discount</th>
                <th>Warranty</th>
            </tr>
            @foreach ($hasilRekomendasi as $nama => $skorTotal)
            <tr>
                <th class="text-left">{{ $nama + 1 }}</th>
                <th>
                  {{ $skorTotal->namasupp ?? '' }}
                 
              </th>  
                <th>{{ $skorTotal->notelp ?? '' }}</th>
                <th>{{ $skorTotal->alamat ?? '' }}</th>
                <th>{{ $skorTotal->kota ?? '' }}</th>
                <th>
                  {{-- {{ $skorTotal->lokasi ?? '' }} --}}
                  @if($skorTotal->lokasi == 1)
                  Dalam Kota
              @elseif($skorTotal->lokasi == 0.5)
                  Luar Kota
              @elseif($skorTotal->lokasi == 0)
                  Luar Pulau
              @endif
                </th>
                <th>
                  {{-- {{ $skorTotal->pengiriman ?? '' }} --}}
                  @if($skorTotal->pengiriman == 1)
                  Cepat
              @elseif($skorTotal->pengiriman == 0.5)
                  Sedang
              @elseif($skorTotal->pengiriman == 0)
                  Lama
              @endif  </th>
                <th>
                  {{-- {{ $skorTotal->diskon ?? '' }} --}}
                  @if($skorTotal->diskon == 1)
                  Tinggi
              @elseif($skorTotal->diskon == 0.5)
                  Rendah
              @endif 
            </th>
                <th>
                  {{-- {{ $skorTotal->garansi ?? '' }} --}}
                  @if($skorTotal->garansi == 1)
                              Ada
                          @elseif($skorTotal->garansi == 0.5)
                              Tidak
                          @endif
                </th>
                {{-- <th>{{ $skorTotal->Class ?? '' }}</th> --}}
              </tr>
          @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>