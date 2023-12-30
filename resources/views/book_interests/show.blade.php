@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">
			<div class="card card-secondary card-outline">

				<div class="card-header">
					<span class="text-muted text-lg">See the interest details of Book {{$book_interest->book_id}}</span>
				</div>
				<div class="card-body">

					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Book Id</label>
						<div class="col-sm-5">
							<input type="number" name="month" value="{{ $book_interest->book_id }}" class="form-control" autocomplete="off">
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
						<i class="fa fa-arrow-left"></i>
						Back to index
					</a>
					</div>
				</div>
			</div>
		</form>
    </div>
</div>
@endsection
