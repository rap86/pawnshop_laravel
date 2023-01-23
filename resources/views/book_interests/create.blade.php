@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">
		<form action="{{ route('book_interests.store') }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			@csrf
			<div class="card card-secondary card-outline">

				<div class="card-header">
					<span class="text-muted text-lg">Add</span>
				</div>
				<div class="card-body">
				
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Book Id</label>
						<div class="col-sm-5">
							<select class="form-control" name="book_id">
								<option></option>
								@foreach ($books as $book)
									<option value="{{ $book->id }}">{{ $book->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Month</label>
						<div class="col-sm-5">
							<input type="number" name="month" value="{{ old('month') }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Interest</label>
						<div class="col-sm-5">
							<input type="number" name="percent_interest" value="{{ old('percent_interest') }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Display Order</label>
						<div class="col-sm-5">
							<input type="number" name="display_order" value="{{ old('display_order') }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Details</label>
						<div class="col-sm-5">
							<input type="text" name="details" value="{{ old('details') }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
				</div>
				<div class="card-footer border">
					<a href="{{ route('book_interests.index') }}" class="btn btn-secondary">
						<i class="fa fa-times"></i> 
						Cancel
					</a>
					<div class="btn btn-secondary" id="btnConfirmationForNewRecord">
						<i class="fa fa-edit"></i> 
						Save
					</div>
				</div>
			</div>
		</form>
    </div>
</div>
@endsection
