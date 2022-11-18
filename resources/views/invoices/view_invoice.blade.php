
@extends('layouts.admin',['page' => 'Invoices', 'pageSlug' => 'invoices'])
@section('content')


<div class="row">
    <div class="col-sm-9">
      <h3> <i>INVOICE INFORMATION</i> </h3>
    </div>
    <div class="col-sm-3 pull-right">
        <a href="{{ route('invoices.index') }}" class="btn btn-primary btn-sm float-end">Back To List</a>
        <a href="{{ URL::to('invoices/{id}/pdf') }}" class="btn btn-danger btn-sm float-end mx-2">PDF</a>
        <a href="" class="btn btn-success btn-sm float-end mx-2">Export</a>

    </div>
    <body>
        <header class="clearfix">
          <div id="logo">
            <img src="frontend/images/logo.png">
          </div>
          <div id="company">
            <h2 class="name">Mater Dei Collge</h2>
            <div>Cabulijan, Tubigon, Bohol</div>
            <div>+639123456789</div>
            <div><a href="mailto:materdeicollege.com">materdeicollege.com</a></div>
          </div>
          </div>
        </header>
        <main>
          <div id="details" class="clearfix">
            <div id="client">
              <div class="to">INVOICE TO:</div>
              <h2 class="name">{{$invoice->client}}</h2>
              <div class="address">{{$invoice->client_address}}</div>
              <div class="email">{{$invoice->name}}</div>
            </div>
            <div id="invoice">
              <h1>INVOICE 3-2-1</h1>
              <div class="date">Date of Invoice: 01/06/2014</div>
              <div class="date">Due Date: 30/06/2014</div>
            </div>
          </div>
          <table border="0" cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th class="no">#</th>
                <th class="desc">DESCRIPTION</th>
                <th class="unit">UNIT PRICE</th>
                <th class="qty">QUANTITY</th>
                <th class="total">TOTAL</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="no">01</td>
                <td class="desc"><h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
                <td class="unit">$40.00</td>
                <td class="qty">30</td>
                <td class="total">$1,200.00</td>
              </tr>
              <tr>
                <td class="no">02</td>
                <td class="desc"><h3>Website Development</h3>Developing a Content Management System-based Website</td>
                <td class="unit">$40.00</td>
                <td class="qty">80</td>
                <td class="total">$3,200.00</td>
              </tr>
              <tr>
                <td class="no">03</td>
                <td class="desc"><h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                <td class="unit">$40.00</td>
                <td class="qty">20</td>
                <td class="total">$800.00</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2"></td>
                <td colspan="2">SUBTOTAL</td>
                <td>$5,200.00</td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2">TAX 25%</td>
                <td>$1,300.00</td>
              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2">GRAND TOTAL</td>
                <td>$6,500.00</td>
              </tr>
            </tfoot>
          </table>
          <div id="thanks">Thank you!</div>
          <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
          </div>
        </main>
        <footer>
          Invoice was created on a computer and is valid without the signature and seal.
        </footer>
      </body>
    </html>

    <style>
        @font-face {
      font-family: SourceSansPro;
      src: url(SourceSansPro-Regular.ttf);
    }

    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #0087C3;
      text-decoration: none;
    }

    body {
      position: relative;
      width: auto;
      height: 29.7cm;
      margin: 0 auto;
      color: #555555;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 14px;
      font-family: SourceSansPro;
    }

    header {
      padding: 10px 0;
      margin-bottom: 20px;
      border-bottom: 1px solid #AAAAAA;
    }

    #logo {
      float: left;
      margin-top: 8px;
    }

    #logo img {
      height: 70px;
    }

    #company {
      float: right;
      text-align: right;
    }


    #details {
      margin-bottom: 50px;
    }

    #client {
      padding-left: 6px;
      border-left: 6px solid #0087C3;
      float: left;
    }

    #client .to {
      color: #777777;
    }

    h2.name {
      font-size: 1.4em;
      font-weight: normal;
      margin: 0;
    }

    #invoice {
      float: right;
      text-align: right;
    }

    #invoice h1 {
      color: #0087C3;
      font-size: 2.4em;
      line-height: 1em;
      font-weight: normal;
      margin: 0  0 10px 0;
    }

    #invoice .date {
      font-size: 1.1em;
      color: #777777;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table th,
    table td {
      padding: 20px;
      background: #EEEEEE;
      text-align: center;
      border-bottom: 1px solid #FFFFFF;
    }

    table th {
      white-space: nowrap;
      font-weight: normal;
    }

    table td {
      text-align: right;
    }

    table td h3{
      color: #0080ff;
      font-size: 1.2em;
      font-weight: normal;
      margin: 0 0 0.2em 0;
    }

    table .no {
      color: #FFFFFF;
      font-size: 1.6em;
      color: #0080ff;
    }

    table .desc {
      text-align: left;
    }

    table .unit {
      background: #DDDDDD;
    }

    table .qty {
    }

    table .total {
      background: #0080ff;
      color: #FFFFFF;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 1.2em;
    }

    table tbody tr:last-child td {
      border: none;
    }

    table tfoot td {
      padding: 10px 20px;
      background: #FFFFFF;
      border-bottom: none;
      font-size: 1.2em;
      white-space: nowrap;
      border-top: 1px solid #AAAAAA;
    }

    table tfoot tr:first-child td {
      border-top: none;
    }

    table tfoot tr:last-child td {
      color: #0080ff;
      font-size: 1.4em;
      border-top: 1px solid #0080ff;

    }

    table tfoot tr td:first-child {
      border: none;
    }

    #thanks{
      font-size: 2em;
      margin-bottom: 50px;
    }

    #notices{
      padding-left: 6px;
      border-left: 6px solid #0087C3;
    }

    #notices .notice {
      font-size: 1.2em;
    }

    footer {
      color: #777777;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #AAAAAA;
      padding: 8px 0;
      text-align: center;
    }


    </style>
</div>

<input type="hidden" id="printUrl" data-print-url="{{ route('invoices.show', ['id', 'option' => 'optionvalue']) }}"


@endsection

