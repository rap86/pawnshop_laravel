@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">
        <div class="card card-secondary card-outline">
			<div class="card-header">
				<span class="text-muted text-lg">See the details of Book {{$book->id}}</span>
			</div>
            <div class="card-body">
                @include('inc.book_details_show', ['book'=> $book])
            </div>
			<div class="card-footer border">
				<a href="{{ route('books.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Index</a>
			</div>
        </div>
    </div>
</div>
@endsection
