<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email',
            'roles'=>'required',
            'status'=>'required',
            'password'=>'nullable|min:8',
        ];
    }


    public function messages()
    {
        return[
            'name.required'=>'لطفا نام و نام خانوادگی خود را وارد نمایید',
            'email.required'=>'لطفا ایمیل خود را وارد نمایید',
            'email.email'=>'ایمیل شما معتبر نمی باشد',
            'password.min'=>'رمز عبور باید حداقل 8 کاراکتر باشد',
            'roles'=>'لطفا نقش کاربر را انتخاب نمایید',
            'status'=>'لطفا وضعیت خود را انتخاب نمایید'
        ];
    }
}
