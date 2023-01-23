@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 cold-lg-12">

        <form action="{{ route('customers.store') }}" method="POST"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            @csrf
            <input type="hidden" id="customerPhoto" name="image_name"  value="{{ old('image_name') }}"/>

            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="camera-tab" data-toggle="tab" href="#camera" role="tab" aria-controls="camera" aria-selected="false">Photo</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <label class="col-form-label col-md-3 label-align" for="first-name">First Name <span class="required"></span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" id="first-name" name="first_name" value="{{ old('first_name') }}" class="form-control" autocomplete="off"> 
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-form-label col-md-3 label-align" for="middle-name">Middle Name <span class="required"></span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" id="middle-name" name="middle_name" value="{{ old('middle_name') }}" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="last-name" class="col-form-label col-md-3 label-align">Last Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="last-name" name="last_name" value="{{ old('last_name') }}" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="last-name" class="col-form-label col-md-3 label-align">Gender</label>
                                                <div class="col-md-9">
                                                    <select name="gender" class="select2_single form-control" tabindex="-1">
                                                        <option></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-form-label col-md-3 label-align">Date Of Birth <span class="required"></span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input id="birthday" name="birthdate" value="{{ old('birthdate') }}" class="date-picker form-control" placeholder="mm-dd-yyyy" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                                    <script>
                                                        function timeFunctionLong(input) {
                                                            setTimeout(function() {
                                                                input.type = 'text';
                                                            }, 60000);
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                            <div class="row form-group">
                                                <label for="middle-name" class="col-form-label col-md-3 label-align">Occupation</label>
                                                <div class="col-md-9">
                                                    <input id="occupation" class="form-control" type="text" name="occupation" value="{{ old('occupation') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="middle-name" class="col-form-label col-md-3 label-align">Email</label>
                                                <div class="col-md-9">
                                                    <input id="email" class="form-control" type="text" name="email" value="{{ old('email') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="middle-name" class="col-form-label col-md-3 label-align">Mobile #</label>
                                                <div class="col-md-9">
                                                    <input id="cellphonenumber" class="form-control" type="text" name="cellphone_number" value="{{ old('cellphone_number') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="middle-name" class="col-form-label col-md-3 label-align">Address</label>
                                                <div class="col-md-9">
                                                    <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="middle-name" class="col-form-label col-md-3 label-align">Details</label>
                                                <div class="col-md-9">
                                                    <input id="details" class="form-control" type="text" name="details" value="{{ old('details') }}" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="camera" role="tabpanel" aria-labelledby="camera-tab">
                            
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
                    </div>
                </div>
                <div class="card-footer border">
                    <a href="/" class="btn btn-danger">
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
			document.getElementById('results').innerHTML = '<img src="'+data_uri+'" width="320px;" height="300px;" class="img-thumbnail"/>';
			document.getElementById('customerPhoto').value = data_uri;
		} );
}
</script>
@endsection
