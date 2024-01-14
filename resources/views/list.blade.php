@extends('main')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        {{-- <h1 class="h3 mb-0 text-gray-800">List Products</h1> --}}
    </div>
    <a class="nav-link" href="addinventory">
        <i class="fas fa-solid fa-bookmark"></i>
        <span>Add Product Inventory</span></a
      >
    <div class="row">
        <div class="col-lg-12">
           <div class="card shadow ">
            <div class="card-header py-3"> 
                <div class="row">
                    <div class="col-4">
                        <h6 class="mt-3 font-weight-bold text-primary">Data List</h6>
                    </div>
                    <div class="col-8">
                        <form action="/listproducts">
                            <div class="input-group">
                                <input name="cari" id="cari" class="form-control bg-white" style="width: 260px; margin-left: 410px;" type="text" placeholder="Search" aria-label="Search" value="">
                                <button class="btn btn-primary ml-3" type="submit">Search</button>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        
            {{-- <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">List Items</h6>
            </a> --}}
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
                                <th class="border-0 font-14 font-weight-medium text-muted">Quantity</th>
                                
                                <th class="border-0 font-14 font-weight-medium text-muted">Warranty</th>
                                
                                <th class="border-0 font-14 font-weight-medium text-muted">Order Date</th>
                                
                            </tr>
                            
                        </thead>
                        <tbody>
                          
                               
                          
                            
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