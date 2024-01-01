@extends('layouts.app')

@section('content')
<?php
$transactionStatus = array(
    array(
        'id' => 'granted',
        'name' => 'Granted'
    ),
    array(
        'id' => 'undera',
        'name' => 'Under Auction'
    ),
    array(
        'id' => 'outside',
        'name' => 'Outside'
    ),
    array(
        'id' => 'redeem',
        'name' => 'Redeem'
    ),
    array(
        'id' => 'auctioned',
        'name' => 'Auctioned'
    ),
    array(
        'id' => 'scrap',
        'name' => 'Scrap'
        )

);

$books = array(
    array(
        'id' => 1,
        'name' => 'Book 1'
    ),
    array(
        'id' => 2,
        'name' => 'Book 2'
    ),
    array(
        'id' => 3,
        'name' => 'Book 3'
    )
);

?>
<div class="card card-secondary card-outline">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('reports.report_granted') }}" method="GET">
                    <div class="row">
                        <div class='col-sm-2'>
                            Select Book
                            <div class="form-group">
                                <select class="form-control" name="book_id">
                                @foreach ($books as $key => $book)
                                    @if(isset($book_id))
                                        @if($book_id == $book['id'])
                                        <option value="{{ $book['id'] }}" selected>{{ $book['name'] }}</option>
                                        @else
                                            <option value="{{ $book['id'] }}">{{ $book['name'] }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $book['id'] }}">{{ $book['name'] }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='col-sm-2'>
                            Select Status
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    @foreach ($transactionStatus as $key => $stats)
                                        @if(isset($status))
                                            @if($status == $stats['id'])
                                                <option value="{{ $stats['id'] }}" selected>{{ $stats['name'] }}</option>
                                            @else
                                                <option value="{{ $stats['id'] }}">{{ $stats['name'] }}</option>
                                            @endif
                                        @else
                                            <option value="{{ $stats['id'] }}">{{ $stats['name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            From
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_from" value="{{ isset($date_from) ? $date_from : ''  }}">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            To
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_to" value="{{ isset($date_to) ? $date_to : ''  }}">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            Submit
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-block">
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            Print
                            <div class="form-group">
                                @if(isset($book_id))
                                    <a href="{{ route('prints.print_granted',[$book_id, $status, $date_from, $date_to]) }}" target="_blank" class="btn btn-secondary btn-block">
                                        <i class="fa fa-print"></i>
                                    </a>
                                @else
                                    <a href="#" class="btn btn-secondary btn-block">
                                        <i class="fa fa-print"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-12">
            <div class="table-responsive">
                @if(isset($transactions))
                    <table class="dataTables table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Granted</th>
                                <th>PT</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Item</th>
                                <th>Type</th>
                                <th>BRN : MDL</th>
                                <th>KRT : WGT</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        @php $grandTotal = 0 @endphp
                        @foreach($transactions as $key => $value)
                            @php $grandTotal += $value->net_amount_duplicate @endphp
                            <tr>
                                <td>
                                    <a href="{{ route('transactions.show', $value->id) }}" class="btn btn-default btn-sm last" target="_blank">{{ $value->id }}</a>
                                </td>
                                <td>{{ $value->net_amount_duplicate }}</td>
                                <td>

                                    @if(!isset($value->transaction_payments[0]))
                                        No PT
                                    @else
                                    {{ $value->transaction_payments[ count($value->transaction_payments) -1 ]->ptnumber }}
                                    @endif

                                </td>
                                <td>{{  date('M j, Y',strtotime($value->created_at)) }}</td>
                                <td>
                                    {{ $value->customer->first_name }}
                                    {{ $value->customer->middle_name }}
                                    {{ $value->customer->last_name }}
                                </td>
                                <td>{{ $value->item->name }} </td>
                                <td>

                                    @if($value->transaction_items)
                                        @foreach($value->transaction_items as $keyItem => $valueItem)
                                            <i class="fa fa-circle text-danger" style="font-size: 12px;"></i>
                                            {{ $valueItem->item_name }} &emsp;
                                        @endforeach
                                    @endif

                                </td>
                                <td>
                                    @if($value->transaction_items)
                                        @foreach($value->transaction_items as $keyItem => $valueItem)

                                            @if ($value->item->jewelry == "no")
                                                "{{ $valueItem->brand }}:{{ $valueItem->model }}"
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if($value->transaction_items)
                                        @foreach($value->transaction_items as $keyItemKarat => $valueItemKarat)

                                            @if ($value->item->jewelry == "yes")
                                                "{{ $valueItemKarat->karat }}:{{ $valueItemKarat->weight }}"
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $value->details }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer border">
        Total : {{ isset($grandTotal) ? number_format($grandTotal, 2) : '' }}
    </div>
</div>
@endsection
