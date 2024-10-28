<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        return view('blog.index', [
            'categories' => Category::latest()->get(),
            'posts' => Post::latest()->get()
        ]);
    }
}
