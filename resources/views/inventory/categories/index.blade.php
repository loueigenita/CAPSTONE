@extends('layouts.admin', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Categories</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ action('App\Http\Controllers\ProductCategoryController@categoryPDF', $categories)}}"  class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>

                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">New Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table table-striped shadow text-center">
                            <thead class=" bg-dark text-light">
                                <th scope="col">Name</th>
                                <th scope="col">Products</th>
                                <th scope="col">Total Stock</th>
                                <th scope="col">Defective Stock</th>
                                <th scope="col">Average Price of Product</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ count($category->products) }}</td>
                                        <td>{{ $category->products->sum('stock') }}</td>
                                        <td>{{ $category->products->sum('stock_defective') }}</td>
                                        <td>{{ $category->products->avg('price')}}</td>
                                        <td>
                                            <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit Category">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Category" onclick="confirm('Are you sure you want to delete this category? All products belonging to it will be deleted and the records that contain it will not be accurate.') ? this.parentElement.submit() : ''">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $categories->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
