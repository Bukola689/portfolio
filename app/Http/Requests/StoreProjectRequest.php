<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'skill_id' => 'required|unique:projects',
            'name' => 'required|unique:projects|min:3',
            'image' => 'required',
            'project_url' => 'required|unique:projects',
        ];
    }
}
