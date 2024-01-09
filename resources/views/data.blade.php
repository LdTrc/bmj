@extends('main')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">List Supplier</h1> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                        </div>
                        <div class="col-3">
                            <form id="form"> 
                            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        </div>
                        <div class="col-1">
                            <button class="btn btn-primary">Generate</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body"> 
                        <div class="table-responsive">

                            <form method="GET">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Cari Data
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari data berdasarkan Nama Supplier" autofocus="true" value="{{ cari }}">
                                    </div>
                                </div>
                            </form>

                            <table class="table no-wrap v-middle mb-0">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Products</th>
                                      
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Supplier</th>
                                     
                                        <th class="border-0 font-14 font-weight-medium text-muted">Price</th>
                                        <!-- Hanya admin yang boleh edit -->
                                        <th class="border-0 font-14 font-weight-medium text-muted">Quality</th>

                                        <th class="border-0 font-14 font-weight-medium text-muted">Kecepeatan Pengiriman</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Tingkat Diskon</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Pelayanan</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Garansi</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Keaslian Barang</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Tempo Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                @foreach ($product as $product)
                                <tr>
                                    <td class="border-top-0 px-2 py-4">{{  $product->namabarang }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->supplier->nama }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->price }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->kualitas }}</td>
{{--                                        
                                        <td class="border-top-0 text-center text-muted px-2 py-4">
                                            <button class="btn btn-warning btn-sm" type="submit">Edit</button>
                                            
                                        </td>
                                        <td class="border-top-0 text-center text-muted px-2 py-4">
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Del</button>
                                            </form>
                                        </td> --}}
                                        
                                    </tr>
                                    
                                @endforeach
                                
                            </tbody>
                            </table>
                            {{ $datasupp->links(); }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection