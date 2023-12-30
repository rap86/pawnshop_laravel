@extends('layouts.app')

@section('content')
<?php

 foreach($book_interests as $value) {
    if ($value->book_id == 1) {
        $book_one[] = $value;
    }

    if ($value->book_id == 2) {
        $book_two[] = $value;
    }

    if ($value->book_id == 3) {
        $book_three[] = $value;
    }
 }
?>

<div class="row ">
    <div class="col-md-12 col-sm-12 ">
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <a href="{{ route('book_interests.create') }}" class="btn btn-secondary">
                    <i class="fa fa-plus"></i>
                    Add Book Interest
                </a>
            </div>
            <div class="card-body">
                <div class="card-header">
                    <ul class="nav nav-pills" id="transaction_show">
                        <li class="nav-item"><a class="nav-link active" href="#book1" data-toggle="tab">Interest Book 1</a></li>
                        <li class="nav-item"><a class="nav-link" href="#book2" data-toggle="tab">Interest Book 2</a></li>
                        <li class="nav-item"><a class="nav-link" href="#book3" data-toggle="tab">Interest Book 3</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="book1">
                            @if(isset($book_one))
                                @include('inc.table_book_interest',['book_interest' => $book_one])
                            @endif
                        </div>
                        <div class="tab-pane" id="book2">
                            @if(isset($book_two))
                                @include('inc.table_book_interest',['book_interest' => $book_two])
                            @endif
                        </div>
                        <div class="tab-pane" id="book3">
                            @if(isset($book_three))
                                @include('inc.table_book_interest',['book_interest' => $book_three])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
