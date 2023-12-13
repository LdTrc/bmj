@extends('main')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">List Supplier</h1> --}}

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List Supplier</h6>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if (session()->has('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{ session('sukses') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Name</th>
                                      
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Contact</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Address</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center" colspan="2">Action</th>
                                        <!-- Hanya admin yang boleh edit -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplier as $supplier)
                                        <tr>
                                            <td class="border-top-0 px-2 py-4">{{  $supplier->nama }}</td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $supplier->telp }}</td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $supplier->alamat }}</td>
                                            
                                            
                                            <!-- Hanya admin yang boleh melakukan aksi pada data -->
                                            <td class="border-top-0 text-center text-muted px-2 py-4">
                                                <a class="btn btn-warning btn-sm" href="/editsupplier/{{ $supplier->id }}" >Edit</a>
                                                
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
                        </div>
                    </div>
                                        {{-- <div class="row d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination"><li class="page-item active"><a href="#" class="page-link">1<span class="sr-only">(current)</span></a></li><li class="page-item"><a href="" class="page-link" data-ci-pagination-page="2">2</a></li><li class="page-item"><a href="" class="page-link" data-ci-pagination-page="2" rel="next">&raquo</a></li></ul>                        </nav>
                        </div>
                                </div> --}}
            </div>
        
        </div>
    </div>
</div>

@endsection