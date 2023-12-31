@if($transactions->status == 'granted')
    @php $thisColor = 'danger'; @endphp
@elseif($transactions->status == 'uain')
    @php $thisColor = 'success'; @endphp
@elseif($transactions->status == 'redeemed')
    @php $thisColor = 'primary'; @endphp
@elseif($transactions->status == 'auctioned')
    @php $thisColor = 'warning'; @endphp
@elseif($transactions->status == 'uaout')
    @php $thisColor = 'info'; @endphp
@else
    @php $thisColor = 'dark'; @endphp
@endif

<div class="col-lg-6 col-md-6 col-sm-6 pb-3">
    <div class="card-header bg-{{ $thisColor }}">
        Book : {{ $transactions->book_id }} | BIR : <span style="text-transform:uppercase;">{{ $transactions->bir }}</span> | Date Granted: {{ date('M j, Y',strtotime($transactions->created_at)) }}
    </div>
    <div class="table-responsive">
        <table class="table table-striped border-bottom border-left border-right">
            <tr>
                <td rowspan="5" width="20%;">
                    <img class="" width="100%;" src="/storage/image_item/{{ $transactions->image_name }}" />
                </td>
                <td width="15%;" class="text-bold">Interest Used</td>
                <td width="15%;">{{ $transactions->interest_used }}</td>
            </tr>
            <tr>
                <td class="text-bold">Gross</td>
                <td>{{ $transactions->gross_amount }}</td>
            </tr>
            <tr>
                <td class="text-bold">Net</td>
                <td>{{ $transactions->net_amount }}</td>
            </tr>
            <tr>
                <td class="text-bold">Net Duplicate</td>
                <td>{{ $transactions->net_amount_duplicate }}</td>
            </tr>
            <tr>
                <td class="text-bold">1st Mon Interest</td>
                <td>{{ $transactions->first_month_interest_amount }}</td>
            </tr>
            <tr>
                <td>
                    <a class="btn btn-secondary btn-block" href="{{ route('transactions.show', $transactions->id) }}">
                        <i class="fa fa-eye"></i>
                        View
                    </a>
                </td>
                <td class="text-bold">Details</td>
                <td>{{ $transactions->remarks }}</td>
            </tr>
        </table>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 pb-3">
    <div class="card-header bg-{{ $thisColor }}">
            @if(isset($transactions->user->name))
                Encoded by : {{ $transactions->user->name }}
            @endif
        </span>
    </div>
    <table class="table table-striped border-bottom border-left border-right">
        <tr>
            <th>Item Type</th>

            @if($transactions->item->jewelry == 'yes')
                <th>Karat</th>
                <th>Weight</th>
            @else
                <th>Brand</th>
                <th>Model</th>
            @endif

            <th>Status</th>
        </tr>
        @if($transactions->transaction_items)
            @foreach($transactions->transaction_items as $keyItem => $valueItem)
                <tr>
                    <td>{{ $valueItem->item_name  }}</td>

                    @if($transactions->item->jewelry == 'yes')
                        <td>{{ $valueItem->karat  }}</td>
                        <td>{{ $valueItem->weight  }}</td>
                    @else
                        <td>{{ $valueItem->brand  }}</td>
                        <td>{{ $valueItem->model  }}</td>
                    @endif

                    <td>{{ $valueItem->status  }}</td>
                </tr>
            @endforeach
        @endif
    </table>
    <table class="table table-striped border-bottom border-left border-right">
        <tr>
            <th class="bg-green">Amount to pay for Renew</th>
            <th class="bg-blue">Amount to pay for Redeem</th>
        </tr>
        <tr>
            <td>100x</td>
            <td>500x</td>
        </tr>
    </table>
</div>
