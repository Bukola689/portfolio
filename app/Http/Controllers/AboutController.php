<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function viewAbout()
    {
        $abouts = About::orderBy('id', 'desc')->all();

        return response()->json($abouts);
    }
    
    public function update(Request $request, $id)
    {
        $about = About::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $about->title = $request->input('title');
        $about->description = $request->input('description');
        $about->update();

        return response()->json([
            'message' => 'About update successfully'
        ]);
    }
}
