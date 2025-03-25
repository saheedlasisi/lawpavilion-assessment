@extends('layouts.app')
@section('content')
<h2>Customers</h2>

<div class="row">
    <div class="col-md-8"> Total: {{$customers->total()}}</div>
    <div class="col-md-4"><a class="btn btn-primary btn-md" href="/customer/generate">Generate more
            Customer</a></div>
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
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tfoot class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $no = 1; ?>
            @foreach($customers as $customer)
            <tr>
                <td>{{$no}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->created_at}}</td>
            </tr>
            <?php $no++; ?>
            @endforeach


        </tbody>


    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $customers->links() }}
    </div>


</div>

<br />

@endsection