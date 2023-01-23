@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <h5>Search the customer's lastname and will be the Master record.</h5>
            </div>
            <div class="card-body">
                <form action="/customers/findcustomer" method="GET" class="form-inline">
                    <input class="form-control" type="hidden" name="customer_id_slave" value="{{ $customer_id_slave }}" readonly>
                    <div class="input-group">
                        <input class="form-control" type="text" name="last_name" placeholder="Search Lastname" autocomplete="off" id="txtLastnameSearchMaster">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" id="btnCustomerSearchMaster">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
                @if(isset($findcustomer)) 
                    @if(count($findcustomer) > 0) 
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
                                    @foreach ($findcustomer as $customer)
                                        <?php 
                                            if($customer_id_slave == $customer->id)
                                                continue; 
                                        ?>
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->first_name }}</td>
                                            <td>{{ $customer->middle_name }}</td>
                                            <td>{{ $customer->last_name }}</td>
                                            <td>{{ date('M j, Y',strtotime($customer->birthdate)) }}</td>
                                            <td>{{ $customer->gender }}</td>
                                            <td>
                                                <a href="{{ route('customers.findpreview',[$customer_id_slave,$customer->id]) }}" class="btn btn-danger"><i class="fa fa-eye"> </i> Master </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else 
                        <div class="alert alert-default">
                            <h1>Customer not found!</h1>
                            <h3>Kindly double check the customer's lastname.</h3>
                        </div>
                    @endif
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection