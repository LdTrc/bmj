@extends('main')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
  

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of Product Units</h6>
                </div>

                <div class="card">
                    <div class="card-body">
                    @if (session()->has('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{ session('sukses') }}
                        </div>
                    @endif
                        <div class="d-flex align-items-center">

                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center ">No</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center ">Nama Satuan</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center ">Action</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center "></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $index => $units)
                                        <tr>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14 text-center">{{ $index + 1 }}</td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14 text-center">{{  $units->satuan }}</td>
                                            <td class="border-top-0 text-center text-muted px-2 py-4  text-center">
                                                <a class="btn btn-warning btn-sm" href="/editunits/{{ $units->id }}" >Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{-- {{ $units->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection