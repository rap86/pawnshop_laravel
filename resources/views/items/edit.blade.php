@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">
		<form action="{{ route('items.update', $item->id) }}" method="POST">
			@csrf
			<input type="hidden" name="_method" value="PUT" />

			<div class="card card-secondary card-outline">
				<div class="card-header">
					<span class="text-muted text-lg">Edit</span>
				</div>
				<div class="card-body">
				
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" value="{{ $item->name }}" class="form-control" autocomplete="off"> 
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Active</label>
						<div class="col-sm-6">
							<select name="active" class="form-control" tabindex="-1">
								<option>{{ $item->active }}</option>
								<option value="yes">yes</option>
								<option value="no">no</option>
							</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Jewelry</label>
						<div class="col-sm-6">
							<select name="active" class="form-control" tabindex="-1">
								<option>{{ $item->jewelry }}</option>
								<option value="yes">yes</option>
								<option value="no">no</option>
							</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Sequence</label>
						<div class="col-sm-6">
							<input type="text" name="sequence" value="{{ $item->sequence }}" class="form-control" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Details</label>
						<div class="col-sm-6">
							<input type="text" name="details" value="{{ $item->details }}" class="form-control" autocomplete="off">
						</div>
					</div>				
					
				</div>
				<div class="card-footer border">
					<a href="{{ route('items.index') }}" class="btn btn-secondary">
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
