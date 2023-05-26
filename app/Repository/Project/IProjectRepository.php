<?php

namespace App\Repository\Project;

use App\Models\Project;
use App\Models\User;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

interface IProjectRepository
{
    public function storeProject(Request $request, Array $data);

    public function  updateProject(Request $request, Array $data, Project $project);

    public function removeProject(Project $project);
}