@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <h5 class="text-bold">Slave record</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:50%;">Details</th>
                        <th style="width:50%;">Value</th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>{{ $infoArray['slave'][0]['id'] }}</td>
                    </tr>
                    <tr>
                        <td>Firstname</td>
                        <td>{{ $infoArray['slave'][0]['first_name'] }}</td>
                    </tr>
                    <tr>
                        <td>MIddlename</td>
                        <td>{{ $infoArray['slave'][0]['middle_name'] }}</td>
                    </tr>
                    <tr>
                        <td>Lastname</td>
                        <td>{{ $infoArray['slave'][0]['last_name'] }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ $infoArray['slave'][0]['gender'] }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $infoArray['slave'][0]['address'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <h5 class="text-bold">Master record</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:50%;">Details</th>
                        <th style="width:50%;">Value</th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>{{ $infoArray['master'][0]['id'] }}</td>
                    </tr>
                    <tr>
                        <td>Firstname</td>
                        <td>{{ $infoArray['master'][0]['first_name'] }}</td>
                    </tr>
                    <tr>
                        <td>MIddlename</td>
                        <td>{{ $infoArray['master'][0]['middle_name'] }}</td>
                    </tr>
                    <tr>
                        <td>Lastname</td>
                        <td>{{ $infoArray['master'][0]['last_name'] }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ $infoArray['master'][0]['gender'] }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $infoArray['master'][0]['address'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="/transactions/mergerecord" method="GET" class="form-inline">
            @csrf

            <input  type="hidden" name="slave_id" value="{{ $infoArray['slave'][0]['id'] }}">
            <input  type="hidden" name="master_id" value="{{ $infoArray['master'][0]['id'] }}">

            <div class="btn btn-danger btn-block" type="submit" id="btnConfirmationForNewRecord" data-text-message="merge">
                Click me, if you want to merge this Slave record to the Master record.
            </div>
        </form>
        <br />
    </div>
</div>

@endsection