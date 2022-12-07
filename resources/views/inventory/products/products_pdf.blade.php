
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ALL PRODUCTS</title>
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
    <div class="card-body">
        <table class="text-center">
            <thead>
                <th scope="col">Category</th>
                <th scope="col">Product</th>
                <th scope="col">Base Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Faulty</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->category->name }}</></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->stock_defective }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
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
  color: #161515;
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
  background-color: #161515;
  color: #EEEEEE;
}

table td {
  text-align: center;
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
