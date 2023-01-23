<div class="modal fade set-status-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('transaction_payments.update', $id) }}" method="POST">
            @csrf
            <input type="hidden" name="transaction_id" value="{{ $transaction_id }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="paid" value="yes">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Select the status</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 label-align">Status</label>
                        <div class="col-md-9 ">
                            <select class="form-control" name="status">
                                <option></option>
                                <option value=granted>Granted</option>
                                <option value=undera>Under Auction</option>
                                <option value=outside>Outside</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 label-align">Date</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="date" autocomplete="off" value="{{ date('Y-m-d') }}">
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