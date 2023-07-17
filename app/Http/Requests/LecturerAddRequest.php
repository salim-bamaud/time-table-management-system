<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerAddRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name'=>'required|max:100|unique:lecturers,name',
            'short_name'=>'required|max:20|unique:lecturers,short_name',
            'collage'=>'required|max:90',
            'dep_id'=>'required|max:20',
            'degree'=>'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__("site.name-required"),
            'collage.required'=>__("site.collage-required"),
            'dep_id.required'=>__("site.departmrnt-required"),
            'degree.required'=>__("site.degree-required"),
            'name.max'=>__('site.max-100'),
            'name.unique'=>__('site.name-unique'),
            'short_name.required'=>__("site.short-name-required"),
            'short_name.unique'=>__("site.short-name-unique"),
            'short_name.max'=>__("site.short-name-max"),
        ];
    }
}
