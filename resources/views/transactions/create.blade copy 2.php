@extends('layouts.app')

@section('content')
<style>

</style>
<div class="row">
    <div class="col-md-12 cold-lg-12">
        <form action="{{ route('transactions.store') }}" method="POST"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            @csrf
            <input type="hidden" id="customerPhoto" name="image_name"  value="{{ old('image_name') }}"/>
            <input type="hidden" name="customer_id" value="{{ $customer->id }}"/>
            <input type="hidden" name="status" value="granted"/>

            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <ul class="nav nav-pills" id="myTab">
                        <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab">Information</a></li>
                        <li class="nav-item"><a class="nav-link" href="#camera" data-toggle="tab">Photo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#information" data-toggle="tab">Customer</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active" id="home">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">Interest by</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="interest_by" id="interest_by" style="pointer-events: none; background-color:#e9ecef;">
                                                <option value="book">book</option>
                                                @if(auth()->user()->role == "admin")
                                                    <option value="item">item</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">Branch</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="branch_id" style="pointer-events: none; background-color:#e9ecef;">
                                                <option></option>
                                                <option value=1 selected>Talavera</option>
                                                <option value=2>Cabiao</option>
                                                <option value=3>Guimba</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">BIR</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="bir">
                                                <option></option>
                                                <option value=no>No</option>
                                                <option value=yes>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">Book</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="book_id" id="bookId">
                                                <option></option>
                                                @foreach($books as $book)
                                                    <option value="{{ $book->id }}">{{ $book->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">Gross Amount</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="gross_amount" value="{{ old('gross_amount') }}" class="form-control" id="grossAmountId" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">Net Amount</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="net_amount" value="{{ old('net_amount') }}" class="form-control" id="netAmountId" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">Id Presented</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="id_presented" value="{{ old('id_presented') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">Details</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="details" value="{{ old('details') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="cold-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label label-align">
                                            <i class="fa fa-circle itemCircle" style="font-size: 18px;"></i>
                                            Item 
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="item_id" id="itemInput">
                                                <option></option>
                                                @foreach($items as $item)
                                                    <option value="{{ $item->id }}" data-jewelry="{{ $item->jewelry }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row NonJewelryInput" style="display:none;">
                                        <label class="col-sm-3 col-form-label label-align">
                                            <i class="fa fa-circle itemCircle" style="font-size: 18px;"></i>
                                            Brand
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="brand" value="{{ old('brand') }}" class="form-control NonJewelryInput" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row NonJewelryInput" style="display:none;">
                                        <label class="col-sm-3 col-form-label label-align">
                                            <i class="fa fa-circle itemCircle" style="font-size: 18px;"></i>
                                            Model
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="model" value="{{ old('model') }}" class="form-control NonJewelryInput" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row JewelryInput" style="display:none;">
                                        <label class="col-sm-3 col-form-label label-align">
                                            <i class="fa fa-circle itemCircle" style="font-size: 18px;"></i>
                                            Karat 
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="karat" value="{{ old('karat') }}" class="form-control JewelryInput" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row JewelryInput" style="display:none;">
                                        <label class="col-sm-3 col-form-label label-align">
                                            <i class="fa fa-circle itemCircle" style="font-size: 18px;"></i>
                                            Weight
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="weight" value="{{ old('weight') }}" class="form-control JewelryInput" autocomplete="off">
                                        </div>
                                    </div>

                                    
                                    <div class="x_content">
                                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true">Jewelry</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Non-jewelry</a>
                                            </li>
                                        </ul>
                                        
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                                                <br>
                                                <div class="card JewelryInput" style="display:none;">
                                                    <div class="card-header bg-primary text-white">
                                                        <a class="btn btn-dark pull-right btn-round btn-sm disabled" id="btnNewInputJewelry">
                                                            <i class="fa fa-plus"></i>
                                                            Add Jewelry Type
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label label-align">Jewelry Type</label>
                                                            <div class="col-sm-9">
                                                                <div id="defaultDivJewelry">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control jewelry_input" name="data[Item][1][item_name]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="nonDefaultDivJewelry">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                                                <br>
                                                <div class="card NonJewelryInput" style="display:none;">
                                                    <div class="card-header bg-success text-white">
                                                        <a class="btn btn-dark btn-round btn-sm pull-right" id="btnNewInputJewelryNot">
                                                            <i class="fa fa-plus"></i>
                                                            Add Item Type
                                                        </a>
                                                    </div>
                                                    <div class="card-body">

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label label-align">Item Type</label>
                                                            <div class="col-sm-9">
                                                                <div id="defaultDivJewelryNot">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control non_jewelry_input" name="data[Item][1][item_name]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="nonDefaultDivJewelryNot">
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="camera">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="w3-card-4">
                                        <div class="card-header border">
                                            Preview
                                        </div>
                                        <div class="card-body box-profile border">
                                            <center>
                                                <div class="w3-container" style="min-height:300px;" id="results">
                                                    
                                                </div>
                                            </center>
                                        </div>
                                        <div class="card-footer border">
                                            <input type="file" class="btn btn-secondary btn-block"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="w3-card-4">
                                        <div class="card-header border">
                                            Webcam
                                        </div>
                                        <div class="card-body box-profile border">
                                            <center>
                                                <div class="" id="my_camera"></div>
                                            </center>
                                        </div>
                                        <div class="card-footer border">
                                            <div class="btn btn-secondary btn-block" onClick="take_snapshot()" style="padding:9px;">
                                                + Take a photo
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="information">
                            @include('inc.customer_info', ['customer'=> $customer, 'clickable'=>'false'])
                        </div>
                    </div>
                </div>
                <div class="card-footer border">
                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-danger pull-right">
                        <i class="fa fa-times"></i>
                        Cancel
                    </a>
                    <div class="btn btn-primary" id="btnConfirmationForNewRecord">
                        <i class="fa fa-save"></i>
                        Save
                    </div>
                </div>
            </div>   
        </form>
    </div>
</div>
<script src="{{ asset('design/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('webcam/webcam.js') }}"></script>
<script>
Webcam.set({
    width: 320,
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
