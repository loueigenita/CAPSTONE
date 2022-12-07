@extends('layouts.admin', ['page' => 'Clients', 'pageSlug' => 'clients', 'section' => 'clients'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Customer</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">Add Customer</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered shadow text-center">
                        <thead class=" bg-dark text-light">
                            <th>Document ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email / Phone</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->document_id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>
                                        <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                                        <br>
                                        {{ $client->phone }}
                                    </td>
                                    </td>
                                    <td>
                                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning"
                                            data-toggle="tooltip" data-placement="bottom" title="Edit Client">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('clients.destroy', $client) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                data-placement="bottom" title="Delete Client"
                                                onclick="confirm('Are you sure you want to delete this Client.') ? this.parentElement.submit() : ''">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $clients->links() }}
                </nav>
            </div>
        </div>
    </div>

@endsection
