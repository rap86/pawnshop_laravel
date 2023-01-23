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
		
			<p style="font-family:arial;">Edited customer name log</p>
			
		</htmlpageheader>
		
		<sethtmlpageheader name="myHTMLHeader1" value="on" show-this-page="1" />
		
			<table border="1" style="width:100%; border-collapse:collapse; font-family:arial; font-size:12px; text-align:center;">
                <tr>
                    <th>Id</th>
                    <th>Customer ID</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Date</th>
                </tr>
                @foreach ($customer_logs as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->old_first_name }}</td>
                        <td>{{ $customer->old_middle_name }}</td>
                        <td>{{ $customer->old_last_name }}</td>
                        <td>{{ date('M j, Y', strtotime($customer->created_at)) }}</td>
                    </tr>
                @endforeach
            </table>
		
		<htmlpagefooter name="myHTMLFooter1">
			
			<p style="border-top: 1px solid; black;">Page: {PAGENO} of {nbpg}</p>	
		
		</htmlpagefooter>
		
		<sethtmlpagefooter name="myHTMLFooter1" value="on" show-this-page="1" />
	</body>
</html>