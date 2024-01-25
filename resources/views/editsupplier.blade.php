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
                                                    <select class="form-control" name="kecpengiriman" id="">
                                                        <option value="0" {{ $supplier->kecpengiriman == 0 ? 'selected' : '' }}>0 - Sangat Rendah</option>
                                                        <option value="0.25" {{ $supplier->kecpengiriman == 0.25 ? 'selected' : '' }}>0.25 - Rendah</option>
                                                        <option value="0.5" {{ $supplier->kecpengiriman == 0.5 ? 'selected' : '' }}>0.5 - Tengah</option>
                                                        <option value="0.75" {{ $supplier->kecpengiriman == 0.75 ? 'selected' : '' }}>0.75 - Tinggi</option>
                                                        <option value="1" {{ $supplier->kecpengiriman == 1 ? 'selected' : '' }}>1 - Sangat Tinggi</option>
                                                    </select>
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
                                                <select class="form-control" name="tdiskon" id="">
                                                    <option value="0" {{ $supplier->tdiskoon == 0 ? 'selected' : '' }}>0 - Sangat Rendah</option>
                                                    <option value="0.25" {{ $supplier->tdiskoon == 0.25 ? 'selected' : '' }}>0.25 - Rendah</option>
                                                    <option value="0.5" {{ $supplier->tdiskoon == 0.5 ? 'selected' : '' }}>0.5 - Tengah</option>
                                                    <option value="0.75" {{ $supplier->tdiskoon == 0.75 ? 'selected' : '' }}>0.75 - Tinggi</option>
                                                    <option value="1" {{ $supplier->tdiskoon == 1 ? 'selected' : '' }}>1 - Sangat Tinggi</option>
                                                </select>    
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
                                            <select class="form-control" name="pelayanan" id="">
                                                <option value="0" {{ $supplier->pelayanan == 0 ? 'selected' : '' }}>0 - Sangat Rendah</option>
                                                <option value="0.25" {{ $supplier->pelayanan == 0.25 ? 'selected' : '' }}>0.25 - Rendah</option>
                                                <option value="0.5" {{ $supplier->pelayanan == 0.5 ? 'selected' : '' }}>0.5 - Tengah</option>
                                                <option value="0.75" {{ $supplier->pelayanan == 0.75 ? 'selected' : '' }}>0.75 - Tinggi</option>
                                                <option value="1" {{ $supplier->pelayanan == 1 ? 'selected' : '' }}>1 - Sangat Tinggi</option>
                                            </select>    
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
                                        <select class="form-control" name="garansi" id="">
                                            <option value="0" {{ $supplier->garansi == 0 ? 'selected' : '' }}>0 - Sangat Rendah</option>
                                            <option value="0.25" {{ $supplier->garansi == 0.25 ? 'selected' : '' }}>0.25 - Rendah</option>
                                            <option value="0.5" {{ $supplier->garansi == 0.5 ? 'selected' : '' }}>0.5 - Tengah</option>
                                            <option value="0.75" {{ $supplier->garansi == 0.75 ? 'selected' : '' }}>0.75 - Tinggi</option>
                                            <option value="1" {{ $supplier->garansi == 1 ? 'selected' : '' }}>1 - Sangat Tinggi</option>
                                        </select>    
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
            {{-- <div class="form-group">
                <div class="row">
                    <label class="col-lg-2">Keaslian Barang</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                    </div>
                                    <select class="form-control" name="keaslian" id="">
                                        <option value="0" {{ $supplier->keaslian == 0 ? 'selected' : '' }}>0 - Sangat Rendah</option>
                                        <option value="0.25" {{ $supplier->keaslian == 0.25 ? 'selected' : '' }}>0.25 - Rendah</option>
                                        <option value="0.5" {{ $supplier->keaslian == 0.5 ? 'selected' : '' }}>0.5 - Tengah</option>
                                        <option value="0.75" {{ $supplier->keaslian == 0.75 ? 'selected' : '' }}>0.75 - Tinggi</option>
                                        <option value="1" {{ $supplier->keaslian == 1 ? 'selected' : '' }}>1 - Sangat Tinggi</option>
                                    </select>    
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-12">
                        </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                                <select class="form-control" name="tpembayaran" id="">
                                    <option value="0" {{ $supplier->tpembayaran == 0 ? 'selected' : '' }}>0 - Sangat Rendah</option>
                                    <option value="0.25" {{ $supplier->tpembayaran == 0.25 ? 'selected' : '' }}>0.25 - Rendah</option>
                                    <option value="0.5" {{ $supplier->tpembayaran == 0.5 ? 'selected' : '' }}>0.5 - Tengah</option>
                                    <option value="0.75" {{ $supplier->tpembayaran == 0.75 ? 'selected' : '' }}>0.75 - Tinggi</option>
                                    <option value="1" {{ $supplier->tpembayaran == 1 ? 'selected' : '' }}>1 - Sangat Tinggi</option>
                                </select>    
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