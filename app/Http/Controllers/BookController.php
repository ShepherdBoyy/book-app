<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $books = Book::with('author')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%");
            })->get();

        return view('books.index', compact('books'));
    }


    public function create()
    {
        $authors = Author::all();
        return view('books.create', ['book' => new Book(), 'authors' => $authors]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'published_date' => 'required|date'
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book created.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'published_date' => 'required|date'
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted.');
    }
}