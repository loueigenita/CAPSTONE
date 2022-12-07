
@extends('layouts.admin',['page' => 'Invoices', 'pageSlug' => 'invoices'])
@section('css')
<link rel="stylesheet" href="sweetalert2.min.css">
<link rel="stylesheet" href="{{asset('assets/demo.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Invoices</h4>
                    </div>
                    <div class="col-4 text-right">
                        @empty($clients->count() == 0)
                        <a href="{{ route('invoices.create') }}" class="btn btn-sm btn-primary">Add Invoice</a>
                            @else
                            <a href="#" id="btn" class="btn btn-sm btn-primary">Add Invoice</a>

                        @endempty
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="table-full-width table-responsive">
                        <table class="table table-striped shadow text-center">
                            <thead class=" bg-dark text-light">
                                    <tr>
                                        <th>Invoice No.</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Transaction</th>
                                        <th>Due</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                                    @foreach ($invoices as $invoice)
                    
                                    <tr>
                                        <td>{{ $invoice->invoice_no }}</td>
                                        <td>{{ $invoice->client }}</td>
                                        <td>{{ $invoice->client_address }}</td>
                                        <td>{{ $invoice->invoice_date }}</td>
                                        <td>{{ $invoice->due_date }}</td>
                                        <td>{{ $invoice->product_name }}</td>
                                        <td>₱{{ number_format($invoice->product_price, 2) }}</td>
                                        <td>{{ $invoice->product_qty }}</td>
                                        <td>₱{{ number_format($invoice->total, 2) }}</td>
                                        <td>
                                            <span class="right badge badge-{{$invoice->status ? 'success' : 'danger'}}">{{ $invoice->status ? 'Paid' : 'Not Paid' }}</span>
                                        </td>
                                        <td>
                                           
                                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#deleteInvoiceModal{{ $invoice->id }}" class="btn btn-danger btn-sm btnDelete"><i class="fas fa-trash"></i></a>
                                                <a href="{{ action('App\Http\Controllers\InvoiceController@generatePDF', $invoice->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                                            
                                        </td>
                                    </tr>
                                    @include('invoices.delete')
                                    @endforeach
                    
                                </tbody>
                            </table>
                        </div>
                        </div>
                        </div>

        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->



@endsection
@section('js')
<script src="sweetalert2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $('#btn').on('click', function () {
        Swal.fire({
            icon:'info',
            title:"Opps!",
            text:"No Client Available!",
        })
    });
    </script>

@endsection
