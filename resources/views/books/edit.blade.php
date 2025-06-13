@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Edit Book</h3>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            @include('books.form')
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
