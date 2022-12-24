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
            'dep_id'=>'required|numeric:courses,dep_id',
            'lev_id'=>'required|numeric:courses,lev_id',
            'lecr_id'=>'required|numeric:courses,lecr_id',
            'type'=>'required|:departments:courses,type',
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
            'lecr_id.required'=>'يجب إدخال المحاضر',
            'dep_id.numeric'=>'هناك خطأ في إدخال القسم',
            'lev_id.numeric'=>'هناك خطأ في إدخال المستوى',
            'lecr_id.numeric'=>'هناك خطأ في إدخال المحاضر',
            'type.required'=>'يجب إدخال النوع',
        ];
    }
}
