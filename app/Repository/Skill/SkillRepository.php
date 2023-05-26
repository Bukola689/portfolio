<?php

namespace App\Repository\Skill;

use App\Events\Profile\ChangePassword;
use App\Events\Profile\UpdateProfile;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SkillRepository implements ISkillRepository
{
   public function storeSkill(Request $request, Array $data)
   {
      $image = $request->image;
  
      $originalName = $image->getClientOriginalName();

      $image_new_name = 'image-' .time() .  '-' .$originalName;

      $image->move('skills/image', $image_new_name);

      $skill = new Skill();
      $skill->name = $request->input('name');
      $skill->image = 'skills/image/' . $image_new_name;
      $skill->save();

   }

    public function updateSkill(Request $request, Array $data, Skill $skill)
    {
      if( $request->hasFile('image')) {
  
         $image = $request->image;

         $originalName = $image->getClientOriginalName();
 
         $image_new_name = 'image-' .time() .  '-' .$originalName;
 
         $image->move('skills/image', $image_new_name);

         $skill->image = 'skills/image/' . $image_new_name;
   }
   
     $skill->name = $request->input('name');
     $skill->update();
    }

    public function removeSkill(Skill $skill)
    {
      $skill->delete();
    }

}