@extends('layouts.admin', ['page' => 'contact', 'pageSlug' => 'contact', 'section' => 'inventory'])

@section('content')
    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">{{ $contact->subject }}</h4>
                        </div>
                        <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <strong>Name: {{ $contact->name }}</strong><br>
                                   <b>Email: {{ $contact->email }}</b> <br>
                                   <strong>Message: </strong><hr>

                                   <p>{{ $contact->message }}</p><hr>

                               </div>
                           </div>
                            <a href="{{ route('contact.index') }}" class="btn btn-sm btn-danger">Back</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@push('scripts')

@endpush
