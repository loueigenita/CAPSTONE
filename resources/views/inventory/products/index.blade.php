@extends('layouts.admin', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ action('App\Http\Controllers\ProductController@productPDF', $products)}}"  class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>

                            @empty($categories->count() == 0)
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">New product</a>
                            @else
                            <a href="#" id="btn" class="btn btn-sm btn-primary">New product</a>
                            @endempty
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table table-striped shadow text-center">
                            <thead class=" bg-dark text-light">
                                <th scope="col">Category</th>
                                <th scope="col">Product</th>
                                <th scope="col">Base Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Faulty</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><a href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->stock_defective }}</td>
                                        <td>
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
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
                    <div class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
     <script>

        $('#btn').on('click',function () {
            Swal.fire({
                icon: 'info',
                type: 'success',
                title: 'Opps Sorry!',
                text: 'No Category Available, Please Create Category First'
            })
        });

</script>
@endsection
