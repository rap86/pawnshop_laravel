@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">
		<form action="{{ route('book_interests.update', $book_interest->id) }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
			@csrf
			<input type="hidden" name="_method" value="PUT">

			<div class="card card-secondary card-outline">
				<div class="card-header">
					<span class="text-muted text-lg">Edit</span>
				</div>
				<div class="card-body">
				
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Book Id</label>
						<div class="col-sm-5">
							<select class="form-control" name="book_id">
								<option></option>
								@foreach ($books as $book)
									@if($book_interest->book_id == $book->id)
										<option value="{{ $book->id }}" selected>{{ $book->name }}</option>
									@else
										<option value="{{ $book->id }}">{{ $book->name }}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Month</label>
						<div class="col-sm-5">
							<input type="number" name="month" value="{{ $book_interest->month }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Interest</label>
						<div class="col-sm-5">
							<input type="number" name="percent_interest" value="{{ $book_interest->percent_interest }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Display Order</label>
						<div class="col-sm-5">
							<input type="number" name="display_order" value="{{ $book_interest->display_order }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Details</label>
						<div class="col-sm-5">
							<input type="text" name="details" value="{{ $book_interest->details }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
				</div>
				<div class="card-footer border">
					<a href="{{ route('book_interests.index') }}" class="btn btn-secondary">
						<i class="fa fa-times"></i> 
						Cancel
					</a>
					<div class="btn btn-secondary" id="btnConfirmationForNewRecord" data-text-message="edit">
						<i class="fa fa-edit"></i> 
						Edit
					</div>
				</div>
			</div>
		</form>
    </div>
</div>
@endsection
