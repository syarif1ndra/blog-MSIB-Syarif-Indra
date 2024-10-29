<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        // Mengambil semua penulis
=======
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
<<<<<<< HEAD
        // Menampilkan form untuk membuat penulis baru
=======
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
<<<<<<< HEAD
            'bio' => 'nullable|string', // Kolom bio bersifat opsional
        ]);

        Author::create([
            'name' => $request->name,
            'bio' => $request->bio, // Simpan bio
=======
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('author-photos', 'public');
        }

        Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'photo' => $photoPath,
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
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
<<<<<<< HEAD
            'bio' => 'nullable|string', // Kolom bio bersifat opsional
        ]);

        $author->update([
            'name' => $request->name,
            'bio' => $request->bio, // Simpan bio
=======
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = $author->photo;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('author-photos', 'public');
        }

        $author->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'photo' => $photoPath,
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
        ]);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
<<<<<<< HEAD
        // Menghapus penulis
=======
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
