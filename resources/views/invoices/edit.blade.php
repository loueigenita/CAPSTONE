@extends('layouts.admin',['page' => 'Invoices', 'pageSlug' => 'invoices'])
@section('content')

<form action="{{route('invoices.update', $invoice)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <label><h3>Name: {{ $invoice->client }}</h3></label>
        <div class="form-group w-100">
          <label for="due_date">Due Date:</label>
          <input type="text" class="form-control" name="due_date" id="due_date" value="{{ $invoice->due_date }}">
        </div>
      </div>
      <div class="row">
          <div class="form-group w-100">
            <label for="product_price">Price:</label>
            <input type="text" class="form-control" name="product_price" id="product_price" value="{{ $invoice->product_price }}">
          </div>
      </div>
      <div class="row">
        <div class="form-group w-100">
          <label for="product_qty">Quantity:</label>
          <input type="text" class="form-control" name="product_qty" id="product_qty" value="{{ $invoice->product_qty }}">
        </div>
        <div class="row">
            <div class="form-group w-100">
                <label for="status"> Status: </label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ old('status', $invoice->status ) === 1 ? 'selected' : '' }}>Paid</option>
                    <option value="0" {{ old('status', $invoice->status ) === 0 ? 'selected' : '' }}>Not Paid</option>
                </select>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Edit Invoice</button>
            </div>
    </div>
</div>
</div>
</div>
</form>


@endsection
