@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <form method="GET" action="{{ route('books.index') }}" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search book..."
                value="{{ request('search') }}">
        </form>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Books</h3>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->published_date }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
