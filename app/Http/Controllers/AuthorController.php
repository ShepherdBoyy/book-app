<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $authors = Author::when($search, fn($q) => $q->where('name', 'like', "%$search%"))
            ->latest()
            ->paginate(5);

        return view('authors.index', compact('authors'));
    }


    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date'
        ]);

        $author = Author::create($validated);

        if ($request->ajax()) {
            return response()->json($author);
        }

        return redirect()->route('authors.index')->with('success', 'Author created.');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date'
        ]);

        $author->update($validated);

        return redirect()->route('authors.index')->with('success', 'Author updated.');
    }

    public function destroy(Request $request, Author $author)
    {
        $author->delete();

        if ($request->ajax()) {
            return response()->json(['message' => 'Author deleted']);
        }

        return redirect()->route('authors.index')->with('success', 'Author deleted.');
    }

}