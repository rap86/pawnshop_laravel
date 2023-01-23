@if($clickable == 'false')
    @php 
        $clickable_action = 'disabled';  
    @endphp
@else
    @php 
        $clickable_action = '';  
    @endphp   
@endif

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3 pb-3">
        <a href="/transactions/create/{{ $customer->id }}" class="btn btn-secondary btn-block {{ $clickable_action }}"> <i class="fa fa-plus"></i> New Granted</a>
        <a href="" class="btn btn-secondary btn-block {{ $clickable_action }}"> <i class="fa fa-solid fa-money-bill"></i> Buy Item</a>
        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary btn-block {{ $clickable_action }}"> <i class="fa fa-edit"></i> Edit Information</a>
        <a href="{{ route('customer_logs.show', $customer->id) }}" class="btn btn-secondary btn-block {{ $clickable_action }}" target="_blank"> <i class="fa fa-eye"></i> Customer Logs</a>
        @if(count($customer->transactions) > 0)
            @if(auth()->user()->role == "admin")
                <a href="{{ route('customers.findcustomer', "customer_id_slave=$customer->id") }}" class="btn btn-danger btn-block {{ $clickable_action }}"> <i class="fa fa-edit"></i> Merge this to Master</a>
            @endif
        @endif
        @if(isset($visible) == 'yes')
            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-secondary btn-block"> <i class="fa fa-eye"></i> View Transactions</a>
        @endif
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        <div class="card">
            @if($customer->image_name == NULL)    
                @if(strtolower($customer->gender) == "male")
                    <img class="img-responsive avatar-view" src="/storage/male.png" alt="Avatar" title="Image of customer"/>
                @else
                    <img class="img-responsive avatar-view" src="/storage/female.png" alt="Avatar" title="Image of customer"/>
                @endif
            @else 
                <img class="img-responsive avatar-view" src="/storage/image_customer/{{ $customer->image_name }}" alt="Avatar" title="Image of customer"/>
            @endif
            <div class="card-body">
                <p class="card-text text-center text-lg">Customer Id: {{ $customer->id }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="card-box table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap m2" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="column-title">Details</th>
                        <th class="column-title">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{ $customer->first_name." ".$customer->middle_name." ".$customer->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ $customer->gender }}</td>
                    </tr>
                    <tr>
                        <td>Birthdate</td>
                        <td>{{ date('M j, Y',strtotime($customer->birthdate)) }}</td>
                    </tr>
                    <tr>
                        <td>Occupation</td>
                        <td>{{ $customer->occupation }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <td>CP Number</td>
                        <td>{{ $customer->cellphone_number }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $customer->address }}</td>
                    </tr>
                    <tr>
                        <td>Details</td>
                        <td>{{ $customer->details }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>