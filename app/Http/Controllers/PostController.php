<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('active',1)->orderBy('created_at','desc')->paginate(5);
        //page heading
        $title = 'Latest Posts';
        //return home.blade.php template from resources/views folder
        return view('home')->withPosts($posts)->withTitle($title);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required|min:100',
        ]);

        $post = new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = Str::slug($post->title);

        $duplicate = Post::where('slug', $post->slug)->first();
        if ($duplicate) {
            return redirect('new-post')->withErrors('Title already exists.')->withInput();
        }

        $post->author_id = $request->user()->id;
        if ($request->has('save')) {
            $post->active = 0;
            $message = 'Post saved successfully';
        } else {
            $post->active = 1;
            $message = 'Post published successfully';
        }
        $post->save();
        return redirect('edit/' . $post->slug)->withMessage($message);
    }


    public function create(Request $request)
    {
        return view('posts.create');
    }

}
