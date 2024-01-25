@extends('main')
@section('container')


  
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">List Supplier</h1> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow ">
                <div class="card-header py-3"> 

                    <div class="row">
                        {{-- <div class="col-4">
                            <h6 class="mt-3 font-weight-bold text-primary">List Supplier </h6>
                            <h6>Total: {{ count($datasupp) }}</h6>
                        </div> --}}
                        <div class="col-4">
                        <h6 class="mt-3 font-weight-bold text-primary">List of Supplier</h6>
                        
                    </div>
                        <div class="col-8">
                            <form action="/listsupp">
                                <div class="input-group">
                                    <input name="cari" id="cari" class="form-control bg-white" style="width: 260px; margin-left: 410px;" type="text" placeholder="Search" aria-label="Search" value="{{ request('cari') }}">
                                    <button class="btn btn-primary ml-3" type="submit">Search</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{ session('sukses') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0 text-center">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">No</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2 text-left">Name</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Contact</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Address</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">City</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Location</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Delivery</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Discount</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Warranty</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center" colspan="2">Action</th>
                                        <!-- Hanya admin yang boleh edit -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datasupp as $index => $supplier)
                                        <tr>
                                            <td class="border-top-0 px-2 py-4">{{ ($datasupp->currentPage() - 1) * $datasupp->perPage() + $loop -> iteration}}</td>
                                            <td class="border-top-0 px-2 py-4 text-left">{{  $supplier->namasupp }}</td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $supplier->notelp }}</td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $supplier->alamat }}</td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $supplier->kota }}</td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                @if($supplier->lokasi == 1)
                                                    Dalam Kota
                                                @elseif($supplier->lokasi == 0.5)
                                                    Luar Kota
                                                @elseif($supplier->lokasi == 0)
                                                    Luar Pulau
                                                @endif
                                            </td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                @if($supplier->pengiriman == 1)
                                                    Cepat
                                                @elseif($supplier->pengiriman == 0.5)
                                                    Sedang
                                                @elseif($supplier->pengiriman == 0)
                                                    Lama
                                                @endif    
                                            </td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                @if($supplier->diskon == 1)
                                                    Tinggi
                                                @elseif($supplier->diskon == 0.5)
                                                    Rendah
                                                @endif  
                                            </td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                @if($supplier->garansi == 1)
                                                    Ada
                                                @elseif($supplier->garansi == 0.5)
                                                    Tidak
                                                @endif
                                            </td>
                                            {{-- <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                @if($supplier->diskon == 1)
                                                    Pilih
                                                @elseif($supplier->diskon == 0.5)
                                                    Tidak Pilih
                                                @endif
                                            </td>
                                            --}}
                                            
                                            <!-- Hanya admin yang boleh melakukan aksi pada data -->
                                            <td class="border-top-0 text-center text-muted px-2 py-4">
                                                <a class="btn btn-warning btn-sm" href="/editsupp/{{ $supplier->id }}" >Edit</a>
                                                
                                            </td>
                                            <td class="border-top-0 text-center text-muted px-2 py-4">
                                                <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">Del</button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                            <div class="d-flex justify-content-center">
                                {{ $datasupp->links() }}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection