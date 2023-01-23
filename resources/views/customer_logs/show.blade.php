@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <h5>Edited customer name logs</h5>
            </div>
            <div class="card-body">
                @if(count($customer_logs) > 0) 
                    <div class="table-responsive">
                        <!--p class="text-muted font-13 m-b-30">
                            Customer's Table
                        </p-->
                        <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="column-title">Id</th>
                                    <th class="column-title">Customer ID</th>
                                    <th class="column-title">Firstname</th>
                                    <th class="column-title">Middlename</th>
                                    <th class="column-title">Lastname</th>
                                    <th class="column-title">Date</th>
                                    <th class="column-title">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer_logs as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->customer_id }}</td>
                                        <td>{{ $customer->old_first_name }}</td>
                                        <td>{{ $customer->old_middle_name }}</td>
                                        <td>{{ $customer->old_last_name }}</td>
                                        <td>{{ date('M j, Y', strtotime($customer->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('customers.show', $customer->customer_id) }}" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"> </i> View </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else 
                    <div class="alert alert-default">
                        <h1>No logs.</h1>
                    </div> 
                @endif
            </div>
        </div>
    </div>
</div>
@endsection