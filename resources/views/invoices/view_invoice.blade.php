@extends('layouts.admin',['page' => 'Invoices', 'pageSlug' => 'invoices'])
@section('content')


<div class="col-md-12">
  <div class="card ">
      <div class="card-header">
          <div class="row">
              <div class="col-8">
                  <h4 class="card-title">Invoice Information</h4>
              </div>
              <div class="col-4 text-right">
                <a href="{{ action('App\Http\Controllers\InvoiceController@generatePDF', $invoice->id)}}"  class="btn btn-warning btn-sm"><i class="fas fa-print"></i></a>
                <a href="{{ route('invoices.index') }}" class="btn btn-sm btn-primary">Back to List</a></div>
              
          </div>
      </div>

    <div class="container mt-3 shadow">
        <div class="brand-section">
            <div class="row">
              <div class="logo">
                <img src="../frontend/images/logo.png" class="brand-image img-circle elevation-4" height="100px" width="100px">
              </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white"> Mater Dei College</p>
                        <p class="text-white">Cabulijan, Tubigon, Bohol</p>
                        <p class="text-white"><i class="mdi mdi-email"> </i>materdeicollege@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <p class="sub-heading">Full Name: {{$invoice->client}}  </p>
                    <p class="sub-heading">Address: {{$invoice->client_address}} </p>
                </div>
                </div>
            </div>


        <div class="body-section">
            <h3 class="heading">Ordered Item</h3>
            <table class="table-bordered">
                <thead class="color text-center">
                    <tr>
                        <th>Invoice No</th>
                        <th>Product Name</th>
                        <th>Order Date</th>
                        <th>Due Date</th>
                        <th>Sub Total</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$invoice->invoice_no}}</td>
                        <td>{{$invoice->product_name}}</td>
                        <td>{{$invoice->invoice_date}}</td>
                        <td>{{$invoice->due_date}}</td>
                        <td>{{$invoice->product_price}}</td>
                        <td>{{$invoice->total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>
<style>
    body{
        background-color: #F6F6F6;
        margin: 0;
        padding: 0;
    }
    h1,h2,h3,h4,h5,h6{
        margin: 0;
        padding: 0;
    }
    p{
        margin: 0;
        padding: 0;
    }
    .container{
        width: 100%;
        margin-right: auto;
        margin-left: auto;
    }
    .brand-section{
       background-color: #101875;
       padding: 10px 40px;
    }
    .logo{
        width: 50%;
    }

    .row{
        display: flex;
        flex-wrap: wrap;
    }
    .col-6{
        width: 50%;
        flex: 0 0 auto;
    }
    .text-white{
        color: #fff;
    }
    .company-details{
        float: right;
        text-align: right;
    }
    .body-section{
        padding: 16px;
        border: 1px solid gray;

    }
    .body-section{
        padding: 16px;
        border: 1px solid gray;
    }
    .color{
        color: #fff;
    }
    .heading{
        font-size: 20px;
        margin-bottom: 08px;
    }
    .sub-heading{
        color: #171717;
        margin-bottom: 05px;
    }
    table{
        background-color: #fff;
        width: 100%;
        border-collapse: collapse;
    }
    table thead tr{
        border: 1px solid rgb(255, 255, 255);
        background-color: #2e4ce1;

    }
    table td {
        vertical-align: middle !important;
        text-align: center;
    }
    table th, table td {
        padding-top: 08px;
        padding-bottom: 08px;
    }
    .table-bordered{
        box-shadow: 0px 0px 5px 0.5px gray;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .text-right{
        text-align: end;
    }
    .w-20{
        width: 20%;
    }
    .float-right{
        float: right;
    }
</style>

</div>

<input type="hidden" id="printUrl" data-print-url="{{ route('invoices.show', ['id', 'option' => 'optionvalue']) }}"


@endsection