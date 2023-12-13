@extends('main')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Units</h1>

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of Product Units</h6>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">

                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center px-2">Nama Satuan</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center"></th>
                                        <!-- Hanya admin yang boleh edit -->
                                                                                <th class="border-0 font-14 font-weight-medium text-muted text-center"></th>
                                                                        </tr>
                                </thead>
                                <tbody>
                                                                        <tr>
                                            <td class="border-top-0 px-2 py-4 text-center">Kardus</td>
                                            
                                            <!-- Hanya admin yang boleh melakukan aksi pada data -->
                                                                                        <td class="border-top-0 text-center text-muted px-2 py-4">
                                                    <a href="" class="btn btn-sm">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                </td>
                                                                                </tr>
                                                                        <tr>
                                            <td class="border-top-0 px-2 py-4 text-center">Sachet</td>
                                            
                                            <!-- Hanya admin yang boleh melakukan aksi pada data -->
                                                                                        <td class="border-top-0 text-center text-muted px-2 py-4">
                                                    <a href="" class="btn btn-sm">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                </td>
                                                                                </tr>
                                                                        <tr>
                                            <td class="border-top-0 px-2 py-4 text-center">Ons</td>
                                            
                                                                                        <td class="border-top-0 text-center text-muted px-2 py-4">
                                                    <a href="" class="btn btn-sm">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                </td>
                                                                                </tr>
                                                                        <tr>
                                            <td class="border-top-0 px-2 py-4 text-center">Kilo gram</td>
                                            
                                            <!-- Hanya admin yang boleh melakukan aksi pada data -->
                                                                                        <td class="border-top-0 text-center text-muted px-2 py-4">
                                                    <a href="" class="btn btn-sm">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                </td>
                                                                                </tr>
                                                                        <tr>
                                            <td class="border-top-0 px-2 py-4 text-center">Bungkus</td>
                                            
                                                                                        <td class="border-top-0 text-center text-muted px-2 py-4">
                                                    <a href="" class="btn btn-sm">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                </td>
                                                                                </tr>
                                                                </tbody>
                            </table>
                        </div>
                    </div>


                    
                                        <div class="row d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination"><li class="page-item active"><a href="#" class="page-link">1<span class="sr-only">(current)</span></a></li><li class="page-item"><a href="" class="page-link" data-ci-pagination-page="2">2</a></li><li class="page-item"><a href="" class="page-link" data-ci-pagination-page="2" rel="next">&raquo</a></li></ul>                        </nav>
                        </div>
                                </div>
            </div>

        </div>
    </div>
</div>

@endsection