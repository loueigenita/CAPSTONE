
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

                    @include('invoices.table')

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
