<form action="" method="POST">
    <div class="form-group form-focus select-focus">
        @csrf
            <select class="select floating form-control">
                @foreach ($clients as $client)
                <option value="client">{{ $client->name }}</option>
                @endforeach
            </select>
        <label class="focus-label">Customer</label>
    </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus">
            <div class="cal-icon">
                <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">From</label>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus">
            <div class="cal-icon">
                <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">To</label>
        </div>
    </div>
    <div class="col">
        <button href="#" class="btn btn-lg btn-success"> Search </button>
    </div>
    <div class="col">
        <a href="{{ route('invoices.create') }}"
        class="btn btn-info float-right text-black mx-2">
        <i class="fas fa-plus">Add</i>
    </a></h2>
    </div>
</form>

