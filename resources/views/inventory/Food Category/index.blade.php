@extends('layouts.admin',['page' => 'category', 'pageSlug' => 'category', 'section' => 'inventory'])
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Food Category</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">New Category</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table table-striped shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>ID</th>
                            <th>Name</th>
                            {{-- <th>Slug</th> --}}
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        {{-- <td>{{ $category->slug }}</td> --}}
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                            <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $category->id }}').submit();
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
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
