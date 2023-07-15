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
            'name.required'=>'يجب إدخال الإسم',
            'name.max'=>'الإسم يجب أن لا يزيد عن 100 رمز  ',
            'name.unique'=>'الإسم موجود مسبقاً',
            'dep_id.required'=>'يجب إدخال القسم',
            'lev_id.required'=>'يجب إدخال المستوى',
            'dep_id.numeric'=>'هناك خطأ في إدخال القسم',
            'lev_id.numeric'=>'هناك خطأ في إدخال المستوى',
            'type.required'=>'يجب إدخال النوع',
            'time_units_in_week.required'=>'يجب إدخال عدد المحاضرات الاسبوعية',
            'time_units_in_week.numeric'=>'  عدد المحاضرات الاسبوعية يجب أن يكون رقم'
        ];
    }
}
