@extends('layouts.admin', ['page' => 'Category Information', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Category Information</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                    <table class="table table-striped shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Products</th>
                            <th>Stocks</th>
                            <th>Stocks Faulty</th>
                            <th>Average Price</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->products->count() }}</td>
                                <td>{{ $category->products->sum('stock') }}</td>
                                <td>{{ $category->products->sum('stock_defective') }}</td>
                                <td>{{ round($category->products->avg('price'), 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Products: {{ $products->count() }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                    <table class="table table-striped shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>ID</th>
                            <th>Description</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Base price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->stock_defective }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection