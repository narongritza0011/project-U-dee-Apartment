<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequestForm extends FormRequest
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
     * @return array
     */
    public function rules()
    {




        return [


            'name' => ['required', 'string', 'max:255', Rule::unique('room_types')->ignore($this->request->get('id'))],

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => "กรุณาป้อนชื่อประเภทห้องพัก",
            'name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
            'name.unique' => "ประเภทห้องพักซ้ำ",

        ];
    }
}
