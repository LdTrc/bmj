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

           <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">List Items</h6>
            </a>
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                   
                    <table class="table no-wrap v-middle mb-0">
                        <thead>
                            <tr class="border-0">
                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Item Name</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Supplier</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Quality</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Unit</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Unit Price</th>
                                <th class="border-0 font-14 font-weight-medium text-muted text-center" colspan="2">Action</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($product as $product )
                                <tr>
                                  
                                    <td class="border-top-0 px-2 py-4">{{  $product->namabarang }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->supplier?->nama }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->kualitas }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->satuan }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $product->price }}</td>
                                    
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
                    
                    
                </div>
                
            </div>
        </div>
    </div>


    </div>

</div>
<!-- /.container-fluid -->
@endsection