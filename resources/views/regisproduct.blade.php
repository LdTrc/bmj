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
                    <h6 class="m-0 font-weight-bold text-primary">Add New Items</h6>
                </div>

                <div class="card-body">
                    
                    <form action="/regisproduct" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Item Name</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user"></i></label>
                                                    </div>
                                                    <input type="text" name="namabarang" value=""  class="form-control" required="1" placeholder="" />
                                                </div>
                                                @error('namabarang')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                    <label class="col-lg-2">Supplier</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="supplier-options"><i class="fas fa-parachute-box"></i></label>
                                                    </div>
                                                    <select class="form-control" name="supplierid" id="supplier-options">
                                                        @foreach ($datasupp as $datasupp)
                                                        <option value="{{ $datasupp->id }}">{{ $datasupp->namasupp }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('supplierid')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Quality (1-5)</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-cubes"></i></label>
                                                    </div>
                                                    <input type="number" class="form-control" value="0" name="kualitas" >
                                                    {{-- <div id="starContainer" onclick="updateStarRating(event)">
                                                        <span class="star-rating" data-value="1">&#9734;</span>
                                                        <span class="star-rating" data-value="2">&#9734;</span>
                                                        <span class="star-rating" data-value="3">&#9734;</span>
                                                        <span class="star-rating" data-value="4">&#9734;</span>
                                                        <span class="star-rating" data-value="5">&#9734;</span>
                                                    </div> --}}
                                                    
                                                        <p id="starRating" class="star-rating" name="kualitas" hidden></p>
                                                    </div>
                                            </div>
                                            @error('kualitas')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Discount (%)</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-hand-holding-usd"></i></label>
                                                    </div>
                                                    <input type="number" name="discount" value="" class="form-control" placeholder="Discount" required>
                                                </div>
                                                @error('discount')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                    <label class="col-lg-2">Unit</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="satuan-options"><i class="fas fa-box"></i></label>
                                                    </div>
                                                    <select class="form-control" name="satuanid" id="satuan-options">
                                                        @foreach ($units as $units)
                                                        <option value="{{ $units->id }}">{{ $units->satuan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('satuanid')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Unit Price</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-hand-holding-usd"></i></label>
                                                    </div>
                                                    <input type="number" name="price" value="" class="form-control" placeholder="" required>
                                                </div>
                                                @error('price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Quantity</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-hand-holding-usd"></i></label>
                                                    </div>
                                                    <input type="number" name="quantity" value="" class="form-control" placeholder="" required>
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
                                    <label class="col-lg-2">Warranty</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-hand-holding-usd"></i></label>
                                                    </div>
                                                    <input type="number" name="warranty" value="" class="form-control" placeholder="" required>
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
                                                    <input type="date" name="order_date" required class="form-control">
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
                        </div> --}}
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
    </div>
</div>
@endsection