@extends('main')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
 

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Units</h6>
                </div>

                <div class="card-body">
                    
                    <form action="{{ route('units.update', $units->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2">Nama Satuan</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-box"></i></label>
                                                    </div>
                                                    <input type="text" name="satuan" value="{{ $units->satuan }}"  class="form-control" required="1" placeholder="Huruf kecil semua" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-12">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group mt-3">
                                    <div class="row">
                                        <label class="col-lg-2">Status Satuan</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-check-square"></i></label>
                                                        </div>
                                                        <input type="text" class="form-control" value="Valid" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
</div>
@endsection