<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function PostList()
    {
        $posts = Blog::orderBy('id', 'ASC')->paginate(3);
        return view('post_list', ['posts' => $posts]);
    }

    public function createPost()
    {
        return view('post_create');
    }

    public function storePost(Request $request)
    {
        $request->validate([
                'title' => 'required',
                'body' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $image = $request->file('image');
        if ($image)
        {
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
        }

        $article = new Blog();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        if ($image)
        {
            $article->image = $input['imagename'];
        }
        $article->save();
        return redirect()->route('all_posts')->with('status', 'New article has been successfully created!');
    }

    public function deletePost($post_id)
    {
        $post = Blog::find($post_id);
        $post->delete();
        return redirect()->route('all_posts')->with('status', 'Post has been successfully deleted!');
    }
}
