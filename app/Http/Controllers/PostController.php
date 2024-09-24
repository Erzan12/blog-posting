<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5); // fetch all posts
        return view('posts.index', compact('posts'));
    }
    
    public function create()
    {
        return view('posts.create'); // show form to create a post
    }

    public function store(Request $request)
    {
        // Validate the post data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);
    
        // Create the post and associate it with the authenticated user
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => auth()->id(), // Pass the ID of the logged-in user
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
    
    public function edit(Post $post)
    {
        return view ('posts.edit',compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Validate the updated data
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        // update the post
        $post->update($request->except(['_token', '_method']));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    public function filter(Request $request)
    {
        $category = $request->input('category');
        
        // If a category is selected, filter by category, else return all posts
        if ($category){
            $posts = Post::where('category', $category)->paginate(10);
        } else {
            $posts = Post::paginate(10);
        }

        // Return the partial view with the filtered posts
        return view('partials.posts', compact('post'))->render();
    }
    public function __construct()
    {
        $this->middleware('auth'); // Only authenticated users can create posts
    }
}
