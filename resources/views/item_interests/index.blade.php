@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-12 col-sm-12 ">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <a href="{{ route('item_interests.create') }}" class="btn btn-secondary">
                    <i class="fa fa-plus"></i>
                    Add Item Interest
                </a>
            </div>
            <div class="card-body">
                @if(count($item_interests) > 0) 
                    <div class="table-responsive">
                        <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Item Id</th>
                                    <th>Item Name</th>
                                    <th>Month</th>
                                    <th>Interest</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                    <th>Forbidden</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item_interests as $itemInterest)
                                    <tr>
                                        <td>{{ $itemInterest->id }}</td>
                                        <td>{{ $itemInterest->item_id }}</td>
                                        <td>{{ $itemInterest->item->name }}</td>
                                        <td>{{ $itemInterest->month }}</td>
                                        <td>{{ $itemInterest->percent_interest }}</td>
                                        <td>{{ $itemInterest->details }}</td>
                                        <td>
                                            <a href="{{ route('item_interests.show', $itemInterest->id) }}" class="btn btn-secondary"><i class="fa fa-eye"> </i> View </a>
                                            <a href="{{ route('item_interests.edit', $itemInterest->id) }}" class="btn btn-secondary"><i class="fa fa-edit"> </i> Edit </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('item_interests.destroy', $itemInterest->id) }}">
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