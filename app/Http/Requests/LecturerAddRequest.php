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
            'name.required'=>'يجب إدخال الإسم',
            'collage.required'=>'يجب إدخال أسم الكلية',
            'dep_id.required'=>'يجب إدخال القسم',
            'degree.required'=>'يجب إدخال الدرجة العلمية',
            'name.max'=>'الإسم يجب أن لا يزيد عن 100 رمز  ',
            'name.unique'=>'الإسم موجود مسبقاً',
            'short_name.required'=>'الإسم المختصر مطلوب',
            'short_name.unique'=>'الإسم المختصر موجود مسبقاً',
            'short_name.max'=>'الإسم المختصر يجب أن لا يزيد عن 20 حرف ',
        ];
    }
}
