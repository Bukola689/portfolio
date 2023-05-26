<?php

namespace App\Repository\Project;

use App\Events\Profile\ChangePassword;
use App\Events\Profile\UpdateProfile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectRepository implements IProjectRepository
{
   public function storeProject(Request $request, Array $data)
   {
      DB::transaction(function () use ($request, $data) {

      $image = $request->image;
  
      $originalName = $image->getClientOriginalName();

      $image_new_name = 'image-' .time() .  '-' .$originalName;

      $image->move('projects/image', $image_new_name);

      $project = new Project();
      $project->skill_id = $request->input('skill_id');
      $project->name = $request->input('name');
      $project->image = 'projects/image/' . $image_new_name;
      $project->project_url = $request->input('project_url');
      $project->save();

     });

   }

    public function  updateProject(Request $request, Array $data, Project $project)
    {
      if( $request->hasFile('image')) {
  
         $image = $request->image;

         $originalName = $image->getClientOriginalName();
 
         $image_new_name = 'image-' .time() .  '-' .$originalName;
 
         $image->move('projects/image', $image_new_name);

         $project->image = 'projects/image/' . $image_new_name;
     }
   
      $project->skill_id = $request->input('skill_id');
      $project->name = $request->input('name');
      $project->project_url = $request->input('project_url');
      $project->update();
    }

    public function removeProject(Project $project)
    {
        $project->delete();
    }
}