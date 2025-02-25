<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        return view('post.index', [
            'posts' => $query->get(),
            'categories' => Category::all(),
            'selectedCategory' => $request->category ?? ''
        ]);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
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
        return view('post.edit', ['post' => $post]);
    }

    // Update binding untuk menggunakan slug di model Post
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('slug', $value)->firstOrFail();
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'content' => 'required',
            'body_image' => 'image|mimes:png,jpg,jpeg',
        ]);

        try {
            // Check and update image if a new one is uploaded
            if ($request->hasFile('body_image')) {
                if ($post->body_image && Storage::exists($post->body_image)) {
                    Storage::delete($post->body_image);
                }
                $imagePath = $request->file('body_image')->store('public/post-images');
                $post->body_image = $imagePath;
            }

            // Update other fields
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            $post->description = $request->description;
            $post->body = $request->content;
            $post->user_id = Auth::id();

            // Save the changes
            if ($post->save()) {
                return redirect()->route('post.index')->with('success', 'Post has been updated!');
            } else {
                return back()->with('error', 'Failed to update the post.');
            }
        } catch (\Exception $e) {
            \Log::error('Post update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating the post.');
        }
    }

    public function uploadImage(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/uploads', $fileName);

            // URL gambar yang diupload
            $url = Storage::url($filePath);

            // Kembalikan response JSON dengan URL gambar
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => [
                'message' => 'Image upload failed!'
            ]
        ]);
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
