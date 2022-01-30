<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequestFrom extends FormRequest
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


        $currentUrl =  url()->current();
        $currentUrl = explode('/', $currentUrl);
        $currentUrl = end($currentUrl);
        // dd($currentUrl);
        if ($currentUrl == 'update-admin') {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->request->get('id'))],
                'tel' => 'required',
                'password' => ['nullable', 'string', 'min:8'],
            ];
        }
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => 'required',
            'password' => ['required', 'string', 'min:8'],
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
            'name.required' => "กรุณาป้อนชื่อ-นามสกุล",
            'name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
            'email.required' => "กรุณาป้อนอีเมล์",

            'email' => "บัญชีนี้มีอยู่เเล้วกรุณากรอกใหม่",
            'tel.required' => "กรุณาป้อนเบอร์ติดต่อ",
            'password.required' => "กรุณาป้อนรหัสผ่าน",
            'password.min' => "รหัสผ่านมีน้อยกว่า 8 ",
        ];
    }
}
