<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Author;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the latest posts, categories, and authors
        $posts = Post::latest()->take(6)->get();
        $categories = Category::all();
        $authors = Author::all();

        return view('home', compact('posts', 'categories', 'authors'));
    }
}

