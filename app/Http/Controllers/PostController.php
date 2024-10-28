<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('post.index', ['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('post.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi form request
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:5'],
            'content' => ['required'],
            'body_image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'categories' => ['required']
        ]);



        $image = $request->file('body_image')->store('public/post-images');

        // insert data to database
        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'body' => $request->content,
            'body_image' => $image,
            'user_id' => Auth::id(),
            'category_id' => $request->categories,
        ]);

        // redirect to post.index
        return redirect()->to(route('post.index'))->with('success', 'Post has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {

            $post = Post::find($request->post('id_post'));
            Storage::delete($post->body_image);
            $post->delete();

            $json = [
                'success' => 'Data has been deleted!'
            ];


            return response()->json($json);
        }
    }
}
