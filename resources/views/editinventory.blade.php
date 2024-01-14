@extends('main')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">Register Products</h1> --}}

    <div class="row">

        <div class="col-lg-12">
            <h6>Warranty List</h6>
            <table class="table no-wrap v-middle mb-0">
                <thead>
                    <tr class="border-0">
                        <th class="border-0 font-14 font-weight-medium text-muted">Quantity</th>
                        <th class="border-0 font-14 font-weight-medium text-muted">Warranty</th>
                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Order Date</th>
                        <th class="border-0 font-14 font-weight-medium text-muted">Warranty End Date</th>      
                        <th class="border-0 font-14 font-weight-medium text-muted">Warranty Status</th>                           
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach ($warranties as $warranty )
                    <tr>
                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $warranty->quantity }}</td>
                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $warranty->warranty }}</td>
                        <td class="border-top-0 px-2 py-4">{{  $warranty->order_date }}</td>
                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $warranty->endDate }}</td>
                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{  $warranty->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection