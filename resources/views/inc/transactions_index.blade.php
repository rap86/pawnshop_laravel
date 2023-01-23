<table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="column-title">Name</th>
            <th class="column-title">D Granted</th>
            <th class="column-title">Last Payment</th>
            <th class="column-title">Date Diff</th>
            <th class="column-title">Item</th>
            <th class="column-title">PT No.</th>
            <th class="column-title no-link last">
                <span class="nobr">Action</span>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $key => $value)

            @if(isset($value->transaction_payments[0]))
            <tr>
                <td style="text-transform: capitalize;">
                    {{ $value->customer->first_name }}
                    {{ $value->customer->middle_name }}
                    {{ $value->customer->last_name }}    
                </td>
                <td>{{ date('M j, Y',strtotime($value->created_at)) }}</td>
                <td>{{ date('M j, Y',strtotime($value->transaction_payments[ count($value->transaction_payments) -1 ]->payment_startdate)) }}</td>
                <td>{{ $value->transaction_payments[ count($value->transaction_payments) -1 ]->diff_days }}</td>
                <td>{{ $value->item->name }}</td>
                <td>{{ $value->transaction_payments[ count($value->transaction_payments) -1 ]->ptnumber }}</td>
                <td>
                    <a href="{{ route('transactions.show', $value->id) }}" class="btn btn-secondary btn-sm last"><i class="fa fa-eye"> </i> View </a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>