@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-12 col-sm-12 ">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <a class="btn btn-secondary" href="{{ route('register') }}">
                    <i class="fa fa-plus"></i>
                    Add New User
                </a>
            </div>
            <div class="card-body">
                @if(count($users) > 0) 
                    <div class="table-responsive">
                        <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="column-title">Id</th>
                                    <th class="column-title">Name</th>
                                    <th class="column-title">Username</th>
                                    <th class="column-title">Role</th>
                                    <th class="column-title">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary"><i class="fa fa-eye"> </i> View </a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary"><i class="fa fa-edit"> </i> Edit </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection