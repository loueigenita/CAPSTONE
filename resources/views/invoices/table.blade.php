<div class="card-body">
    <table class="table table-striped table-bordered shadow text-center">
        <thead class=" bg-dark text-light">
                <tr>
                    <th>Invoice No.</th>
                    <th>Customer's Name</th>
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
                       <div>
                         <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                         <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>

                         <a href="#" data-toggle="modal" data-target="#deleteInvoiceModal{{ $invoice->id }}" class="btn btn-danger btn-sm btnDelete"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                @include('invoices.delete')
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
    </div>
