<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function allData()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        $skills = Skill::orerBy('id', 'desc')->get();
        
        return response()->json($projects, $skills);
    }

    public function getProjectById($id)
    {
      $project = Project::find($id);

      return response()->json($project);
    }

    public function getProjectBySkill($id)
    {
        $project = Project::where('id', $id)->orderBy('id', 'desc')->get();

        return response()->json($project);
    }

    public function searchProject($search)
    {
        $project = Project::with('skill')->where('title'. 'LIKE'. '%' . $search . '%')->get();

        return response()->json($project);
    }
}
