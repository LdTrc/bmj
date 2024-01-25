@extends('main')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">Register Products</h1> --}}


    <div class="row">

        <div class="col-lg-12">
            @if (session()->has('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Product Inventory</h6>
                </div>

                <div class="card-body">
                    
                    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Product</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="product-options"><i class="fas fa-parachute-box"></i></label>
                                                    </div>
                                                    <select class="form-control" name="product_id" id="product-options">
                                                        @foreach ($products as $product)
                                                        @if (old('product_id', $inventory->product_id)==$product->id)
                                                        <option value="{{ $product->id }}" selected>{{ $product->namabarang }} - {{ $product->datasupp->namasupp }}</option>
                                                        @else
                                                        <option value="{{ $product->id }}">{{ $product->namabarang }} - {{ $product->datasupp->namasupp }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Quantity</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-cubes"></i></label>
                                                    </div>
                                                    <input type="number" class="form-control" value="{{ $inventory->quantity }}" name="quantity" >
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Sell Price</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="supplier-options"><i class="fas fa-box"></i></label>
                                                    </div>
                                                    <input type="number" class="form-control" value="{{ $inventory->sell_price }}" name="sell_price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Warranty (Bulan)</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-hand-holding-usd"></i></label>
                                                    </div>
                                                    <input type="number" name="warranty" value="{{ $inventory->warranty?->warranty }}" class="form-control" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Order Date</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-hand-holding-usd"></i></label>
                                                    </div>
                                                    <input type="date" name="order_date" value="{{ $inventory->warranty?->order_date }}" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="" class="btn btn-dark">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Warranty List</h6>
        </div>

        <div class="card-body">

    <div class="row">
        <div class="col-lg-12">
            
            <table class="table no-wrap v-middle mb-0">
                <thead>
                    <tr class="border-0">
                        <th class="border-0 font-14 font-weight-medium text-muted">Quantity</th>
                        <th class="border-0 font-14 font-weight-medium text-muted">Warranty (Bulan)</th>
                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Order Date</th>
                        <th class="border-0 font-14 font-weight-medium text-muted">Warranty End Date</th>      
                        <th class="border-0 font-14 font-weight-medium text-muted">Warranty Status</th>                           
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach ($warranties as $warranty )
                    <tr>
                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $warranty->quantity }}</td>
                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $warranty->warranty }}</td>
                        <td class="border-top-0 px-2 py-4">{{  $warranty->order_date }}</td>
                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $warranty->endDate }}</td>
                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $warranty->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection