@extends('layouts.app')
@section('content')
<h2>Consolidated Orders</h2>

<div class="row">
    <div class="col-md-8"> Total: {{$consolidatedorders->total()}}</div>
    <div class="col-md-4"><a class="btn btn-primary btn-md" href="/export-consolidated-orders">Export</a></div>
</div>

<br />

<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Order Status</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tfoot class="table-dark">
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Order Status</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $no = 1; ?>
            @foreach($consolidatedorders as $order)
            <tr>
                <td>{{$no}}</td>
                <td>{{$order->customer_name}}</td>
                <td>{{$order->order_date}}</td>
                <td>₦{{number_format($order->total_amount)}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->product_name}}</td>
                <td>₦{{number_format($order->price)}}</td>
                <td>
                    {{$order->quantity}}
                </td>

            </tr>
            <?php $no++; ?>
            @endforeach


        </tbody>


    </table>
    <div class="d-flex justify-content-center mt-3">
        {{$consolidatedorders->links()}}
    </div>


</div>

<br />

@endsection