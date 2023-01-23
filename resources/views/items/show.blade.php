@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">
        <div class="card card-secondary card-outline">
			<div class="card-header">
				<span class="text-muted text-lg">Details</span>
			</div>
            <div class="card-body">
			
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="{{ $item->name }}" readonly>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Active</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="{{ $item->active }}" readonly>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jewelry</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="{{ $item->jewelry }}" readonly>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Sequence</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="{{ $item->sequence }}" readonly>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Details</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="{{ $item->details }}" readonly>
					</div>
				</div>				
				
            </div>
			<div class="card-footer border">
				<a href="{{ route('items.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Index</a>
			</div>
        </div>
    </div>
</div>
@endsection
