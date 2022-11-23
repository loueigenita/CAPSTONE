@extends('layouts.admin', ['page' => 'Receipts', 'pageSlug' => 'receipts', 'section' => 'inventory'])

@section('content')
    @include('alerts.success')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                        <h4 class="card-title">Receipts</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('receipts.create') }}" class="btn btn-sm btn-primary">New Receipt</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table table-striped table-bordered shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>Date</th>
                            <th>Title</th>
                            <th>Provider</th>
                            <th>Products</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($receipts as $receipt)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($receipt->created_at)) }}</td>
                                    <td style="max-width:150px">{{ $receipt->title }}</td>
                                    <td>
                                        @if($receipt->provider_id)
                                            <a href="{{ route('providers.show', $receipt->provider) }}">{{ $receipt->provider->name }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $receipt->products->count() }}</td>
                                    <td>{{ $receipt->products->sum('stock') }}</td>
                                    <td>{{ $receipt->products->sum('stock_defective') }}</td>
                                    <td>
                                        @if($receipt->finalized_at)
                                            FINALIZED
                                        @else
                                            <span style="color:red; font-weight:bold;">TO FINALIZE</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($receipt->finalized_at)
                                            <a href="{{ route('receipts.show', ['receipt' => $receipt]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver Receipt">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('receipts.show', ['receipt' => $receipt]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit Receipt">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endif
                                        <form action="{{ route('receipts.destroy', $receipt) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Receipt" onclick="confirm('Estás seguro que quieres eliminar este recibo? Todos sus registros serán eliminados permanentemente, si ya está finalizado el stock de los productos permanecerán.') ? this.parentElement.submit() : ''">
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
                    {{ $receipts->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection
