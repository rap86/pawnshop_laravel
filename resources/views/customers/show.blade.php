@extends('layouts.app')

@section('content')

@if(count($customer_transactions[0]->transactions) > 0)
    @foreach($customer_transactions[0]->transactions as $keyT => $valueT)
            @if($valueT->status == 'granted')
                @php
                    $grantedArr[] = $valueT;
                @endphp
            @endif

            @if($valueT->status == 'uain')
                @php
                    $uainArr[] = $valueT;
                @endphp
            @endif

            @if($valueT->status == 'uaout')
                @php
                    $uaoutArr[] = $valueT;
                @endphp
            @endif

            @if($valueT->status == 'redeemed')
                @php
                    $redeemedArr[] = $valueT;
                @endphp
            @endif

    @endforeach
@endif

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab">Information</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#granted" data-toggle="tab">
                            Granted
                            <?php
                                if(isset($grantedArr))
                                {
                                    echo " (".count($grantedArr).")";
                                }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ua" data-toggle="tab">
                            UA
                            <?php
                                if(isset($uainArr))
                                {
                                    echo " (".count($uainArr).")";
                                }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#uat" data-toggle="tab">
                            UAT
                            <?php
                                if(isset($uaoutArr))
                                {
                                    echo " (".count($uaoutArr).")";
                                }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#redeemed" data-toggle="tab">
                            Redeemed
                            <?php
                                if(isset($redeemedArr))
                                {
                                    echo " (".count($redeemedArr).")";
                                }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#summary" data-toggle="tab">
                            Summary
                            <?php
                                if(isset($customer_transactions[0]->transactions))
                                {
                                    echo " (".count($customer_transactions[0]->transactions).")";
                                }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#purchased" data-toggle="tab">Purchased</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane active" id="home">
                        @include('inc.customer_info', ['customer'=> $customer_transactions[0], 'clickable' => 'true'])
                    </div>
                    <div class="tab-pane fade" id="granted" role="tabpanel" aria-labelledby="granted-tab">
                        <div class="row">
                            @if(isset($grantedArr))

                                @foreach($grantedArr as $keyG => $valueG)
                                    @include('inc.transaction_header', ['transactions' => $valueG])
                                @endforeach

                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="ua">
                        <div class="row">
                            @if(isset($uainArr))

                                @foreach($uainArr as $keyG => $valueG)
                                    @include('inc.transaction_header', ['transactions' => $valueG])
                                @endforeach

                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="uat">
                        <div class="row">
                            @if(isset($uaoutArr))

                                @foreach($uaoutArr as $keyG => $valueG)
                                    @include('inc.transaction_header', ['transactions' => $valueG])
                                @endforeach

                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="redeemed">
                        <div class="row">
                            @if(isset($redeemedArr))

                                @foreach($redeemedArr as $keyG => $valueG)
                                    @include('inc.transaction_header', ['transactions' => $valueG])
                                @endforeach

                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="summary">
                        <div class="col-md-12 col-lg-12 pb-3">
                        <div class="table-reponsive">
                            @if(count($customer_transactions[0]->transactions) > 0)
                                <table class="dataTables table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Item</th>
                                            <th>Item Type</th>
                                            <th>Date Granted</th>
                                            <th>Principal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customer_transactions[0]->transactions as $keyG => $valueG)
                                            <tr>
                                                <td>{{ $valueG->id }}</td>
                                                <td>
                                                    @foreach($items as $item)
                                                        @if($item->id == $valueG->item_id)
                                                            {{ $item->name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($valueG->transaction_items as $keyItem => $valueItem)
                                                        <i class="fa fa-circle text-danger" style="font-size: 12px;"></i>
                                                        {{ $valueItem->item_name }} &emsp;
                                                    @endforeach
                                                </td>
                                                <td>{{ date('Y-m-d', strtotime($valueG->created_at)) }}</td>
                                                <td>{{ $valueG->gross_amount }}</td>
                                                <td>{{ $valueG->status }}</td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm" href="{{ route('transactions.show', $valueG->id) }}">
                                                        <i class="fa fa-eye"></i>
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="purchased">
                        <p>purchased</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
