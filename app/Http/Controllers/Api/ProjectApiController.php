<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    public function index()
    {
        $projects = Project::with(['technologies', 'type'])->paginate(10);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with(['technologies', 'type'])->where('slug', $slug)->first();

        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
