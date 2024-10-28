<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('project.index', ['projects' => Project::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'link' => ['string', 'required']
        ]);
        $image = $request->file('image')->store('public/project_images');
        $project =  Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $image,
            'link' => $request->link,
            'created_at' => Carbon::now('Asia/Jakarta')
        ]);


        // memasukan data kedalam pivot table 
        $categories = [];
        foreach ($request->project_categories as $category) {
            $categories[] = [
                'category_id' => $category,
                'created_at' => Carbon::now('Asia/Jakarta')
            ];
        }

        $project->categories()->attach($categories);

        return redirect()->to(route('project.index'))->with('success', 'Project has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $project = Project::find($request->post('id_project'));
            Storage::delete($project->image);
            $project->categories()->detach();
            $project->delete();
            $json = [
                'success' => 'Project has been Deleted!'
            ];

            return response()->json($json);
        }
    }
}
