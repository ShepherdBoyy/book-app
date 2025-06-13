@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <form method="GET" action="{{ route('authors.index') }}" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search author..."
                value="{{ request('search') }}">
        </form>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Authors</h3>
            <a href="{{ route('authors.create') }}" class="btn btn-primary">Add Author</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Birth Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="authors-list">
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->birth_date }}</td>
                        <td>
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST"
                                class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
