@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">
        
    </div>
</div>
<script src="{{ asset('design/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('webcam/webcam.js') }}"></script>
<script>
Webcam.set({
    width: 410,
	height: 300,
	image_format: 'jpeg',
	jpeg_quality: 95
});
Webcam.attach( '#my_camera' );
	
function take_snapshot() {
		// take snapshot and get image data
		Webcam.snap( function(data_uri) {
			// display results in page
			// console.log(imageName);
			document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
			document.getElementById('customerPhoto').value = data_uri;
		} );
}
</script>

<script>
$(document).ready(function () {
    
    /**
     * This is for new granted transaction
    */
    $('#bookId').change(function() {
        $('#grossAmountId').val('');
        $('#netAmountId').val('');
    });

    $('#grossAmountId').keyup(function() {

        var book_id = Number($("#bookId").find(":selected").val());
        
        if(book_id === 1) {
            deduct_first_month = "{{ $books[0]->deduct_first_month }}";
            if(deduct_first_month == "no") {
                $('#netAmountId').val($(this).val());
            } else {
                total_interest = {{ $books[0]->first_month_interest }} + {{ $books[0]->doc_stamp_interest }};
                amount = ( total_interest / 100 ) * $(this).val();
                $('#netAmountId').val(Math.floor( $(this).val() - amount.toFixed(2) - {{ $books[0]->service_charge_granted }} ));
            }
        }

        if(book_id === 2) {
            deduct_first_month = "{{ $books[1]->deduct_first_month }}";
            if(deduct_first_month == "no") {
                $('#netAmountId').val($(this).val());
            } else {
                total_interest = {{ $books[1]->first_month_interest }} + {{ $books[1]->doc_stamp_interest }};
                amount = ( total_interest / 100 ) * $(this).val();
                $('#netAmountId').val(Math.floor( $(this).val() - amount.toFixed(2) - {{ $books[1]->service_charge_granted }} ));
            }
        }

        if(book_id === 3) {
            deduct_first_month = "{{ $books[2]->deduct_first_month }}";
            if(deduct_first_month == "no") {
                $('#netAmountId').val($(this).val());
            } else {
                total_interest = {{ $books[2]->first_month_interest }} + {{ $books[2]->doc_stamp_interest }};
                amount = ( total_interest / 100 ) * $(this).val();
                $('#netAmountId').val(Math.floor( $(this).val() - amount.toFixed(2) - {{ $books[2]->service_charge_granted }} ));
            }
        }

    });
});
</script>

@endsection
