<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('transaction_payments.store') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="transaction_id" value="{{ $transaction_id }}">
            <input type="hidden" class="form-control" name="status" value="granted">
            <input type="hidden" class="form-control" name="paid" value="no">
            <input type="hidden" class="form-control" name="book_id" value="{{ $book_id }}">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Input the pt number</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 label-align">
                            PT Number
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ptnumber" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 label-align">
                            Start Date
                        </label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="payment_startdate" autocomplete="off" value="{{ date('Y-m-d') }}"  readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div type="button" class="btn btn-primary" id="btnConfirmationForNewRecord">
                        <i class="fa fa-save"></i>
                        Save
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
