@extends('layouts.app')

@section('content')
<?php
$total = 0;
foreach ($transactions as $keyT => $valueT) {
    $total += $valueT->net_amount_duplicate;
    if(!isset($valueT->transaction_payments[0])) {
        $nopt[] =  $transactions[$keyT];
        continue;
    }
    if($valueT->book_id == 1) {
        $book_one[] = $transactions[$keyT];
    }
    if($valueT->book_id == 2) {
        $book_two[] = $transactions[$keyT];
    }
    if($valueT->book_id == 3) {
        $book_three[] = $transactions[$keyT];
    }
}
?>


<style>
    ul#transaction_show li {
        padding-left:4px;
    }
</style>
<div class="row">
    <div class="cold-lg-12 col-md-12">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#b1">Book 1
                            @if(isset($book_one))
                                ( {{ count($book_one) }} )
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#b2">Book 2
                            @if(isset($book_two))
                                ( {{ count($book_two) }} )
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#b3">Book 3
                            @if(isset($book_three))
                                ( {{ count($book_three) }} )
                            @endif
                        </a>
                    </li>
                    
                    @if($nopttab == "visible")
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#b4">NO PT #
                                @if(isset($nopt))
                                    ( {{ count($nopt) }} )
                                @endif
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="b1">
                                @if(isset($book_one))
                                    <div class="card-box table-responsive">
                                        @include('inc.transactions_index', ['transactions' => $book_one])
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="b2">
                                @if(isset($book_two))
                                    <div class="card-box table-responsive">
                                        @include('inc.transactions_index', ['transactions' => $book_two])
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="b3">
                                @if(isset($book_three))
                                    <div class="card-box table-responsive">
                                        @include('inc.transactions_index', ['transactions' => $book_three])
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="b4">
                                @if(isset($nopt))
                                    <div class="card-box table-responsive">
                                        <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="column-title">Name</th>
                                                    <th class="column-title">Book</th>
                                                    <th class="column-title">D Granted</th>
                                                    <th class="column-title">Item</th>
                                                    <th class="column-title no-link last">
                                                        <span class="nobr">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($nopt as $keyN => $valueN)
                                                
                                                    <tr>
                                                        <td style="text-transform: capitalize;">
                                                            {{ $valueN->customer->first_name }}
                                                            {{ $valueN->customer->middle_name }}
                                                            {{ $valueN->customer->last_name }}
                                                        <td>{{  $valueN->book_id }}</td>    
                                                        </td>
                                                        <td>{{ date('M j, Y',strtotime($valueN->created_at)) }}</td>
                                                        <td>{{ $valueN->item->name }}</td>
                                                        <td>
                                                            <a href="{{ route('transactions.show', $valueN->id) }}" class="btn btn-secondary btn-sm last"><i class="fa fa-eye"> </i> View </a>
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
            </div>
            <div class="card-footer border">
                <h4>Total: {{  number_format($total, 0) }}</h4>
            </div>
        </div>
    </div>
</div>
@endsection