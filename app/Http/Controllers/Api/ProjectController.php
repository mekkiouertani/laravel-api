<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        //$projects = Project::all();
        $projects = Project::paginate(3);
        return response()->json(
            [
                'success' => true,
                'results' => $projects
            ]
        );
    }

    public function show($slug)
    {
        //$projects = Project::find($id);

        //EAGER LOADING
        //$projects = Project::with(['category', 'technologies'])->paginate(3);

        $projects = Project::where('slug', $slug)->with(['category', 'technologies'])->first();
        return response()->json(
            [
                'success' => true,
                'results' => $projects
            ]
        );
    }
}
