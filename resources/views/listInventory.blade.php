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
                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Product Name</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Supplier</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Quantity</th>
                                <th class="border-0 font-14 font-weight-medium text-muted">Sell Price</th>                                
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($inventories as $inventory )
                            <tr>
                                <td class="border-top-0 px-2 py-4">{{  $inventory->product->namabarang }}</td>
                                <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $inventory->product->supplier?->nama }}</td>
                                <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $inventory->quantity }}</td>
                                <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $inventory->sell_price }}</td>
                                <!-- Hanya admin yang boleh melakukan aksi pada data -->
                                <td class="border-top-0 text-center text-muted px-2 py-4">
                                    {{-- <button class="btn btn-warning btn-sm" type="submit">Edit</button> --}}
                                    <a class="btn btn-warning btn-sm" href="/editinventory/{{ $inventory->id }}">Edit</a>
                                </td>
                            </tr>
                            
                        @endforeach
                               
                          
                            
                        </tbody>
                    </table>
                   
                    
                </div>
                
            </div>

            @if ($notificationCount != 0)
                <h5>Notif</h5>
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <table class="table no-wrap v-middle mb-0">
                            <thead>
                                <tr class="border-0">
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Product Name</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Quantity</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Order Date</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Warranty End Date</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Days Left</th>                                
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach ($notifications as $notif )
                                <tr>
                                    <td class="border-top-0 px-2 py-4">{{  $notif["productName"] }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $notif["quantity"] }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $notif["order_date"] }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $notif["endDate"] }}</td>
                                    <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $notif["days_left"] }}</td>
                                </tr>
                                
                            @endforeach
                                   
                              
                                
                            </tbody>
                        </table>
                       
                        
                    </div>
                    
                </div>
            @endif
            
        </div>
    </div>


    </div>

</div>
<!-- /.container-fluid -->
@endsection