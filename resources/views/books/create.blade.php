@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <h3 class="mb-3">Create Book</h3>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            @include('books.form')
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
