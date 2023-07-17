<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:100|:levels,name',
            'dep_id'=>'required:levels,dep_id',
            'students_num'=>'required|numeric:levels,students_num',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__("site.name-required"),
            'name.max'=>__('site.max-100'),
            'dep_id.required'=>__("site.departmrnt-required"),
            'students_num.required'=>__("site.num-of-students-required"),
            'students_num.numeric'=>__("site.num-of-students-numeric"),
        ];
    }
}
