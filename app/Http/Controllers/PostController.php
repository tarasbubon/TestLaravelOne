<?php

namespace TestLaravelOne\Http\Controllers;

use TestLaravelOne\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';

        if ($request->user()->posts()->save($post))
        {
            $message = 'Post successfully created!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
           'body' => 'required'
        ]);

        $post = Post::find($request['postId']);

        if(Auth::user() != $post->user)
        {
            return redirect()->back()->withErrors(['permissionDeletePostError' => 'cant delete post, permission denied']);
        }

        $post->body = $request['body'];
        $post->update();

        return response()->json(['new_body' => $post->body], 200);
    }

    public function getDeletePost($post_uuid)
    {
        $post = Post::where('id', $post_uuid)->first();

        if(Auth::user() != $post->user)
        {
            return redirect()->back()->withErrors(['permissionDeletePostError' => 'cant delete post, permission denied']);
        }

        $post->delete();

        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted']);
    }
}