<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function latest() {
        $projects = Project::with('type', 'technologies')->orderBy('id', 'DESC')->limit(3)->get();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function details($slug) {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();
        if($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
}
