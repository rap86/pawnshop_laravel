<div class="table-responsive">
    <table id="" class="dataTables table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Book Id</th>
                <th>Book Name</th>
                <th>Month</th>
                <th>Interest</th>
                <th>Details</th>
                <th>Action</th>
                <th>Forbidden</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book_interest as $bookInterest)
                <tr>
                    <td>{{ $bookInterest->id }}</td>
                    <td>{{ $bookInterest->book_id }}</td>
                    <td>{{ $bookInterest->book->name }}</td>
                    <td>{{ $bookInterest->month }}</td>
                    <td>{{ $bookInterest->percent_interest }}</td>
                    <td>{{ $bookInterest->details }}</td>
                    <td>
                        <a href="{{ route('book_interests.show', $bookInterest->id) }}" class="btn btn-secondary"><i class="fa fa-eye"> </i> View </a>
                        <a href="{{ route('book_interests.edit', $bookInterest->id) }}" class="btn btn-secondary"><i class="fa fa-edit"> </i> Edit </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('book_interests.destroy', $bookInterest->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <div class="btn btn-secondary" id="btnConfirmationForNewRecord" data-text-message="delete">
                                <i class="fa fa-edit"></i>
                                Delete
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
