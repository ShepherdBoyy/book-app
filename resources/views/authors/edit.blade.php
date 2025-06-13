@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Edit Author</h3>
        <form action="{{ route('authors.update', $author) }}" method="POST">
            @csrf
            @method('PUT')
            @include('authors.form')
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
