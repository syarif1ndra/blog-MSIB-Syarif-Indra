<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        // Mengambil semua penulis
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat penulis baru
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string', // Kolom bio bersifat opsional
        ]);

        Author::create([
            'name' => $request->name,
            'bio' => $request->bio, // Simpan bio
        ]);

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string', // Kolom bio bersifat opsional
        ]);

        $author->update([
            'name' => $request->name,
            'bio' => $request->bio, // Simpan bio
        ]);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
        // Menghapus penulis
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
