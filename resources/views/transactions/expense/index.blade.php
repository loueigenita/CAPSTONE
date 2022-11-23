@extends('layouts.admin', ['page' => 'Expenses', 'pageSlug' => 'expenses', 'section' => 'transactions'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Expenses</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('transactions.create', ['type' => 'expense']) }}" class="btn btn-sm btn-primary">Register Expense</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table table-striped table-bordered shadow text-center">
                            <thead class=" bg-dark text-light">
                                <th scope="col">Date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Method</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Reference</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td> {{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                                        <td> {{ $transaction->title }}</td>
                                        <td><a href="{{ route('methods.show', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->reference }}</td>
                                        <td>
                                            @if ($transaction->sale_id)
                                                <a href="{{ route('sales.show', $transaction->sale_id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit Transaction">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('transactions.destroy', $transaction) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Transaction" onclick="confirm('Are you sure you want to delete this transaction? There will be no record left.') ? this.parentElement.submit() : ''">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $transactions->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
