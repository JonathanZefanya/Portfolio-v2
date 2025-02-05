<?php

namespace App\Http\Controllers;

use App\Models\Category;
use GuzzleHttp\Psr7\Request as Psr7Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::latest();

        // Filter berdasarkan kategori jika ada parameter di URL
        if ($request->has('categories')) {
            $category = Category::where('slug', $request->category)->first();

            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        return view('category.index', [
            'categories' => Category::latest()->get(),
            'selectedCategory' => $request->category ?? ''
        ]);

    }


    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        $json = [
            'data' => view('category._table', ['categories' => Category::latest()->get()])->render()
        ];

        return response()->json($json);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make([
                'category_name' => $request->post('category_name')
            ], [
                'category_name' => 'required|min:3|unique:categories,name'
            ]);

            if ($validator->fails()) {

                $json = [
                    'error' => $validator->errors()->getMessages()
                ];
            } else {

                Category::create([
                    'name' => $request->post('category_name'),
                    'slug' => Str::slug($request->category_name)
                ]);


                $json = [
                    'success' => 'Category has been inserted!'
                ];
            }


            return response()->json($json);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->latest()->get();

        return view('category.show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        return view('category.edit', ['category' => Category::whereSlug($slug)->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {

        $category = Category::whereSlug($slug)->get();

        $request->validate([
            'category_name' => 'required|min:3|unique:categories,name,' . $category[0]->id
        ]);

        Category::whereSlug($slug)->update([
            'name' => $request->category_name
        ]);

        return redirect()->to(route('category.index'))->with('success', 'Category has been changed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            Category::destroy($request->post('id_category'));

            $json = [
                'success' => 'Data has been deleted!'
            ];


            return response()->json($json);
        }
    }
}
