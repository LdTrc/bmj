@extends('main')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">Register Supplier</h1> --}}

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12">
            @if (session()->has('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Supplier</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user"></i></label>
                                                    </div>
                                                    <input type="text" name="nama"   class="form-control" required="1" placeholder="" value="{{ $supplier->nama }}"/>
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
                                    <label class="col-lg-2">Phone Number</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-phone"></i></label>
                                                    </div>
                                                    <input type="text" name="telp" class="form-control" placeholder="" required="1"  value="{{ $supplier->telp }}"/>
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
                                    <label class="col-lg-2">Address</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                                    </div>
                                                    <input type="text" name="alamat"  class="form-control" placeholder="" required="1"  value="{{ $supplier->alamat }}" />
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
                                    <label class="col-lg-2">Kecepatan Pengiriman</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                                    </div>
                                                    <input type="text" name="kecpengiriman"  class="form-control" placeholder="" required="1"  value="{{ $supplier->kecpengiriman }}" />
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
                                <label class="col-lg-2">Tingkat Diskon</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                                </div>
                                                <input type="text" name="tdiskon"  class="form-control" placeholder="" required="1"  value="{{ $supplier->tdiskon }}" />
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
                            <label class="col-lg-2">Pelayanan</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                            </div>
                                            <input type="text" name="pelayanan"  class="form-control" placeholder="" required="1"  value="{{ $supplier->pelayanan }}" />
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
                        <label class="col-lg-2">Garansi</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                        </div>
                                        <input type="text" name="garansi"  class="form-control" placeholder="" required="1"  value="{{ $supplier->garansi }}" />
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
                    <label class="col-lg-2">Keaslian Barang</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                    </div>
                                    <input type="text" name="keaslian"  class="form-control" placeholder="" required="1"  value="{{ $supplier->keaslian }}" />
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
                <label class="col-lg-2">Tempo Pembayaran</label>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                </div>
                                <input type="text" name="tpembayaran"  class="form-control" placeholder="" required="1"  value="{{ $supplier->tpembayaran }}" />
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
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href="" class="btn btn-dark">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection