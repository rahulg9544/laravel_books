<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display a list of all books
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show a form for creating a new book
    public function create()
    {
        return view('books.create');
    }

    // Store a new book in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'genre' => 'required|string|max:255',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    // Show a form for editing an existing book
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Update an existing book in the database
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'genre' => 'required|string|max:255',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Delete a book from the database
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function showReport()
{
    
    $books = [];

    return view('books.report', compact('books'));
}

    // Display a report of books with a filter by publication year
    public function report(Request $request)
    {
        $query = Book::query();

        if ($request->filled('publication_year')) {
            $query->where('publication_year', $request->publication_year);
        }

        $books = $query->get();

        return view('books.report', compact('books'));
    }
}
