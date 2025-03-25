@extends('layouts.app')
@section('content')
<h2>Products</h2>

<div class="row">
    <div class="col-md-8"> Total: {{$orders->total()}}</div>
    <div class="col-md-4"><a class="btn btn-primary btn-md" href="/order/generate">Generate more
            Orders</a></div>
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
                <th>Status</th>
                <th>Total Amount</th>
                <th>Details</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tfoot class="table-dark">
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Details</th>
                <th>Order Date</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $no = 1; ?>
            @foreach($orders as $orders)
            <tr>
                <td>{{$no}}</td>
                <td>{{$orders->name}}</td>
                <td>{{$orders->status}}</td>
                <td>₦{{number_format($orders->total_amount)}}</td>
                <td></td>
                <td>{{$orders->created_at}}</td>
            </tr>
            <?php $no++; ?>
            @endforeach


        </tbody>


    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $orders->links() }}
    </div>


</div>

<br />

@endsection