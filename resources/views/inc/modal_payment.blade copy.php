<div class="modal fade interest-payment-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('transaction_payments.update', $payment_transaction_id_last) }}" method="POST">
            @csrf
            <input type="hidden" name="transaction_id" value="{{ $transaction_id }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="paid" value="yes">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Payment | Id: {{ $payment_transaction_id_last }} | Net Amount: {{ $net_amount }} | Date: {{ date('Y-m-d H:i:s') }}</h4>
                    <button type="button" class="close" id="closeModalPayment" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="col-md-12">
                                    <select class="form-control" id="statusInputSelectPayment" name="status" style="font-size:65px; height:85px;">
                                        <option></option>
                                        <option value="renewed">Renew</option>
                                        <option value="redeemed">Tubos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

						<div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-form-label col-md-5 label-align">
                                    <span class="text-danger">Less Charge</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="less_charge_amount" name="less_charge_amount" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-5 label-align">
                                    <span class="text-danger">Partial Amount</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="less_partial_amount" name="less_partial_amount" autocomplete="off">
                                </div>
                            </div>
						</div>
                        <div class="col-lg-6">
							<div class="form-group row">
                                <label class="col-form-label col-md-5 label-align">
                                    <span class="text-success">Percent Interest</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="percent_interest" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5 label-align">
                                    <span class="text-success">Percent Amount</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="add_percent_amount" name="add_percent_amount" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5 label-align">
                                    <span class="text-success">Add Charge</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="add_charge_amount" name="add_charge_amount" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row" id="div_add_principal_amount" style="display:none;">
                                <label class="col-form-label col-md-5 text-danger label-align">
                                    <span class="text-success">Principal Amount</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="add_principal_amount" name="add_principal_amount" value="{{ $net_amount }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-5 label-align">
                                    <span class="text-success">Service Charge</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="add_service_charge" name="add_service_charge" autocomplete="off" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-5 label-align">
                                    <span class="text-success">Total Amount</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="total_amount" name="total_amount" autocomplete="off" readonly>
                                </div>
                            </div>
						</div>
					</div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-2 label-align">Details</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="details" autocomplete="off" id="remarks">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2 label-align">O.R. Number</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="ornumber" autocomplete="off" id="ornumber">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2 label-align">End Date</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" name="payment_enddate" autocomplete="off" value="{{ date('Y-m-d') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-default">
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
