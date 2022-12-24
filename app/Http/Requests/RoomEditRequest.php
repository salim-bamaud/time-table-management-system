<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomEditRequest extends FormRequest
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
            'name'=>'required|max:100|:rooms,name',
            'type'=>'required:rooms,type',
            'seats_num'=>'required:rooms,seats_num',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'يجب إدخال الإسم',
            'name.max'=>'الإسم يجب أن لا يزيد عن 100 رمز  ',

            'type.required'=>'يجب إختيار نوع القاعة',
            'seats_num.required'=>'يجب إدخال عدد المقاعد في القاعة',
        ];
    }
}
