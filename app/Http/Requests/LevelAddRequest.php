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
            'name.required'=>'يجب إدخال الإسم',
            'name.max'=>'الإسم يجب أن لا يزيد عن 100 رمز  ',
            'dep_id.required'=>'القسم مطلوب',
            'students_num.required'=>'أدخل عدد الطلاب في القسم',
            'students_num.numeric'=>'يرجى إدخال أرقام فقط في خانة عدد الطلاب',
        ];
    }
}
