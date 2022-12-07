@extends('layouts.admin', ['page' => 'item', 'pageSlug' => 'item', 'section' => 'inventory'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Food Items</h4>
                    </div>
                    <div class="col-4 text-right">

                        @empty($categories->count() == 0)
                        <a href="{{ route('item.create') }}" class="btn btn-sm btn-primary">New Item</a>
                        @else
                        <a href="#" id="btn" class="btn btn-sm btn-primary">New Item</a>
                        @endempty
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table table-striped shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($items as $key=>$item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('item.edit',$item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                            <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy',$item->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $item->id }}').submit();
                                            }else {
                                                event.preventDefault();
                                                    }"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <div class="d-flex justify-content-end">
                    {{ $items->links() }}
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
