@extends('layouts.admin', ['page' => 'reservation', 'pageSlug' => 'reservation', 'section' => 'inventory'])

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Reservations</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table table-striped shadow text-center">
                        <thead class=" bg-dark text-light">
                        <th>Name</th>
                        <th>Phone</th>
                        {{-- <th>Email</th> --}}
                        <th>Time/Date</th>
                        <th>Message</th>
                        <th>Order Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($reservations as $key=>$reservation)
                                <tr>
                                    {{-- <td>{{ $key + 1 }}</td> --}}
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->phone }}</td>
                                    {{-- <td>{{ $reservation->email }}</td> --}}
                                    <td>{{ $reservation->date_and_time }}</td>
                                    <th>{{ $reservation->message }}</th>
                                    <td>{{ $reservation->items}}</td>

                                    <th>
                                        @if($reservation->status == true)
                                            <span class="badge badge-success">Confirmed</span>
                                        @else
                                            <span class="badge badge-danger">Not Confirmed</span>
                                        @endif

                                    </th>
                                    <td>
                                        @if($reservation->status == false)
                                            <form id="status-form-{{ $reservation->id }}" action="{{ route('reservation.status',$reservation->id) }}" style="display: none;" method="POST">
                                                @csrf
                                            </form>
                                            <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone?')){
                                                    event.preventDefault();
                                                    document.getElementById('status-form-{{ $reservation->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }"><i class="fas fa-check"></i></button>
                                        @endif
                                        <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy',$reservation->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $reservation->id }}').submit();
                                        }else {
                                            event.preventDefault();
                                                }"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <div class="d-flex justify-content-end">
                    {{ $reservations->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
