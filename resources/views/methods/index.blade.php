@extends('layouts.admin', ['page' => 'Methods', 'pageSlug' => 'methods', 'section' => 'methods'])

@section('content')
    @include('alerts.success')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Bank Accounts / Payment Methods</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('methods.create') }}" class="btn btn-sm btn-primary">New Method</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table table-striped table-bordered shadow text-center">
                            <thead class=" bg-dark text-light">
                                <th scope="col">Method</th>
                                <th scope="col">Description</th>
                                <th scope="col">Monthly Transactions</th>
                                <th scope="col">Monthly Balance</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($methods as $method)
                                    <tr>
                                        <td>{{ $method->name }}</td>
                                        <td>{{ $method->description }}</td>
                                        <td>{{ $method->transactions->count() }}</td>
                                        <td>{{ $method->transactions->sum('amount') }}</td>
                                        <td>
                                            <a href="{{ route('methods.show', $method) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('methods.edit', $method) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Delete Method">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('methods.destroy', $method) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Method" onclick="confirm('Are you sure you want to remove this method? The payment records will not be deleted.') ? this.parentElement.submit() : ''">
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
                        {{ $methods->links() }}
                    </nav>
                </div>
            </div>
    </div>
@endsection
