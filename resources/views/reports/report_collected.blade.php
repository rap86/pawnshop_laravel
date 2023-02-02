@extends('layouts.app')

@section('content')
<div class="card card-secondary card-outline">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('reports.report_collected') }}" method="GET">
                    <div class="row">

                        <div class='col-sm-3'>
                            From
                            <div class="form-group">
                                <input type="date" name="date_to" class="form-control">
                            </div>
                        </div>
                        <div class='col-sm-3'>
                            To
                            <div class="form-group">
                                <input type="date" name="date_from" class="form-control">
                            </div>
                        </div>
                        <div class='col-sm-2'>
                            Select Book
                            <div class="form-group">
                                <select class="form-control" name="book_id">
                                    <option>
                                        @if(isset($book_id))
                                            {{ $book_id }}
                                        @endif
                                    </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            Submit
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-block">
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            Print
                            <div class="form-group">
                                <a href="" class="btn btn-secondary btn-block">
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>    
    </div>
    <div class="card-body">        
        <div class="col-lg-12">
            <div class="table-responsive">
                @if(isset($transactions))
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Book Id</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        @foreach($transactions as $key => $value)
                            <tr>
                                <td>{{  $value->id }}</td>
                                <td>{{  $value->book_id }}</td>
                                <td>{{  $value->status }}</td>
                                <td>{{  date('Y-m-d',strtotime($value->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer border">
        Total : 
    </div>
</div>
@endsection