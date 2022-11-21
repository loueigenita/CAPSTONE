@extends('layouts.admin', ['page' => 'Invoices', 'pageSlug' => 'invoices'])
@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">New Invoice</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('invoices.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('invoices.store') }}" autocomplete="off">
                            @csrf
z
                            <h6 class="heading-small text-muted mb-4">Invoice Information</h6>
                            <div class="pl-lg-4">
                                <label for=""> Customer Name: </label>

                                <div class="col">
                                    <select id="client" name="client" class="form-control">
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->name }}">
                                                {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col">
                                    <label for=""> Invoice No: </label>
                                    <input type="text" name="invoice_no"
                                        class="form-control @error('invoice_no') is-invalid @enderror">
                                    @error('invoice_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for=""> Transaction Date: </label>
                                    <input type="date" name="invoice_date"
                                        class="form-control @error('invoice_date') is-invalid @enderror">
                                    @error('invoice_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for=""> Due Date: </label>
                                    <input type="date" name="due_date"
                                        class="form-control @error('due_date') is-invalid @enderror">
                                    @error('due_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for=""> Address: </label>
                                    <input type="" name="client_address"
                                        class="form-control @error('client_address') is-invalid @enderror">
                                    @error('client_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <footer>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for=""> Product: </label>
                                            <select type="text" id="product_name" name="product_name"
                                                class="form-control @error('product_name') is-invalid @enderror">
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3">
                                            <label for=""> Quantity: </label>
                                            <input type="text" name="product_qty"
                                                class="form-control @error('product_qty') is-invalid @enderror">
                                            @error('product_qty')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3">
                                            <label for=""> Price: </label>
                                            <input type="text" name="product_price"
                                                class="form-control @error('product_price') is-invalid @enderror"
                                                placeholder="₱">
                                            @error('product_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-3">
                                            <label for=""> Status: </label>
                                            <select name="status" id="status"
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>Not Paid
                                                </option>
                                                <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>Paid
                                                </option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-success">
                                    Create Invoice
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
