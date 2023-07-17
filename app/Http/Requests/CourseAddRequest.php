<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseAddRequest extends FormRequest
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
            'name'=>'required|max:100|unique:courses,name',
            'dep_id'=>'required|numeric',
            'lev_id'=>'required|numeric',
            'type'=>'required',
            'time_units_in_week' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__("site.name-required"),
            'name.max'=>__('site.max-100'),
            'name.unique'=>__('site.name-unique'),
            'dep_id.required'=>__("site.departmrnt-required"),
            'lev_id.required'=>__("site.level-required"),
            'dep_id.numeric'=>__("site.departmrnt-numeric"),
            'lev_id.numeric'=>__("site.level-numeric"),
            'type.required'=>__("site.type-required"),
            'time_units_in_week.required'=>__("site.num-of-lectures-required"),
            'time_units_in_week.numeric'=>__("site.num-of-lectures-numeric")
        ];
    }
}
