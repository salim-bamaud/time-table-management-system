<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseEditRequest extends FormRequest
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
            'name'=>'required|max:100|:courses,name',
            'dep_id'=>'required|numeric:courses,dep_id',
            'lev_id'=>'required|numeric:courses,lev_id',
            'type'=>'required:courses,type',
            'time_units_in_week' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'يجب إدخال الإسم',
            'name.max'=>'الإسم يجب أن لا يزيد عن 100 رمز  ',
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
