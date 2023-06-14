<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $tecno = Technology::all();
        return view('admin.projects.create', compact('types', 'tecno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('post_img', $request->image);
            $data['image'] = $path;
        }
        $project = Project::create($data);
        if ($request->has('tecno')) {
            $project->technologies()->attach($request->tecno);
        }
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $tecno = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'tecno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('image')) {

            if ($project->image) {
                Storage::delete($project->image);
            }
            $path = Storage::disk('public')->put('post_img', $request->image);
            $data['image'] = $path;
        }
        $project->update($data);
        if ($request->has('tecno')) {
            $project->technologies()->sync($request->tecno);
        } else {
            $project->technologies()->detach();
        }
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
