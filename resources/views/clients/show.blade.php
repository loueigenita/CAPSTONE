@extends('layouts.admin', ['page' => 'Client Information', 'pageSlug' => 'clients', 'section' => 'clients'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Customer Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered shadow text-center">
                    <thead class=" bg-dark text-light">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Document No</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>Purchases</th>
                        <th>Total Payment</th>
                        <th>Last purchase</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->document_id }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->email }}</td>
                            <td>
                                @if ($client->balance > 0)
                                    <span class="text-success">{{ $client->balance }}</span>
                                @elseif ($client->balance < 0.0)
                                    <span class="text-danger">{{ $client->balance }}</span>
                                @else
                                    {{ $client->balance }}
                                @endif
                            </td>
                            <td>{{ $client->sales->count() }}</td>
                            <td>{{ $client->transactions->sum('amount') }}</td>
                            <td>{{ empty($client->sales) ? date('d-m-y', strtotime($client->sales->reverse()->first()->created_at)) : 'N/A' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Latest Transactions</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('clients.transactions.add', $client) }}" class="btn btn-sm btn-primary">New
                            Transaction</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered shadow text-center">
                    <thead class=" bg-dark text-light">
                        <th>ID</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        @foreach ($client->transactions->reverse()->take(25) as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                                <td><a
                                        href="{{ route('methods.show', $transaction->method) }}">{{ $transaction->method->name }}</a>
                                </td>
                                <td>{{ $transaction->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Latest Purchases</h4>
                    </div>
                    <div class="col-4 text-right">
                        <form method="post" action="{{ route('sales.store') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                            <button type="submit" class="btn btn-sm btn-primary">New Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered shadow text-center">
                    <thead class=" bg-dark text-light">
                        <th>ID</th>
                        <th>Date</th>
                        <th>products</th>
                        <th>Stock</th>
                        <th>Total Amount</th>
                        <th>State</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($client->sales->reverse()->take(25) as $sale)
                            <tr>
                                <td><a href="{{ route('sales.show', $sale) }}">{{ $sale->id }}</a></td>
                                <td>{{ date('d-m-y', strtotime($sale->created_at)) }}</td>
                                <td>{{ $sale->products->count() }}</td>
                                <td>{{ $sale->products->sum('qty') }}</td>
                                <td>{{ $sale->products->sum('total_amount') }}</td>
                                <td>{{ $sale->finalized_at ? 'FINISHED' : 'ON HOLD' }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('sales.show', $sale) }}" class="btn btn-sm btn-primary"
                                        data-toggle="tooltip" data-placement="bottom" title="More Details">
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
