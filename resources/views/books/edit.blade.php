@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">
        <div class="card card-secondary card-outline">
            <form action="{{ route('books.update', $book->id) }}" method="POST">
				@csrf
				<input type="hidden" name="_method" value="PUT" />
					
				<div class="card-header">
					<span class="text-muted text-lg">Edit the details of Book {{$book->id}}</span>
				</div>
				<div class="card-body">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-5">
                            <input type="text" name="name" value="{{ $book->name }}" class="form-control" autocomplete="off"> 
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Book Code</label>
						<div class="col-sm-5">
                            <input type="text" name="book_code" value="{{ $book->book_code }}" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Month before remata</label>
						<div class="col-sm-5">
                            <input type="number" name="month_before_remata" value="{{ $book->month_before_remata }}" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Allowance day for interest</label>
						<div class="col-sm-5">
                            <input type="number" name="allowance_day_for_interest" value="{{ $book->allowance_day_for_interest }}" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Service charge granted</label>
						<div class="col-sm-5">
                            <input type="number" name="service_charge_granted" value="{{ $book->service_charge_granted }}" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Service charge redeem</label>
						<div class="col-sm-5">
                            <input type="number" name="service_charge_redeem" value="{{ $book->service_charge_redeem }}" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Service charge renew</label>
						<div class="col-sm-5">
                            <input type="number" name="service_charge_renew" value="{{ $book->service_charge_renew }}" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Doc stamp interest</label>
						<div class="col-sm-5">
                            <input type="number" name="doc_stamp_interest" value="{{ $book->doc_stamp_interest }}" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Deduct first month interest</label>
						<div class="col-sm-5">
							<select class="form-control" name="deduct_first_month">
								<option></option>
								<option value="no">No</option>
								<option value="yes">Yes</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">First month interest</label>
						<div class="col-sm-5">
                            <input type="number" name="first_month_interest" value="{{ $book->first_month_interest }}" class="form-control" autocomplete="off">
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-sm-3 col-form-label">Details</label>
						<div class="col-sm-5">
                            <input type="text" name="details" value="{{ $book->details }}" class="form-control" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="card-footer border">
				    <div class="btn btn-secondary" id="btnConfirmationForNewRecord">
						<i class="fa fa-edit"></i> 
						Save
					</div>
					<a href="{{ route('books.index') }}" class="btn btn-secondary">
						<i class="fa fa-times"></i> 
						Cancel
					</a>
				</div>
			</form>
        </div>
    </div>
</div>
@endsection
