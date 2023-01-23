@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="info-box bg-danger">
			<span class="info-box-icon"><i class="fa fa-ring"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Book 1</span>
				<span class="info-box-number">41,410</span>

				<div class="progress">
					<div class="progress-bar" style="width: 100%"></div>
				</div>
				<span class="progress-description">
					1
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="info-box bg-danger">
			<span class="info-box-icon"><i class="fa fa-ring"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Book 2</span>
				<span class="info-box-number">41,410</span>

				<div class="progress">
					<div class="progress-bar" style="width: 100%"></div>
				</div>
				<span class="progress-description">
					2
				</span>
			</div>
		</div>
	</div>
    <div class="col-md-3">
		<div class="info-box bg-danger">
			<span class="info-box-icon"><i class="fa fa-ring"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Book 3</span>
				<span class="info-box-number">41,410</span>

				<div class="progress">
					<div class="progress-bar" style="width: 100%"></div>
				</div>
				<span class="progress-description">
					3
				</span>
			</div>
		</div>
	</div>
    <div class="col-md-3">
		<div class="info-box bg-danger">
			<span class="info-box-icon"><i class="fa fa-ring"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Total</span>
				<span class="info-box-number">41,410</span>

				<div class="progress">
					<div class="progress-bar" style="width: 100%"></div>
				</div>
				<span class="progress-description">
					6 Items
				</span>
			</div>
		</div>
	</div>
</div>
@endsection