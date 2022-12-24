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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:100|unique:lecturers,name',
            'short_name'=>'required|max:20|:lecturers,short_name',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'يجب إدخال الإسم',
            'name.max'=>'الإسم يجب أن لا يزيد عن 100 رمز  ',
            'name.unique'=>'الإسم موجود مسبقاً',
            'short_name.required'=>'الإسم المختصر مطلوب',
            'short_name.max'=>'الإسم المختصر يجب أن لا يزيد عن 20 حرف ',
        ];
    }
}
