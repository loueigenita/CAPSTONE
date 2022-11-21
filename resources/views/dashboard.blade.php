@extends('layouts.partials.header', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])

@section('content')
@section('css')
<link rel="stylesheet" href="sweetalert2.min.css">
<link rel="stylesheet" href="{{asset('assets/demo.css')}}">
@endsection
<h2 style="font-family: Times New Roman">OVERVIEW :</h2>
<section class="content">
      <div class="row filts mt-3">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3> {{ ($monthlybalance) }}</h3>
              <p>Monthly Balance</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('transactions.stats')  }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$semesterexpenses}}</h3>

                <p>Expenses Last Month</p>
              </div>
              <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('transactions.type', ['type' => 'expense'])  }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $products->count() }}</h3>

              <p>Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $users->count() }}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- ./col -->
      </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Pending Sales</h4>
                        </div>
                        <div class="col-4 text-right">
                            @empty($clients->count() == 0)
                            <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary">New Sale</a>
                            @else
                            <button href="" id="btn" class="btn btn-sm btn-primary">New Sale</button>
                            @endempty    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table table-striped table-bordered shadow text-center">
                            <thead class=" bg-dark text-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Products</th>
                                    <th>Paid out</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unfinishedsales as $sale)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($sale->created_at)) }}</td>
                                        <td><a href="">{{ $sale->client->name }}<br>{{ $sale->client->document_id }}</a></td>
                                        <td>{{ $sale->products->count() }}</td>
                                        <td>{{ ($sale->transactions->sum('amount')) }}</td>
                                        <td>{{ ($sale->products->sum('total_amount')) }}</td>
                                        <td>
                                            <a href="{{ route('sales.show', ['sale' => $sale]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Sale">
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
        <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
                <div class="card-header">
                <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Latest Transactions</h4>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#transactionModal">
                                New Transaction
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table table-striped table-bordered shadow text-center">
                            <thead class=" bg-dark text-light">
                                <tr>
                                    <th>Category</th>
                                    <th> Title</th>
                                    <th>Medium</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($lasttransactions as $transaction)
                                    <tr>
                                        <td>
                                            @if(!$transaction->type == 'expense')
                                                Expense
                                            @elseif($transaction->type == 'sale')
                                                Sale
                                            @elseif($transaction->type == 'payment')
                                                Payment
                                            @elseif($transaction->type == 'income')
                                                Income
                                            @else
                                                {{ $transaction->type }}
                                            @endif

                                        </td>
                                        <td>{{ $transaction->title }}</td>
                                        <td>{{ $transaction->method->name }}</td>
                                        <td>{{ ($transaction->amount) }}</td>
                                        <td>
                                            @if ($transaction->sale_id)
                                                <a href="{{ route('sales.show', $transaction->sale_id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="More details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('transactions.create', ['type' => 'payment']) }}" class="btn btn-sm btn-primary">Payment</a>
                        <a href="{{ route('transactions.create', ['type' => 'income']) }}" class="btn btn-sm btn-primary">Income</a>
                        <a href="{{ route('transactions.create', ['type' => 'expense']) }}" class="btn btn-sm btn-primary">Expense</a>
                        <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary">Sale</a>
                        <a href="{{ route('transfer.create') }}" class="btn btn-sm btn-primary">Transfer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="sweetalert2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('assets/demo.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>


    <script>
        var lastmonths = [];

        @foreach ($lastmonths as $id => $month)
            lastmonths.push('{{ strtoupper($month) }}')
        @endforeach

        var lastincomes = {{ $lastincomes }};
        var lastexpenses = {{ $lastexpenses }};
        var anualsales = {{ $anualsales }};
        var anualclients = {{ $anualclients }};
        var anualproducts = {{ $anualproducts }};
        var methods = [];
        var methods_stats = [];

        @foreach($monthlybalancebymethod as $method => $balance)
            methods.push('{{ $method }}');
            methods_stats.push('{{ $balance }}');
        @endforeach

        $(document).ready(function() {
            demo.initDashboardPageCharts();
        });


        </script>

        <script>
        $('#btn').on('click', function () {
            Swal.fire({
                icon:'question',
                title:"Opps!",
                text:"No Client Available!",
            })
        });
        </script>
    @endsection




