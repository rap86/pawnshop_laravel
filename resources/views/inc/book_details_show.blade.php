<div class="form-group row">
    <label class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->name }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Book Code</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->book_code }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Month before remata</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->month_before_remata }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Allowance day for interest</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->allowance_day_for_interest }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Service charge granted</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->service_charge_granted }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Service charge redeem</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->service_charge_redeem }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Service charge renew</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->service_charge_renew }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Doc stamp interest</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->doc_stamp_interest }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Deduct first month interest</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->deduct_first_month }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">First month interest</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->first_month_interest }}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Details</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="{{ $book->details }}" readonly>
    </div>
</div>
