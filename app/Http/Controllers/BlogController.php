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
        $categorySlug = $request->query('category');
    
        $categories = Category::latest()->get();
        $posts = Post::latest();
    
        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $posts->where('category_id', $category->id);
            }
        }
    
        return view('blog.index', [
            'categories' => $categories,
            'posts' => $posts->get(),
            'selectedCategory' => $categorySlug
        ]);
    }
    
}
