<div class="modal fade" id="deleteInvoiceModal{{ $invoice->id }}"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Invoice?</h5>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <p>
                    <h2> Are you sure you want to delete this {{ $invoice->client }} ??</h2>

                    </p>
                    <div class="modal-footer">

                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
