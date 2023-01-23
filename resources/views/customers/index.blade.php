@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <span class="text-muted text-lg">Customer/s</span>
            </div>
            <div class="card-body">
                @if(count($customers) > 0) 
                    <div class="table-responsive">
                        <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="column-title">Id</th>
                                    <th class="column-title">Firstname</th>
                                    <th class="column-title">Middlename</th>
                                    <th class="column-title">Lastname</th>
                                    <th class="column-title">Birthdate</th>
                                    <th class="column-title">Gender</th>
                                    <th class="column-title no-link last">
                                        <span class="nobr">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->middle_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ date('M j, Y',strtotime($customer->birthdate)) }}</td>
                                        <td>{{ $customer->gender }}</td>
                                        <td>
                                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"> </i> View </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else 
                    <div class="alert alert-default">
                        <h1 class="text-danger">Customer not found!</h1>
                        <h6>Make sure you have typed the correct firstname/lastname of the customer.</h6>
                        <hr>
                        <a href="{{ route('customers.create') }}" class="btn btn-secondary btn-lg text-decoration-none"><i class="fa fa-plus"> </i> Create a new customer.</a>
                    </div> 
                @endif
            </div>
        </div>
    </div>
</div>
@endsection