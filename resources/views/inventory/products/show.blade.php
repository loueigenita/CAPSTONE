@extends('layouts.admin', ['page' => 'Product Information', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                    <table class="table table-striped table-bordered shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Base price</th>
                            <th>Average Price</th>
                            <th>Total sales</th>
                            <th>Income Produced</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><a href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->stock_defective }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->solds->avg('price')}}</td>
                                <td>{{ $product->solds->sum('qty') }}</td>
                                <td>{{ $product->solds->sum('total_amount') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Latest Sales</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                    <table class="table table-striped table-bordered shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>Date</th>
                            <th>Sale ID</th>
                            <th>Quantity</th>
                            <th>Price Unit</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($solds as $sold)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($sold->created_at)) }}</td>
                                    <td><a href="{{ route('sales.show', $sold->sale_id) }}">{{ $sold->sale_id }}</a></td>
                                    <td>{{ $sold->qty }}</td>
                                    <td>{{ $sold->price }}</td>
                                    <td>{{ $sold->total_amount }}</td>
                                    <td>
                                        <a href="{{ route('sales.show', $sold->sale_id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Sale">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Latest Receipts</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                    <table class="table table-striped table-bordered shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>Date</th>
                            <th>Receipt ID</th>
                            <th>Title</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Total Stock</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($receiveds as $received)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($received->created_at)) }}</td>
                                    <td><a href="{{ route('receipts.show', $received->receipt) }}">{{ $received->receipt_id }}</a></td>
                                    <td style="max-width:150px;">{{ $received->receipt->title }}</td>
                                    <td>{{ $received->stock }}</td>
                                    <td>{{ $received->stock_defective }}</td>
                                    <td>{{ $received->stock + $received->stock_defective }}</td>
                                    <td>
                                        <a href="{{ route('receipts.show', $received->receipt) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver Receipt">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
