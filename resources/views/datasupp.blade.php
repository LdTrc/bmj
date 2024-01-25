@extends('main')
@section('container')

<!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              
            </div> --}}
            

            <!-- Content Row -->
            <div class="row">
              {{-- <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-2 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PRODUCTS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-2 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">SUPPLIER</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                          </div>
                          <div class="col">
                            <div class="progress progress-sm mr-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}

            <!-- Content Row -->

            <!-- Begin Page Content -->
            <div class="container-fluid">    
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <div class="row">
                      <div class="col-2">
                          <h6 class="mt-3 font-weight-bold text-primary">Best Supplier</h6>
                      </div>
                      <div class="col-10">
                          <form action="/datasupp" method="get">
                              <div class="input-group">
                                  <input name="cari" id="cari" class="form-control bg-white" style="width: 260px; margin-left: 410px;" type="text" placeholder="Search" aria-label="Search" value="">
                                  <button class="btn btn-primary ml-3" type="submit">Search</button>
                                  <a class="btn btn-success ml-3" href="/cetakbestsupp">Print</a>
                              </div>
                          </form>
                      </div>
                  </div>
                      {{-- <h6 class="m-0 font-weight-bold text-primary">Recommendation</h6>
                      <div class="col-8">
                        <form action="/listsupplier">
                            <div class="input-group">
                                <input name="cari" id="cari" class="form-control bg-white" style="width: 260px; margin-left: 410px;" type="text" placeholder="Search" aria-label="Search" value="">
                                <button class="btn btn-primary ml-3" type="submit">Search</button>
                            </div>
                        </form>
                        
                    </div> --}}
                  </div>
                  <br>
                  {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                   --}}
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th >Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Location</th>
                                    <th>Delivery</th>
                                    <th>Discount</th>
                                    <th>Warranty</th>
                                    {{-- <th>Class</th> --}}
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($hasilRekomendasi as $nama => $skorTotal)
                                    <tr>
                                      <th class="text-left">{{ $nama + 1 }}</th>
                                      <th>
                                        {{ $skorTotal->namasupp ?? '' }}
                                       
                                    </th>  
                                      <th>{{ $skorTotal->notelp ?? '' }}</th>
                                      <th>{{ $skorTotal->alamat ?? '' }}</th>
                                      <th>{{ $skorTotal->kota ?? '' }}</th>
                                      <th>
                                        {{-- {{ $skorTotal->lokasi ?? '' }} --}}
                                        @if($skorTotal->lokasi == 1)
                                        Dalam Kota
                                    @elseif($skorTotal->lokasi == 0.5)
                                        Luar Kota
                                    @elseif($skorTotal->lokasi == 0)
                                        Luar Pulau
                                    @endif
                                      </th>
                                      <th>
                                        {{-- {{ $skorTotal->pengiriman ?? '' }} --}}
                                        @if($skorTotal->pengiriman == 1)
                                        Cepat
                                    @elseif($skorTotal->pengiriman == 0.5)
                                        Sedang
                                    @elseif($skorTotal->pengiriman == 0)
                                        Lama
                                    @endif  </th>
                                      <th>
                                        {{-- {{ $skorTotal->diskon ?? '' }} --}}
                                        @if($skorTotal->diskon == 1)
                                        Tinggi
                                    @elseif($skorTotal->diskon == 0.5)
                                        Rendah
                                    @endif 
                                  </th>
                                      <th>
                                        {{-- {{ $skorTotal->garansi ?? '' }} --}}
                                        @if($skorTotal->garansi == 1)
                                                    Ada
                                                @elseif($skorTotal->garansi == 0.5)
                                                    Tidak
                                                @endif
                                      </th>
                                      {{-- <th>{{ $skorTotal->Class ?? '' }}</th> --}}
                                    </tr>
                                @endforeach
                              </tbody>
                          </table>
                          <div class="d-flex justify-content-center">
                            {{-- {{ $suppliers->links() }} --}}
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        </div></div>
          <!-- /.container-fluid -->
          {{-- {{ $suppliers->links() }} --}}

          @endsection