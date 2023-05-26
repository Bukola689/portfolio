<?php

namespace App\Repository\Skill;

use App\Models\Skill;
use App\Models\User;

use Illuminate\Http\Request;

interface ISkillRepository
{
    public function storeSkill(Request $request, Array $data);

    public function updateSkill(Request $request, Array $data, Skill $skill);

    public function removeSkill(Skill $skill);
}