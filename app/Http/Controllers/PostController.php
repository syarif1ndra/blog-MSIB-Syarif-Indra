<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title'         => 'required|string|max:255',
        'Content'       => 'required|string',
        'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'is_published'  => 'nullable|boolean',
        'category_id'   => 'required|exists:categories,id',
    ]);

    try {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('asset-images', 'public');
        }

        Post::create([
            'title' => $request->title,
            'Content' => $request->Content,
            'image' => $imagePath,
            'is_published' => $request->is_published == '1', 
            'category_id' => $request->category_id
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    } catch (\Exception $err) {
        return redirect()->route('posts.index')->with('error', $err->getMessage());
    }
}


    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'Content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published'=> 'nullable|boolean',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        try {
            $imagePath = $post->image;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }

            $post->update([
                'title' => $request->title,
                'Content' => $request->Content,
                'category_id' => $request->category_id,
                'is_published' => $request->has('is_published'),
                'image' => $imagePath,
            ]);

            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
