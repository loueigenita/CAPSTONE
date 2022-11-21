
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
  </head>
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
        <div id="details" class="clearfix">
          <div id="client">
            <div class="to">INVOICE TO:</div>
            <h2 class="name">{{$invoice->client}}</h2>
            <div class="address">{{$invoice->client_address}}</div>
          </div>
          <div id="invoice">
            <h1>INVOICE : {{$invoice->invoice_no}}</h1>
            <div class="date">Date of Invoice: {{$invoice->invoice_date}}</div>
            <div class="date">Due Date: {{$invoice->due_date}}</div>
          </div>
        </div>
      <table border="0" cellspacing="0" cellpadding="0" >
        <thead>
          <tr>
            <th class="no">ID</th>
            <th class="desc">PRODUCT NAME</th>
            <th class="price">PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td >{{$invoice->invoice_no}}</td>
            <td >{{$invoice->product_name}}</td>
            <td >{{$invoice->product_price}}</td>
            <td >{{$invoice->product_qty}}</td>
            <td >{{$invoice->total}}</td>
          </tr>
        </tbody>
        <tfoot>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>{{$invoice->total}}</td>
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

.clearfix:after {
  content: " ";
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
  padding: 10px;
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
  background: #0080ff;
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
