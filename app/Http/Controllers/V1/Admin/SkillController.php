<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use App\Repository\Skill\SkillRepository;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    protected $skill;

    public function __construct(SkillRepository $skill)
    {
        $this->skill = $skill;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::orderBy('id', 'desc')->paginate(5);

        return SkillResource::collection($skills);
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
    public function store(StoreSkillRequest $request)
    {
       $data = $request->all();

       $this->skill->storeSkill($request, $data);

        return response()->json([
            'status' => 'Skill Created Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {

      $data = $request->all();

      $this->skill->updateSkill($request, $data, $skill);

        return response()->json([
            'status' => 'Skill Updated Successfully',
            'skill' => $skill,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
      
        $this->skill->removeSkill($skill);

        return response()->json([
            'message' => 'skill deleted Successfully',
            'skill' => $skill,
        ]);
    }
}
