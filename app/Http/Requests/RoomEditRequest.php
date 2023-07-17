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
            'name.required'=>__("site.name-required"),
            'name.max'=>__('site.max-100'),
            'type.required'=>__('site.room-type-required'),
            'seats_num.required'=>__('site.seats-num-required'),
        ];
    }
}
