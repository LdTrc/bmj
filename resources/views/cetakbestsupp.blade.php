<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table.static{
            position: relative;
            border: 1px solid black;
        }
        .rangkasurat {
            width : 980px;
            margin:0 auto;
            padding: 20px;
        }
        .kop {
            border-bottom : 4px solid black;
        }
        .tengah {
            text-align : center;
        }
    </style>
    <title>CETAK DATA BEST SUPPLIER</title>
</head>
<body>

    <div class="rangkasurat">
        <table class= "kop" width="100%">
              <tr>
                <td> <img src="{{ asset('img/logo-icon.png') }}" width="140px"> </td>
                <td class = "tengah">
                        <h1 style="font-size: 62px;">Bambu Makmur Jaya</h1>
                        <h5 class="mt-1">Jl. Tanjungpura No. 263 A Pontianak - Kalimantan Barat</h5>
                        <h5>Hp. 0821 5706 2648</h5>
                </td>
               </tr>
        </table >
   </div>
   {{-- <hr style="border: 2px solid black; color: black;"> --}}
   <h6 class="text-end" id="tanggalHariIni" style="margin-right: 20px;"></h6>
    <div class="form-group text-center">
        <p align="center"><h4>Laporan Data Best Supplier</h4></p>
        <table class="table p-1 mx-auto table-bordered" style="width: 95%;">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th class="text-center">Contact</th>
                <th class="text-center">Address</th>
                <th class="text-center">City</th>
                <th class="text-center">Location</th>
                <th class="text-center">Delivery</th>
                <th class="text-center">Discount</th>
                <th class="text-center">Warranty</th>
            </tr>
            @foreach ($hasilRekomendasi as $nama => $skorTotal)
            <tr>
                <th class="text-left">{{ $nama + 1 }}</th>
                <th>
                  {{ $skorTotal->namasupp ?? '' }}
                 
              </th>  
                <th class="text-center">{{ $skorTotal->notelp ?? '' }}</th>
                <th class="text-center">{{ $skorTotal->alamat ?? '' }}</th>
                <th class="text-center">{{ $skorTotal->kota ?? '' }}</th>
                <th class="text-center">
                  {{-- {{ $skorTotal->lokasi ?? '' }} --}}
                  @if($skorTotal->lokasi == 1)
                  Dalam Kota
              @elseif($skorTotal->lokasi == 0.5)
                  Luar Kota
              @elseif($skorTotal->lokasi == 0)
                  Luar Pulau
              @endif
                </th>
                <th  class="text-center">
                  {{-- {{ $skorTotal->pengiriman ?? '' }} --}}
                  @if($skorTotal->pengiriman == 1)
                  Cepat
              @elseif($skorTotal->pengiriman == 0.5)
                  Sedang
              @elseif($skorTotal->pengiriman == 0)
                  Lama
              @endif  </th>
                <th class="text-center">
                  {{-- {{ $skorTotal->diskon ?? '' }} --}}
                  @if($skorTotal->diskon == 1)
                  Tinggi
              @elseif($skorTotal->diskon == 0.5)
                  Rendah
              @endif 
            </th>
                <th class="text-center">
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

        var today = new Date();

        var options = {
            weekday: 'long', // Hari
            year: 'numeric', // Tahun
            month: 'long', // Bulan
            day: 'numeric' // Tanggal
        };

        var formatter = new Intl.DateTimeFormat('id-ID', options);

        var tanggalHariIniElement = document.getElementById("tanggalHariIni");

        tanggalHariIniElement.innerText = "Tanggal : " + formatter.format(today);
    </script>
</body>
</html>