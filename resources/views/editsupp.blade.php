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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Supplier</h6>
                </div>
                <div class="card-body">
                   
                    <form action="{{ route('datasupp.update', $datasupp->id) }}" method="POST">
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
                                                    <input type="text" name="namasupp" value="{{ $datasupp->namasupp }}"  class="form-control" required="1" placeholder="" />
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
                                                    <input type="text" name="notelp" value="{{ $datasupp->notelp }}"  class="form-control" placeholder="" required="1" />
                                                </div>
                                                @error('notelp')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                    <input type="text" name="alamat" value="{{ $datasupp->alamat }}"  class="form-control" placeholder="" required="1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">City</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-address-card"></i></label>
                                                    </div>
                                                    <input type="text" name="kota" value="{{ $datasupp->kota }}"  class="form-control" placeholder="" required="1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Lokasi</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-clock-o"></i></label>
                                                    </div>
                                                    {{-- <input type="text" name="kecpengiriman" value="{{ old('kecpengiriman') }}"  class="form-control" placeholder="" required="1" /> --}}
                                                    <select class="form-control" name="lokasi" id="">
                                                        <option value="1" {{ $datasupp->lokasi == 1 ? 'selected' : '' }}>Dalam Kota</option>
                                                        <option value="0.5" {{ $datasupp->lokasi == 0.5 ? 'selected' : '' }}>Luar Kota</option>
                                                        <option value="0" {{ $datasupp->lokasi == 0 ? 'selected' : '' }}>Luar Pulau</option>
                                                    </select>
                                                </div>
                                                @error('lokasi')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Pengiriman</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-clock-o"></i></label>
                                                    </div>
                                                    {{-- <input type="text" name="kecpengiriman" value="{{ old('kecpengiriman') }}"  class="form-control" placeholder="" required="1" /> --}}
                                                    <select class="form-control" name="pengiriman" id="">
                                                        <option value="0" {{ $datasupp->pengiriman == 0 ? 'selected' : '' }}>Lama</option>
                                                        <option value="0.5" {{ $datasupp->pengiriman == 0.5 ? 'selected' : '' }}>Sedang</option>
                                                        <option value="1" {{ $datasupp->pengiriman == 1 ? 'selected' : '' }}>Cepat</option>
                                                    </select>
                                                </div>
                                                @error('pengiriman')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Diskon</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-minus-square"></i></label>
                                                    </div>
                                                    {{-- <input type="text" name="tdiskon" value="{{ old('tdiskon') }}"  class="form-control" placeholder="" required="1" /> --}}
                                                    <select class="form-control" name="diskon" id="">
                                                        <option value="1" {{ $datasupp->diskon == 1 ? 'selected' : '' }}>Tinggi</option>
                                                        <option value="0.5" {{ $datasupp->diskon == 0.5 ? 'selected' : '' }}>Rendah</option>
                                                    </select>
                                                </div>
                                                @error('diskon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-check-circle"></i></label>
                                                    </div>
                                                    {{-- <input type="text" name="garansi" value="{{ old('garansi') }}"  class="form-control" placeholder="" required="1" /> --}}
                                                    <select class="form-control" name="garansi" id="">
                                                        <option value="1" {{ $datasupp->garansi == 1 ? 'selected' : '' }}>Ada</option>
                                                        <option value="0.5" {{ $datasupp->garansi == 0.5 ? 'selected' : '' }}>Tidak</option>
                                                    </select>
                                                </div>
                                                @error('garansi')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-cubes"></i></label>
                                                    </div>
                                                    
                                                    <select class="form-control" name="keaslian" id="">
                                                        <option value="0">0 - Sangat Rendah</option>
                                                        <option value="0.25">0.25 - Rendah</option>
                                                        <option value="0.5">0.5 - Tengah</option>
                                                        <option value="0.75">0.75 - Tinggi</option>
                                                        <option value="1">1 - Sangat Tinggi</option>
                                                    </select>
                                                </div>
                                                @error('keaslian')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}


                            {{-- <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Class</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-money"></i></label>
                                                    </div>
                                                    <select class="form-control" name="class" id="">
                                                        <option value="1">Pilih</option>
                                                        <option value="0.5">Tidak Pilih</option>
                                                    </select>
                                                </div>
                                                @error('class')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info" >Submit</button>
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