@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-12 col-sm-12 ">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <a class="btn btn-secondary" href="{{ route('books.create') }}">
                    <i class="fa fa-plus"></i>
                    Add book
                </a>
                <a href="{{ route('book_interests.create') }}" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                    <i class="fa fa-plus"></i> 
                    Add book interest
                </a>
            </div>
            <div class="card-body">
                @if(count($books) > 0) 
                    <div class="table-responsive">
                        <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="column-title">Id</th>
                                    <th class="column-title">Name</th>
                                    <th class="column-title">Book Code</th>
                                    <th class="column-title">Details</th>
                                    <th class="column-title">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->book_code }}</td>
                                        <td>{{ $book->details }}</td>
                                        <td>
                                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-secondary"><i class="fa fa-eye"> </i> View </a>
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-secondary"><i class="fa fa-edit"> </i> Edit </a>
                                            <!--a href="{{ route('books.destroy', $book->id) }}" class="btn btn-dark last"><i class="fa fa-remove"> </i> Delete </a-->
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