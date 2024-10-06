<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletePost(Post $post) {
        if (auth()->user()->id===$post['user_id']){
            $post->delete();
        }
        return redirect('/my-posts');
    }

    public function updatePost(Post $post, Request $request) {
        if (auth()->user()->id!==$post['user_id']){
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required' ,
            'contact' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['contact'] = strip_tags($incomingFields['contact']);

        $post->update($incomingFields);
        return redirect('/my-posts');
    }

    public function showEditScreen(Post $post) {
        if (auth()->user()->id!==$post['user_id']){
            return redirect('/');
        }
        return view('edit-post', ['post'=>$post]);
    }

    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required' ,
            'contact' => 'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['contact'] = strip_tags($incomingFields['contact']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/my-posts');
    }

    public function myPosts()
{
    // Check if the user is authenticated
    if (!auth()->check()) {
        return redirect('/login'); // Redirect to login if not authenticated
    }

    // Retrieve posts belonging to the logged-in user
    $userposts = Post::where('user_id', auth()->id())->get();

    // Return the view with user posts
    return view('my-posts', compact('userposts'));
}

public function allPosts()
{
    // Assuming you have a Post model
    $allposts = Post::all(); // Retrieve all posts

    return view('all-posts', compact('allposts')); // Replace 'find-tutor' with the actual view name
}

public function search(Request $request)
{
    $query = $request->input('query');
    $allposts = Post::where('title', 'LIKE', "%{$query}%")->get();

    return view('/all-posts', compact('allposts', 'query'));
}

}
