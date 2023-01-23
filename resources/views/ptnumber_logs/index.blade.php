@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('transactions.granted') }}" method="GET">
                            <div class="row">
                                <div class="col-lg-3">
                                    From
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date_from" value="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    To
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date_to" value="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    Print
                                    <a href="{{ route('prints.print_customer_log') }}" class="btn btn-default btn-block" target="_blank">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(count($ptnumber_logs) > 0) 
                    <div class="table-responsive">
                        <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="column-title">Id</th>
                                    <th class="column-title">Transaction Payment ID</th>
                                    <th class="column-title">PT # New</th>
                                    <th class="column-title">PT # Old</th>
                                    <th class="column-title">Remarks</th>
                                    <th class="column-title">Date</th>
                                    <th class="column-title">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ptnumber_logs as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->transaction_payment_id }}</td>
                                        <td>{{ $value->ptnumber_new }}</td>
                                        <td>{{ $value->ptnumber_old }}</td>
                                        <td>{{ $value->remarks }}</td>
                                        <td>{{ date('M j, Y', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <form action="/transaction_payments/ptsearch" method="GET" class="form-inline">
                                                <input class="form-control form-control-sidebar" type="hidden" name="ptnumber" value="{{ $value->ptnumber_new }}" placeholder="Search PT No" autocomplete="off" id="txtPtNumberSearch">
                                                <button class="btn btn-secondary" type="submit" id="btnPtNumberSearch" target="_blank">
                                                    <i class="fas fa-eye"></i> View
                                                </button>
                                            </form>
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
            <div class="card-footer border">
                <span class="text-muted">Edited Pawn Ticket</span>
            </div>
        </div>
    </div>
</div>
@endsection