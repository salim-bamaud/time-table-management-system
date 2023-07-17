<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerEditRequest extends FormRequest
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
            'name'=>['required',
                    'max:100',
                    'unique:lecturers,name,'. $this->id],
            'short_name'=>['required',
                           'max:20',
                           'unique:lecturers,short_name,'. $this->id],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__("site.name-required"),
            'name.max'=>__('site.max-100'),
            'name.unique'=>__('site.name-unique'),
            'short_name.required'=>__("site.short-name-required"),
            'short_name.unique'=>__("site.short-name-unique"),
            'short_name.max'=>__("site.short-name-max"),
        ];
    }
}
