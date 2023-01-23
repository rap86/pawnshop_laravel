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

<div class="col-lg-12 col-md-12 col-sm-12 pb-3">
    <div class="card-header bg-{{ $thisColor }}">
        Date Granted: {{ date('M j, Y',strtotime($transactions->created_at)) }}
        <span class="float-right">
            @if(isset($transactions->user->name))
                Encoded by : {{ $transactions->user->name }}
            @endif
        </span>
    </div>
    <div class="table-responsive">
        <table class="table table-striped border-bottom border-left border-right">
            <tr>
                <td rowspan="5" width="20%;">
                    <img class="" width="100%;" src="/storage/female.png" />
                </td>
                <td width="15%;">BIR</td>
                <td width="15%;">{{ $transactions->bir }}</td>
                <td width="15%;">Item</td>
                <td width="35%;">{{ $transactions->item->name }}</td>
            </tr>
            <tr>
                <td>Book</td>
                <td>{{ $transactions->book_id }}</td>
                <td>Type</td>
                <td>
                    @if($transactions->transaction_items)
                        @foreach($transactions->transaction_items as $keyItem => $valueItem)
                            <input type="checkbox">
                            {{ $valueItem->item_name }} &emsp; 
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>Gross</td>
                <td>{{ $transactions->gross_amount }}</td>
                
                @if($transactions->item->jewelry == 'yes')
                    <td>Karat</td>
                    <td>{{ $transactions->karat }}</td>
                @else	
                    <td>Brand</td>
                    <td>{{ $transactions->brand }}</td>
                @endif
            </tr>
            <tr>
                <td>Net</td>
                <td>{{ $transactions->net_amount }}</td>
                
                @if($transactions->item->jewelry == 'yes')
                    <td>Weight</td>
                    <td>{{ $transactions->weight }}</td>
                @else	
                    <td>Brand</td>
                    <td>{{ $transactions->model }}</td>
                @endif
                
            </tr>
            <tr>
                <td>Branch ID</td>
                <td>{{ $transactions->branch_id }}</td>
                <td>Interest by</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <a class="btn btn-secondary btn-block" href="{{ route('transactions.show', $transactions->id) }}">
                        <i class="fa fa-eye"></i>
                        View
                    </a>
                </td>
                <td>Details</td>
                <td colspan="3">{{ $transactions->remarks }}</td>
            </tr>
        </table>
    </div>
</div>