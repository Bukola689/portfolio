<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;

use App\Http\Resources\ProjectResource;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\storeProjectRequest;
use App\Models\Project;
use App\Repository\Project\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(ProjectRepository $project)
    {
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('skill')->orderBy('id', 'desc')->paginate('5');

        return ProjectResource::collection($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
       $data = $request->all();

       $this->project->storeProject($request, $data);

        return response()->json([
            'status' => 'project Created Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
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
       $data = $request->all();

       $this->project->updateProject($request, $data, $project);

        return response()->json([
            'status' => 'project Updated Successfully',
            'project' => $project,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
       $this->project->removeProject($project);

        return response()->json([
            'message' => 'project deleted Successfully',
            'project' => $project,
        ]);
    }

    public function searchProject($search)
    {
        $project = Project::with('skill')->where('name'. 'LIKE'. '%' . '$search' . '%')->get();

        return response()->json($project);
    }
}
