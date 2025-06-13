@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Create Author</h3>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            @include('authors.form')
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

        <script>
            $('#author-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('authors.store') }}',
                    data: $(this).serialize(),
                    success: function(author) {
                        $('#author-form')[0].reset();
                        $('#authors-list').prepend(`
                    <tr>
                        <td>${author.name}</td>
                        <td>${author.birth_date}</td>
                        <td>
                            <a href="/authors/${author.id}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/authors/${author.id}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                `);
                    },
                    error: function(xhr) {
                        alert('Validation error');
                        console.log(xhr.responseJSON.errors);
                    }
                });
            });
        </script>
    </div>
@endsection
