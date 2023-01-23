@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-12 col-sm-12 ">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <a href="{{ route('book_interests.create') }}" class="btn btn-secondary">
                    <i class="fa fa-plus"></i>
                    Add Book Interest
                </a>
            </div>
            <div class="card-body">
                @if(count($book_interests) > 0) 
                    <div class="table-responsive">
                        <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="column-title">Id</th>
                                    <th class="column-title">Book Id</th>
                                    <th class="column-title">Month</th>
                                    <th class="column-title">Interest</th>
                                    <th class="column-title">Details</th>
                                    <th class="column-title">Action</th>
                                    <th class="column-title">Forbidden</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($book_interests as $bookInterest)
                                    <tr>
                                        <td>{{ $bookInterest->id }}</td>
                                        <td>{{ $bookInterest->book_id }}</td>
                                        <td>{{ $bookInterest->month }}</td>
                                        <td>{{ $bookInterest->percent_interest }}</td>
                                        <td>{{ $bookInterest->details }}</td>
                                        <td>
                                            <a href="{{ route('book_interests.show', $bookInterest->id) }}" class="btn btn-secondary"><i class="fa fa-eye"> </i> View </a>
                                            <a href="{{ route('book_interests.edit', $bookInterest->id) }}" class="btn btn-secondary"><i class="fa fa-edit"> </i> Edit </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('book_interests.destroy', $bookInterest->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <div class="btn btn-secondary" id="btnConfirmationForNewRecord" data-text-message="delete">
                                                    <i class="fa fa-edit"></i> 
                                                    Delete
                                                </div>
                                            </form>
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