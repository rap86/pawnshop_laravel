<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Granted</title>
		<style>
            @page{
                header: html_myHTMLHeader1;
                footer: html_myHTMLFooter1;
                margin-top: 7%;
                margin-bottom:10%;
                margin-left:40px;
                margin-right:40px;
                margin-header:4%;
                margin-footer:3%;	
            }
		</style>
	</head>
	<body>
		<htmlpageheader name="myHTMLHeader1">
		
			<p style="font-family:arial;">Status : {{ $status }} | Book {{ $book_id }} | Coverage : {{  date('M j, Y',strtotime($date_from)) }} - {{  date('M j, Y',strtotime($date_to)) }}</p>
			
		</htmlpageheader>
		
		<sethtmlpageheader name="myHTMLHeader1" value="on" show-this-page="1" />
		
			<table border="1" style="width:100%; border-collapse:collapse; font-family:arial; font-size:12px; text-align:center;" cellpadding="5">
                <tr>
                    <th>ID</th>
                    <th>Granted</th>
                    <th>PT</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Item</th>
                    <th>Type</th>
                    <th>BRN * KRT</th>
                    <th>MDL * WGT</th>
                    <th>Details</th>
                </tr>
                @php $grandTotal = 0 @endphp
                @foreach($transactions as $key => $value)

                    @php $grandTotal += $value->net_amount_duplicate @endphp

                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->net_amount_duplicate }}</td>
                        <td>{{ $value->transaction_payments[ count($value->transaction_payments) -1 ]->ptnumber }}</td>
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
                            {{ $value->brand }} 
                            *
                            {{ $value->karat }} 
                        </td>
                        <td>
                            {{ $value->model }} 
                            *
                            {{ $value->weight }} 
                        </td>
                        <td>{{ $value->remarks }}</td>
                    </tr>
                @endforeach
            </table>
            <div style="padding-top: 10px; font-size:16px;;">
                <b>Grand total:</b> {{ number_format($grandTotal, 2) }}
            </div>
		
		<htmlpagefooter name="myHTMLFooter1">
			
			<p style="border-top: 1px solid; black;">Page: {PAGENO} of {nbpg}</p>	
		
		</htmlpagefooter>
		
		<sethtmlpagefooter name="myHTMLFooter1" value="on" show-this-page="1" />
	</body>
</html>