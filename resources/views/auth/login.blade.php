@extends('layouts.admin_login')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card card-outline card-success" style="margin-top:-180px;">
			<div class="card-header text-center">
				<a href="/login" class="h1 text-black" style="color:black;"><b>Pawn</b>SHOP <span style="font-size:10px;">Lara</span>
					<br>
				</a>
				<span style="font-size:16px;">Management System</span>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<div class="input-group mb-3">
					<input id="username" type="username" placeholder="Username" class="form-control text-center @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
						@error('username')
							<span class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input id="password" type="password" placeholder="Password" class="form-control text-center @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="row">
						<div class="col-7"></div>
						<div class="col-5">
							<button type="submit" class="btn btn-secondary btn-block">
								<i class="fa fa-user"></i> Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection