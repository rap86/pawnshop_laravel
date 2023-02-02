@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card card-secondary card-outline">
			<div class="card-header">
				<h3 class="card-title">
					<a href="{{ route('items.create')}}" class="btn btn-secondary">
						<i class="fa fa-plus"></i>
						Add item
					</a>
					<a href="{{ route('item_interests.create')}}" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
						<i class="fa fa-plus"></i> 
						Add item interest
					</a>
				</h3>
			</div>
			<div class="card-body">
				@if(count($items) > 0) 
					<div class="table-responsive">
						<table class="dataTables table table-bordered table-striped">
							<thead>
								<tr>
									<th class="column-title">Id</th>
									<th class="column-title">Name</th>
									<th class="column-title">Active</th>
									<th class="column-title">Jewelry</th>
									<th class="column-title">Sequence</th>
									<th class="column-title">Details</th>
									<th class="column-title">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($items as $item)
									<tr>
										<td>{{ $item->id }}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->active }}</td>
										<td>{{ $item->jewelry }}</td>
										<td>{{ $item->sequence }}</td>
										<td>{{ $item->details }}</td>
										<td>
											<a href="{{ route('items.show', $item->id) }}" class="btn btn-secondary"><i class="fa fa-eye"> </i> View </a>
											<a href="{{ route('items.edit', $item->id) }}" class="btn btn-secondary"><i class="fa fa-edit"> </i> Edit </a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@endif
			</div>
		</div>
    </div>
</div>
@endsection