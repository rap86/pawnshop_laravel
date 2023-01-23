@extends('layouts.app')

@section('content')
<?php 
 $ptLogsTableShow = 0;
 foreach($transactions->transaction_payments as $keyPayments => $valuePayments) {
    if (count($valuePayments->ptnumber_logs) > 0) {
        $ptLogsTableShow = 1;
        break;
    } else {
        $ptLogsTableShow = 0;
    }
 }
?>
<div class="row">
    <div class="cold-lg-12 col-md-12">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <ul class="nav nav-pills" id="transaction_show">
                    <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab">Details</a></li>
                    <li class="nav-item"><a class="nav-link" href="#information" data-toggle="tab">Customer Info</a></li>
                    <li class="nav-item">
                        <a href="{{ route('prints.print_transaction',$transactions->id) }}" target="_blank" class="nav-link">
                            <i class="fa fa-print"></i> Print
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
				<div class="tab-content">
					<div class="active tab-pane" id="home">

                            <!--
                            * start transaction header
                            * Due to error/wrong input of transaction details etc.. 
                            * Users can delete the transaction if no pt number assigned yet.
                            -->
                        <div class="row">
                            @if(count($transactions->transaction_payments) <= 0)
                                <div class="col-lg-12">
                                    <form action="{{ route('transactions.destroy', $transactions->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />

                                        <div class="btn btn-danger btn-block mb-2" id="btnConfirmationForNewRecord" style="cursor:pointer;">
                                            If you seeing this text, meaning you can delete this transaction.
                                            Click me, if you want to delete this transaction.
                                        </div>
                                    </form>
                                </div>
                            @endif
                            @include('inc.transaction_header', ['transactions' => $transactions])
                        </div> 
                        <!-- end transaction header -->

                        <!-- start accordion-->
                        <div id="accordion">
                            <div class="card card-secondary card-outline">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                                        Details for Status History
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>June 1 2022</td>
                                                    <td>out</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>June 30 2022</td>
                                                    <td>in</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-secondary card-outline">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">
                                        Details for Principal Payment
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>June 1 2022</td>
                                                    <td>1000</td>
                                                </tr>
                                                <tr class="font-weight-bold">
                                                    <td colspan="2">Total</td>
                                                    <td>1000</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($ptLogsTableShow == 1)
                                <div class="card card-secondary card-outline">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
                                                Edited Pawn Ticket Logs 
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>PT # ID</th>
                                                        <th>PT New</th>
                                                        <th>PT Old</th>
                                                        <th>Remarks</th>
                                                        <th>User</th>
                                                        <th>Date</th>
                                                    </tr>
                                                    @foreach($transactions->transaction_payments as $keyPayments => $valuePayments)   
                                                        @if(count($valuePayments->ptnumber_logs) > 0) 
                                                            @foreach($valuePayments->ptnumber_logs as $keyPtLogs => $valuePtLogs)
                                                            
                                                                <tr>
                                                                    <td>{{ $valuePtLogs->id }}</td>
                                                                    <td>{{ $valuePtLogs->transaction_payment_id }}</td>
                                                                    <td>{{ $valuePtLogs->ptnumber_new }}</td>
                                                                    <td>{{ $valuePtLogs->ptnumber_old }}</td>
                                                                    <td>{{ $valuePtLogs->remarks }}</td>
                                                                    <td></td>
                                                                    <td>{{ date('M j, Y', strtotime($valuePtLogs->created_at)) }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- end of accordion -->

                        <!-- start interest table -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    @if(count($transactions->transaction_payments) > 0)
                                        <table class="dataTablesx table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <td class="text-bold">PT No.</td>
                                                    <td class="text-bold">Start Date</td>
                                                    <td class="text-bold">Interest %</td>
                                                    <td class="text-bold">S Charge</td>
                                                    <td class="text-bold">Interest A</td>
                                                    <td class="text-bold">Partial A.</td>
                                                    <td class="text-bold">Principal A. </td>
                                                    <td class="text-bold">Total</td>
                                                    <td class="text-bold">End Date</td>
                                                    <td class="text-bold">Paid</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transactions->transaction_payments as $keyPayments => $valuePayments)        
                                                    <tr>
                                                        <td class="text-center">
                                                            @if(auth()->user()->role == "admin")
                                                                @if($valuePayments->status == "granted")
                                                                    <div class="btn btn-danger" data-toggle="modal" data-target=".editpt-example-modal-lg{{ $valuePayments->id }}">Edit PT#: {{ $valuePayments->ptnumber }}</div>
                                                                    @include('inc.modal_edit_ptnumber', [
                                                                        'id'                => $valuePayments->id,
                                                                        'ptnumber'          => $valuePayments->ptnumber
                                                                    ])
                                                                @else
                                                                {{ $valuePayments->ptnumber }}
                                                                @endif

                                                            @else
                                                                {{ $valuePayments->ptnumber }}
                                                            @endif
                                                        </td>
                                                        <td>{{ date('M j, Y',strtotime($valuePayments->payment_startdate)) }}</td>
                                                        <td>
                                                            @if($valuePayments->percent_interest != false)
                                                                {{ $valuePayments->percent_interest }}
                                                            @endif 
                                                        </td>
                                                        <td>
                                                            @if($valuePayments->add_service_charge != false)
                                                                {{ $valuePayments->add_service_charge }}
                                                            @endif 
                                                        </td>
                                                        <td>
                                                            @if($valuePayments->add_percent_amount != false)
                                                                {{ $valuePayments->add_percent_amount }}
                                                            @endif 
                                                        </td>
                                                        <td>
                                                            @if($valuePayments->less_partial_amount != false)
                                                                {{ $valuePayments->less_partial_amount }}
                                                            @endif 
                                                        </td>
                                                        <td>
                                                            @if($valuePayments->less_principal_amount != false)
                                                                {{ $valuePayments->less_principal_amount }}
                                                            @endif 
                                                        </td>
                                                        <td>
                                                            @if($valuePayments->total_amount != false)
                                                                {{ $valuePayments->total_amount }}
                                                            @endif 
                                                        </td>
                                                        <td>
                                                            @if($valuePayments->payment_enddate != false)
                                                                {{ date('M j, Y',strtotime($valuePayments->payment_enddate)) }}
                                                            @endif    
                                                        </td>
                                                        <td>
                                                            @if($valuePayments->paid == "no")
                                                                <div class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target=".interest-payment-modal-lg{{ $valuePayments->id }}">
                                                                    {{ $valuePayments->paid }}
                                                                </div>
                                                                @include('inc.modal_payment', [
                                                                    'transaction_id'    => $transactions->id,
                                                                    'id'                => $valuePayments->id,
                                                                    'net_amount'        => $transactions->net_amount
                                                                ])
                                                            @else 
                                                                <div class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target=".interest-paid-details-modal-lg{{ $valuePayments->id }}">yes</div>
                                                                @include('inc.modal_interest_paid_details', [
                                                                    'id' => $valuePayments->id,
                                                                    'ornumber'=> $valuePayments->ornumber,
                                                                    'status' => $valuePayments->status
                                                                ])
                                                            @endif 
															<div class="btn btn-primary btn-sm btn-block">undo</div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>  
                        </div>
                        <!-- end interest table -->


					</div>

					<div class="tab-pane fade" id="information">
						@include('inc.customer_info', ['customer'=> $transactions->customer, 'clickable'=>'false', 'visible'=>'yes'])
					</div>
				</div>
            </div> 

            <div class="card-footer border">
                <!-- start botton menu -->
                <div class="row">
                    <div class="col-md-2 col-lg-2 pb-2">
                        @if(isset($transactions->transaction_payments[count($transactions->transaction_payments) - 1]))
                            
                            @if($transactions->transaction_payments[count($transactions->transaction_payments) - 1]->paid == 'no')
                                <div class="btn btn-secondary btn-block">
                                    <i class="fa fa-plus"></i>
                                    New PT.
                                </div>
                            @else 
                                <div class="btn btn-dark btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">
                                    <i class="fa fa-plus"></i>
                                    New PT.
                                </div>
                            @endif

                        @else
                            <div class="btn btn-dark btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">
                                <i class="fa fa-plus"></i>
                                New PT.
                            </div>
                        @endif

                        @include('inc.modal_newpt', [
                            'transaction_id' => $transactions->id,
                            'book_id' => $transactions->book_id
                        ])
                    </div>
                    
                    <!-- This will work only of transaction_payments array is available, meaning may laman yung array data -->
                    <div class="col-md-2 col-lg-2 pb-2">
                        <div class="btn btn-dark btn-block" data-toggle="modal" data-target=".set-status-modal-lg">
                            <i class="fa fa-file"></i>
                            Status
                        </div>
                        @if(isset($valuePayments->id))
                            @include('inc.modal_set_status',[
                                'transaction_id' => $transactions->id,
                                'id' => $valuePayments->id
                            ])
                        @endif
                    </div>
                    <div class="col-md-2 col-lg-2 pb-2">
                        <div class="btn btn-dark btn-block" data-toggle="modal" data-target=".less-principal-modal-lg">
                            <i class="fa fa-minus"></i>
                            Principal
                        </div>
                        @include('inc.modal_less_principal', [
                            'transaction_id' => $transactions->id,
                            'net_amount'      => $transactions->net_amount
                            ])
                    </div>
                </div>
                <!-- end botton menu -->
            </div>
        </div>
    </div>
</div>
@endsection
