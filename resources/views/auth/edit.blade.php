@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                <div class="card card-secondary card-outline">
                    <div class="card-header">
                        <span class="text-muted text-lg">Edit</span>
                    </div>

                    <div class="card-body">
                        
                        <input type="hidden" name="_method" value="PUT" />
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role"  class="form-control" name="role">
                                    <option></option>
                                    <option value="clerk">Clerk</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer border">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="fa fa-times"></i> 
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-file"></i>
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
