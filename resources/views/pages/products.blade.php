@extends('layouts.app')
@section('content')
<h2>Products</h2>

<div class="row">
    <div class="col-md-8"> Total: {{$products->total()}}</div>
    <div class="col-md-4"><a class="btn btn-primary btn-md" href="/product/generate">Generate more
            Products</a></div>
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
                <th>Name</th>
                <th>Sku</th>
                <th>Price</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tfoot class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Sku</th>
                <th>Price</th>
                <th>Created At</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $no = 1; ?>
            @foreach($products as $product)
            <tr>
                <td>{{$no}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->sku}}</td>
                <td>₦{{number_format($product->price)}}</td>
                <td>{{$product->created_at}}</td>
            </tr>
            <?php $no++; ?>
            @endforeach


        </tbody>


    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>


</div>

<br />

@endsection