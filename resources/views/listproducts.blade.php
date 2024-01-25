@extends('main')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        {{-- <h1 class="h3 mb-0 text-gray-800">List Products</h1> --}}
    </div>

    <div class="row">
        <div class="col-lg-12">
           <div class="card shadow ">
            <div class="card-header py-3"> 
                <div class="row">
                    <div class="col-4">
                        <h6 class="mt-3 font-weight-bold text-primary">List of Items</h6>
                        
                    </div>
                    <div class="col-8">
                        <form action="/listproducts">
                            <div class="input-group">
                                <input name="cari" id="cari" class="form-control bg-white" style="width: 260px; margin-left: 410px;" type="text" placeholder="Search" aria-label="Search" value="">
                                <button class="btn btn-primary ml-3" type="submit">Search</button>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        
            {{-- <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">List Items</h6>
            </a> --}}
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    @if (session()->has('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{ session('sukses') }}
                    </div>
                    @endif
                    <table class="table no-wrap v-middle mb-0 text-center">
                        <thead>
                            <tr class="border-0">
                                <th class="border-0 font-14 font-weight-medium text-muted px-2">No</th>
                                <th class="border-0 font-14 font-weight-medium text-muted px-2 text-left">Item Name</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Supplier</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Quality</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Discount (%)</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Unit</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Unit Price</th>
                                {{-- <th class="border-0 font-14 font-weight-medium text-muted">Quantity</th>
                                
                                <th class="border-0 font-14 font-weight-medium text-muted">Warranty</th>
                                
                                <th class="border-0 font-14 font-weight-medium text-muted">Order Date</th> --}}
                                <th class="border-0 font-14 font-weight-medium text-muted text-center" colspan="2">Action</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product )
                                <tr>
                                  
                                    <td class="border-top-0 px-2 py-4">{{  ($products->currentPage() - 1) * $products->perPage() + $loop -> iteration }}</td>
                                    <td class="border-top-0 px-2 py-4 text-left">{{  $product->namabarang }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->datasupp?->namasupp }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->kualitas }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->discount }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->units?->satuan }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->price }}</td>
                                    {{-- <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->quantity}}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->warranty }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->order_date }}</td> --}}
                                    <!-- Hanya admin yang boleh melakukan aksi pada data -->
                                    <td class="border-top-0 text-center text-muted px-2 py-4">
                                        {{-- <button class="btn btn-warning btn-sm" type="submit">Edit</button> --}}
                                        <a class="btn btn-warning btn-sm" href="/editproduct/{{ $product->id }}">Edit</a>
                                    </td>
                                    <td class="border-top-0 text-center text-muted px-2 py-4">
                                        <form action="{{ route('product.destroy', $product ->id) }}" method="POST">
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
                        {{ $products->links() }}
                    </div>
                    
                </div>
                {{-- <div class="row d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination"><li class="page-item active"><a href="#" class="page-link">1<span class="sr-only">(current)</span></a></li><li class="page-item"><a href="" class="page-link" data-ci-pagination-page="2">2</a></li><li class="page-item"><a href="" class="page-link" data-ci-pagination-page="2" rel="next">&raquo</a></li></ul>                        </nav>
                </div> --}}
            </div>
        </div>
    </div>


    </div>

</div>
<!-- /.container-fluid -->
@endsection