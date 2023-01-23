<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Transaction info</title>
		<style>
            @page  {
                header: html_myHTMLHeader1;
                footer: html_myHTMLFooter1;
                margin-top: 43%;
                margin-bottom:8%;
                margin-left:40px;
                margin-right:40px;
                margin-header:3%;
                margin-footer:3%;	
            }
            .text-bold { font-weight:bold; }
            table#address tr td { font-size:14px; }	
            table#transaction tr td { font-size:14px; }	
            table#payment_details tr td { text-align:center; }
		</style>
	</head>
	<body>
		<htmlpageheader name="myHTMLHeader1">
			<table style="width:100%; border-collapse:collapse; font-family:arial;" border="0">
				<tr>	
					<td style="width:35%; font-size:30px; color:#595959;"><b>Pawn</b>SHOP</td>
					<td style="width:20%;"></td>
					<td style="width:45%; font-size:10px; color:#595959; text-align:right;">Transaction ID : 1000</td>
				</tr>
			</table>
			<table id="address" style="width:100%; border-collapse:collapse; font-family:arial; margin-top:5px;" border="0">
				<tr>
					<td>Address: </td>
				</tr>
				<tr>	
					<td>Email: </td>
				</tr>
				<tr>	
					<td>Contact: </td>
				</tr>
			</table>
			
			<div style="height:5px; background-color:#e6e6e6; margin-top:7px; margin-bottom:5px;"></div>
			
				<span style="font-family:arial; font-size:20px;"><strong>Customer : </strong> </span>
			
			<div style="height:5px; background-color:#e6e6e6; margin-top:7px;"></div>
			
			<table id="transaction" style="width:100%; border-collapse:collapse; font-family:arial;" border="0" cellpadding="5">
				<tr>
					<td colspan="4" style="font-family:arial; font-size:20px;"><strong>Item Info</strong></td>
				</tr>
                <tr>
					<td style="width:20%;">Date</td>
                    <td style="width:5%;">:</td>
					<td style="width:75%;">Jan 1, 2023</td>
                </tr>
				<tr>
					<td>Item</td>
                    <td>:</td>
					<td>Jewelry</td>
                </tr>
                <tr>
					<td>Type</td>
                    <td>:</td>
					<td>Ring, Bracelet</td>
                </tr>
                <tr>
					<td>Karat</td>
                    <td>:</td>
					<td>5</td>
                </tr>
                <tr>
					<td>Weight</td>
                    <td>:</td>
					<td>5 grams</td>
                </tr>
                <tr>
					<td>Gross Amount</td>
                    <td>:</td>
					<td>2,000</td>
                </tr>
                <tr>
					<td>Net Amount</td>
                    <td>:</td>
					<td>2,000</td>
                </tr>
			</table>
			
			<div style="height:5px; background-color:#e6e6e6; margin-top:7px;"></div>

                <span style="font-family:arial; font-size:20px;"> <strong>Interest</strong> </span>
			
            <table id="payment_details" style="width:100%; border-collapse:collapse; font-family:arial;" border="1" cellpadding="5">
                <tr>
                    <td style="width:20%; font-weight:bold;">PT #</td>
                    <td style="width:20%; font-weight:bold;">Start Date</td>
                    <td style="width:20%; font-weight:bold;">Interest</td>
                    <td style="width:20%; font-weight:bold;">Total</td>
                    <td style="width:20%; font-weight:bold;">End Date</td>
                </tr>
            </table>
		</htmlpageheader>
		
		<sethtmlpageheader name="myHTMLHeader1" value="on" show-this-page="1" />

		<table id="payment_details" style="width:100%; border-collapse:collapse; font-family:arial;" border="1" cellpadding="5">
            <tr>
                <td style="width:20%;">1</td>
                <td style="width:20%;">Jan 1, 2023</td>
                <td style="width:20%;">5 %</td>
                <td style="width:20%;">1500</td>
                <td style="width:20%;">Feb 1, 2023</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Jan 1, 2023</td>
                <td>5 %</td>
                <td>1500</td>
                <td>Feb 1, 2023</td>
            </tr>
		</table>
		
		<htmlpagefooter name="myHTMLFooter1">

			<table style="border-collapse:collapse; width:100%; font-family:arial;" border="0">
				<tr>
					<td style="text-align:right; border-top:1px solid black;"><i><b>Page: {PAGENO} of {nbpg}</b></i></td>
				</tr>
			</table>
			
		</htmlpagefooter>
		
		<sethtmlpagefooter name="myHTMLFooter1" value="on" show-this-page="1" />
	</body>
</html>