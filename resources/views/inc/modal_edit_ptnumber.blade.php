<div class="modal fade editpt-example-modal-lg{{ $valuePayments->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('transaction_payments.update_ptnumber', $valuePayments->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">ID #:{{ $valuePayments->id }} | Input the new pt number</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 label-align">
                            PT number : current
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ptnumber_old" autocomplete="off"  value="{{ $ptnumber }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 label-align">
                            PT number : new
                        </label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="ptnumber_new" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 label-align">
                            Reason
                        </label>
                        <div class="col-md-9">
                            <textarea type="text" class="form-control" name="details" autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        Cancel
                    </button>
                    <div type="button" class="btn btn-primary" id="btnConfirmationForNewRecord">
                        <i class="fa fa-save"></i>
                        Save
                    </div>
                </div>
            </div>  
        </form>
    </div>
</div>